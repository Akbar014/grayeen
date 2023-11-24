<?php

namespace App\Http\Controllers;

class VideoController extends Controller
{
    public function index()
    {
        return view('admin.video.index');
    }

    public function create()
    {
        return view('admin.video.create');
    }
}
