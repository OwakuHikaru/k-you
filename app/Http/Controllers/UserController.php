<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
 {
     public function user(User $user)
     { $user = Auth::user();
       return view('posts.user')->with(['user' => $user]);  
     }
 }
?>