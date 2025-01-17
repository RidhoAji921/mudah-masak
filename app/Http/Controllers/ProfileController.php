<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView(){
        $userId = Auth::id();
        $posts = Post::where('user_id', $userId)->get();
        return view('profile', compact('posts'));
    }
}
