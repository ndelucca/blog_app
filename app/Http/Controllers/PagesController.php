<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Main Page - Index
     */
    public function index()
    {
        return view('pages.index');
    }
    public function dictionaryRandom(){
        if(auth()->user()->access == 100){
            return view('pages.dictionaryRandom');
        }else{
            return $this->fallback();
        }
    }
    public function fallback(){
        return view('pages.fallback');
    }
}
