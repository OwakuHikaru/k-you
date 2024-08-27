<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
        <h2 class='comments'>
          @foreach ()
          <a>{{ $comment->comments }}</a>
        </h2>
         <div class='posts'>
             <p class='posts'>
                <a href=/posts></a>
             </p>
        </div>
    </body>
    </x-app-layout>
</html>