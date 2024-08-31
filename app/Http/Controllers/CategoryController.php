<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoryController extends Controller
 {
     public function category(Category $category, Post $post)
     {
      $category_id=$category->id;
      
       $posts = $post->where('category_id',$category_id)->get();
       return view('posts.category')->with(['category' => $category, 'posts'=>$posts]);  
     }
 }
?>