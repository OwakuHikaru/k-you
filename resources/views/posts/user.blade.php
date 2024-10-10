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
        <div class='posts'>
             @foreach ($posts as $post)
        <p class="post">
            <a>{{ $post->body }}</a>
        </p>
    @endforeach
        </div>
    </body>
    </x-app-layout>
</html>