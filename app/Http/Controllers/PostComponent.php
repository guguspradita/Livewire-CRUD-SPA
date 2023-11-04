<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostComponent extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('home', ['component' => $post]);
    }
}
