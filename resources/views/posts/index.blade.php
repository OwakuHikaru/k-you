<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://kit.fontawesome.com/10d247ddf5.js" crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
        /* いいね押下時の星の色 */
        .liked{
            color:orangered;
            transition:.2s;
        }
        .flexbox{
            align-items: center;
            display: flex;
        }
        .count-num{
            font-size: 20px;
            margin-left: 10px;
        }
        .fa-star{
            font-size: 30px;
        }
        </style>
    </head>
    <x-app-layout>
    <!--背景色　div-->
    <body>
        <a href='/user' class='text-xl'>{{ Auth::user()->name }}</a>
        <a href='/posts/create' class='font-medium text-xl'>[新規ポスト]</a><br>
            <br>
        <div class='posts'>
          @foreach($posts as $post)
          <h3 class='user_id'>
            <a href="/posts/user/{{ $post->user_id }}">ポストの投稿者  {{ $post->user->name }}</a>
          </h3>
          <h3 class='body'>
            <a href="/posts/{{ $post->id }}">{{ $post->body }}</a>
              @auth
              {{-- 前章のPostモデルで作成したメソッドを利用し、自身がこの記事にいいねしたのか判定します。 --}}
                @if($post->isLikedByAuthUser())
                {{-- こちらがいいね済の際に表示される方で、likedクラスが付与してあることで星に色がつきます --}}
                  <div class="flexbox">
                    <i class="fa-solid fa-star like-btn liked" id={{$post->id}}></i>
                    <p class="count-num">{{$post->likes->count()}}</p>
                  </div>
                @else
                  <div class="flexbox">
                    <i class="fa-solid fa-star like-btn " id={{$post->id}}></i>
                    <p class="count-num">{{$post->likes->count()}}</p>
                  </div>
                @endif
              @endauth

              @guest
                <p>loginしていません</p>
              @endguest
          </h3>
          <h3 class='comment'>
              <h3 class='category'>
                <a href="/category/{{ $post->category->id }}">{{ $post->category->name}}</a>
              </h3>
              @if( Auth::id() == $post->user->id )
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                  @csrf
    　　　　  　　　　　@method('DELETE')
    　　　　　　　　　　　　　　<div type="button" class="justify-start cursor-pointer border-4 inline-block " onclick="deletePost({{ $post->id }})">投稿を削除</div> 
    　    　 　　　</form>
               @endif
               @foreach ($post->comments as $comment)
                 <div class="flex flex-col">
                    <div>
                       <a href=>コメントの投稿者  {{$comment->user->name}}</a>
                       <a href="/comments/{{ $comment->id }}">{{ $comment->comments }} </a>
                       <i class="fa-regular fa-star"></i>
          </h3>
                @if( Auth::id() == $post->user->id )
                    <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="post">
  　　　　　　　　　 　　　　　　　　  @csrf
                      @method('DELETE')
    　　　　　　　　　　　　　　　　<div type="button" class="justify-start cursor-pointer border-4 inline-block" onclick="deletePost({{ $comment->id }})" >コメントを削除</div> 
　　　　　　        </form>
　　　　　　        @endif
                </div>
            @endforeach
        @endforeach
        </div>
        <script>
    function deletePost(id) {
        'use strict'
        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
            //いいねボタンのhtml要素を取得します。
        const likeBtn = document.querySelectorAll(".like-btn");
 
 likeBtn.forEach(likeBtn => {
     likeBtn.addEventListener('click', async (e) => {
  // ここで参考資料の処理
        //いいねボタンをクリックした際の処理を記述します。 
            //クリックされた要素を取得しています。
            const clickedEl = e.target
            //クリックされた要素にlikedというクラスがあれば削除し、なければ付与します。これにより星の色の切り替えができます。      
            clickedEl.classList.toggle('liked')
            //記事のidを取得しています。
            const postId = e.target.id
            //fetchメソッドを利用し、バックエンドと通信します。非同期処理のため、画面がかくついたり、真っ白になることはありません。
            axios.post("/like", {
                post_id: postId,
            }, {
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                }
            })
            .then((response) => {
                // サーバーからのレスポンスデータを使用
                clickedEl.nextElementSibling.innerHTML = response.data.likesCount;
            })
            .catch(() => {
                alert("処理が失敗しました。画面を再読み込みし、通信環境の良い場所で再度お試しください。");
            });
            })
            });
            </script>
    </body>
    </x-app-layout>
</html>
