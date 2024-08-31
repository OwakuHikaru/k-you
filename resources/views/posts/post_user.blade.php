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
          <br>
          <a class='text-2xl'>{{ $post->user->name }}</a>
        </h2>
        <h3>
          <br>
          <a>{{ $post->user->profile }}</a>
        </h3>
        <a href="/chat/{{ $post->user->id }}">{{ $post->user->name }}とチャットする</a>
        <div class='posts'>
             <p class='posts'>
                <a href="/posts/{{$post->id}}">{{$post->body}}</a>
             </p>
        </div>
    </body>
    </x-app-layout>
</html>