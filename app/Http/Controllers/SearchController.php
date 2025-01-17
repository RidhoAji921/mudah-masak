<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function searchPostPage(Request $request) {
        $query = $request->input('query');
        $posts = Post::where('title', 'like', '%' . $query . '%')
                     ->orWhere('description', 'like', '%' . $query . '%')
                     ->get();

        return view('post-search', compact('posts', 'query'));
    }
}
