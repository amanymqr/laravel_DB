<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DBController extends Controller
{
    public function index()
    {
        $posts= Post::all() ;
        return view('posts2.index', compact('posts'));
    }
}
