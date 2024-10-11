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
          <a>ユーザーネーム : {{ $user->name }}</a>
        </h2>
        <h3>
         <a></a>
        </h3>
    <div class = "plofile">
        <h3>
          <a>自己紹介 : {{ $user->plofile }}
          </a>
        </h3>
        <form action="/user/edit" method="POST">
            @csrf
            @method('PUT')
            <input type='hidden' name="user[name]" value={{$user->name}}>
        <textarea name="user[profile]" placeholder={{$user->profile}}>{{ old('user.plofile') }}</textarea>
        <input type="submit" class='cursor-pointer' value="保存" />
         </form>
    </div>
    <div class="back">[<a href="/index">戻る</a>]</div>
    </body>
    </x-app-layout>
</html>