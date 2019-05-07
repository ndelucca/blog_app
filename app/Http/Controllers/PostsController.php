<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Post;

class PostsController extends Controller
{
    private function timestampFileName(Request $req,$file){
        // Get filename with extension
        $filenameWithExt = $req->file($file)->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); //plain php
        // Get just extension
        $extension = $req->file($file)->getClientOriginalExtension();
        // Filename to store
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        return $filenameToStore;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at','desc')->paginate(10);
        //where([['user_id','=',auth()->user()->id]])->
        //echo json_encode($posts);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required',
            'file_img' => 'nullable|image|max:1999',
            'file_music' => 'nullable|audio|max:1999',
            'file_video' => 'nullable|video|max:1999'
        ]);

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->visibility = $request->input('visibility');

        //File Upload
        if($request->hasFile('file_img')){
            $post->file = $this->timestampFileName($request,'file_img');
            $post->file_type = 'img';
            // Upload Image
            $path = $request->file('file_img')->storeAs('public/file_img',$post->file);
        }elseif($request->hasFile('file_music')){
            $post->file = $this->timestampFileName($request,'file_music');
            $post->file_type = 'music';
            // Upload Music
            $path = $request->file('file_music')->storeAs('public/file_music',$post->file);
        }elseif($request->hasFile('file_video')){
            $post->file = $this->timestampFileName($request,'file_video');
            $post->file_type = 'video';
            // Upload Video
            $path = $request->file('file_video')->storeAs('public/file_video',$post->file);
        }
        
        $post->save();

        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //no permite ver los posts individualmente
        //return view('pages.fallback');
        //$post = Post::find($id);
        //return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','Unauthorized Page');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->visibility = $request->input('visibility');
        //Update Post
        // if($request->hasFile('cover_image')){
        //     $post->cover_image = $filenameToStore;
        // }
        //File Upload
        if($request->hasFile('file_img')){
            $post->file = $this->timestampFileName($request,'file_img');
            $post->file_type = 'img';
            // Upload Image
            $path = $request->file('file_img')->storeAs('public/file_img',$post->file);

            //deletes old image
            if($request->input('old_file_img') != "0"){
                $fileToDelete = $request->input('old_file_img');
                //File::delete('storage/file_img/'.$fileToDelete);
                unlink('storage/file_img/'.$fileToDelete);
            }

        }elseif($request->hasFile('file_music')){
            $post->file = $this->timestampFileName($request,'file_music');
            $post->file_type = 'music';
            // Upload Music
            $path = $request->file('file_music')->storeAs('public/file_music',$post->file);
        }elseif($request->hasFile('file_video')){
            $post->file = $this->timestampFileName($request,'file_video');
            $post->file_type = 'video';
            // Upload Video
            $path = $request->file('file_video')->storeAs('public/file_video',$post->file);
        }

        $post->save();

        return redirect('/posts')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/post')->with('error','Unauthorized Page');
        }

        // if($post->cover_image != 'noimage.jpg'){
        //     //Delete Image
        //     Storage::delete('public/cover_images/'.$post->cover_image);
        // }

        //deletes the img file
        if($post->file_type == "img"){
            unlink('storage/file_img/'.$post->file);
        }
        $post->delete();
        return redirect('/posts')->with('success','Post Removed');    }
}
