<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->access === 100){
            $users = User::all();
            return view('users.index')->with('users',$users);
        }else{
            return view('pages.fallback');
        }
    }

    public function create(){
        return view('pages.fallback');
    }

    public function store(Request $request){
        return view('pages.fallback');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if((auth()->user()->id === $id) || (auth()->user()->access === 100))
        {
            $user = User::find($id);
            $user->postCount = Post::where('user_id',$id)->count();

            return view('users.show')->with('user',$user);
        }
        else{
            return view('pages.fallback');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if((auth()->user()->id === $id) || (auth()->user()->access === 100))
        {
            $user = User::find($id);
            return view('users.edit')->with('user',$user);
        }else{
            return view('pages.fallback');
        }
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
        //
        $this->validate($request,[
            'name' => 'required',
            'name_first' => 'required',
            'name_last' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->name_first = $request->input('name_first');
        $user->name_last = $request->input('name_last');
        $user->email = $request->input('email');

        $user->save();

        return redirect('users/'.$id.'/show')->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
