<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To Laravel';
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About The To-Do App';
        return view('pages.about')->with('title', $title);
    }
}
