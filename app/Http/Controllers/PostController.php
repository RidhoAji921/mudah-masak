<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    function createPostView() {
        return view('create_post');
    }
}
