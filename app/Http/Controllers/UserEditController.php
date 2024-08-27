<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserEditController extends Controller
 {
     public function user_edit()
     { $user_edit = Auth::user();
       return view('posts.user_edit')->with(['user' => $user_edit]);  
     }
     
      public function store( User $user, Request $request)
    {
        $input = $request['user'];
        $user->fill($input)->save();
        return redirect('/user');
    }
    
    public function update(Request $request, User $user) 
    {
        $input = $request['user'];
        $user=$user->where('profile',Auth::user()->profile)->update(['profile' => $input["profile"]]);
        // $user->fill($input)->save();
        return redirect('/user')->with(['user' => $user]);
    }
 }
?> 