<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    function createPostView() {
        return view('create_post');
    }

    function postShow($slug) {
        $post = Post::with(['author', 'categories'])->where('slug', $slug)->firstOrFail();
        return view('post', compact('post'));
    }

    function store(Request $request){
        $validatedRequest = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'categories' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        
        $imageName = time().'.'.$validatedRequest['image']->getClientOriginalExtension();
        $imagePath = $validatedRequest['image']->move(public_path('images'), $imageName);
        $validatedRequest['slug'] = Str::slug($validatedRequest['title']);
        $validatedRequest['user_id'] = Auth::user()->id;
        $validatedRequest['thumbnail'] = $imagePath;

        $post = Post::create([
            'title' => $validatedRequest['title'],
            'user_id' => $validatedRequest['user_id'],
            'slug' => $validatedRequest['slug']."-".time(),
            'description' => $validatedRequest['description'],
            'thumbnail' => $validatedRequest['thumbnail'],
        ]);

        $categoryIds = explode(',', $request->categories);
        $post->categories()->attach($categoryIds);

        dd($request->categories);
    }
}
