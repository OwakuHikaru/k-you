<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
 {
     // public function user(User $user)
     // { $user = Auth::user();
     //   return view('posts.user')->with(['user' => $user]);  
     // }
     public function showUserWithPosts()
    {
        // 認証されたユーザーの情報を取得
        $user = Auth::user();

        // 認証されたユーザーが存在しない場合はリダイレクト
        if (!$user) {
            return redirect()->route('login'); // 未ログイン時にはログインページにリダイレクト
        }

        // 認証されたユーザーの投稿情報を取得
        $posts = $user->posts;

        // ビューにデータを渡して表示
        return view('posts.user', compact('user', 'posts'));
    }

 }
?>