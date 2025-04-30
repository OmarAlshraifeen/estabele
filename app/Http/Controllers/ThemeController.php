<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        return view('theme.index');
    }
    public function contact()
    {
        return view('theme.contact');
    }
    public function hotels()
    {
        return view('theme.hotels');
    }

    public function about(){
        return view('theme.about');
    }
}
