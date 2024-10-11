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
          <a class='text-2xl '>{{ $user->name }}</a>
        </h2>
        <h3>
          <br>
          <a>{{ $user->profile }}</a><a href=/user/edit>[編集]</a>
        </h3>
        <br>
        <div class='posts'>
            ＜{{ $user->name }}の投稿一覧＞
            <br>
            <!--1個だと空白行できなかったので2個-->
            <br> 
             @foreach ($posts as $post)
            <p class="post">
             <a href = "/posts/{{$post->id}}">{{ $post->body }}</a>
             <br>
             <br>
            </p>
             @endforeach
        </div>
    </body>
    </x-app-layout>
</html>