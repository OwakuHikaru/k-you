<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
        <h2 class='user'>
          <a></a>
        </h2>
        <h3>
          <a>{{ $category->name }}</a>
                    @foreach($posts as $post)
          <h3 class='user_id'>
            <a href="/posts/user/{{ $post->user_id }}">ポストの投稿者  {{ $post->user->name }}</a>
          </h3>
          <h3 class='body'>
            <a href="/posts/{{ $post->id }}">{{ $post->body }}</a>
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
        </h3>
             </p>
        </div>
    </body>
    </x-app-layout>
</html>