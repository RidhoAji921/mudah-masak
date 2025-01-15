<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function viewHome() {
        $latestPosts = Post::latest()->take(4)->get();
        return view('home', compact('latestPosts'));
    }
}
