<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->with(['user','likes'])->paginate(2);
        
        return view('posts.dashboard',[
            'posts' => $posts
        ]);
    }

}
