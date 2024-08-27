<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form action="/posts" method="POST">
            @csrf
            <div class="body">
                <h2>本文(仮)</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <form action="/posts" method="POST">
            <div class="category">
                <form action="index.php" method = "POST">
                    <textarea name="category[name]" placeholder="ごはん"></textarea>
                    <!--<select name = "カテゴリー">-->
                    <!--    @foreach($posts as $post)-->-->
                    <!--    <option value = {{$post->category->id}}></option>-->
                    <!--    @endforeach-->
                    <!--</select>-->
                <input type='hidden' value='0' name='hoge'>
                <input type = "checkbox" name=post[lock] value="true"> かぎ
            </div>
        </form>
        <div class="back">[<a href="/index">back</a>]</div>
    </body>
</html>