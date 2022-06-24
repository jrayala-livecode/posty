<?php

namespace App\Http\Controllers\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    
    public function index(){
        return view('posts.post');
    }

    public function store(Request $request){
        //validation
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        //store user

        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return back();
    }

    public function destroy(Post $post){
        
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }

}
