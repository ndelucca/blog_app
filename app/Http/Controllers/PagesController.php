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

    public function fallback(){
        return view('pages.fallback');
    }
}
