<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function userView($username) {
        $user = User::where('username', $username)->firstOrFail();
        $posts = Post::where('user_id', $user->id)->get();
        return view('user', compact('user', 'posts'));
    }
}
