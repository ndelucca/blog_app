<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $posts = Post::with('user')->where([['user_id','=',$user_id]])->orderBy('created_at','desc')->paginate(10);
        //return json_encode($user);
        //$user = User::find($user_id)->paginate(10);
        return view('home')->with('posts',$posts);
    }
}
