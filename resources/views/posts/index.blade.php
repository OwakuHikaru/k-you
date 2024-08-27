<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
        <div class='posts'>
        @foreach($posts as $post)
         <h3 class='user_id'>
                        <a href="/posts/{{ $post->user }}">ポストの投稿者  {{ $post->user->name }}</a>
                    </h3>
                    <h3 class='body'>
                        <a href="/posts/{{ $post->id }}">{{ $post->body }}</a>
                    </h3>
                    <h3 class='comment'>
                    <h3 class='category'>
                        <a href="/category/{{ $post->category }}">{{ $post->category->name }}</a>
                    </h3>
            @foreach ($post->comments as $comment)
                <div class="flex flex-col">
                    <div>コメントの投稿者  {{$comment->user->name}}
                        <a href="/comments/{{ $comment->post->id }}">{{ $comment->comments }} </a>
                    </h3>
                    <form action="/comments/{{ $comment->post->id }}" id="form_{{ $comment->post->id }}" method="post">
                    
  　　　　　　　　　　　　　　　　　  @csrf
    　　　　　　　　　　　　　　　　　@method('DELETE')
    　　　　　　　　　　　　　　　　　<div type="button" class="justify-start cursor-pointer" onclick="deletePost({{ $comment->post->id }})">delete</div> 
　　　　　　        </form>
                </div>
            @endforeach
        @endforeach
            <a href='/posts/create'>create</a>
            {{ Auth::user()->name }}
        </div>
        <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
    </body>
    </x-app-layout>
</html>