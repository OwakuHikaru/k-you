<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; // useする
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    { 
       $posts = Post::with('comments')->get();
       return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }

    public function create(Post $post, Category $category)
    {   $categories = $category->get();
        $posts = Post::all();
        return view('posts.create',compact('posts','categories'));
    }

    public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {  
        $input = $request['post'];
        $input['lock']='true'===$input['lock']?true:false;
        $input['user_id']=Auth::id();
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
     {
     return view('posts.edit')->with(['post' => $post]);
     }
     public function update(PostRequest $request, Post $post)
     { 
     $input_post = $request['post'];
     $post->fill($input_post)->save();
     
     return redirect('/posts/' . $post->id);
     }
     
     public function delete(Post $post)
     {
     $post->delete();
     return redirect('/index');
     }
    
    
    public function post_user(Post $post)
    {
        return view('posts.post_user')->with(['post' => $post]);
    }
    
    public function __construct(){
    $this->middleware('auth');
  }
}