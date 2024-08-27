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
        <h2 class='user'>
          <a>{{ $user->name }}</a>
        </h2>
        <h3>
         <a href=/user/edit>編集</a>
        </h3>
        <h3>
          <a>{{ $user->profile }}</a>
        </h3>
        <div class='posts'>
             <p class='posts'>
                <a href=></a>
             </p>
        </div>
    </body>
    </x-app-layout>
</html>