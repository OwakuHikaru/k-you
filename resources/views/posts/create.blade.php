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
                <textarea name="post[body]" placeholder="今日は楽しかった。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <div class="category">
                    <select name = "post[category_id]">
                        @foreach($categories as $category)-->
                        <option value = {{$category->id}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                <input type='hidden' value='0' name='post[lock]'>
                <input type = "checkbox" name=post[lock] value=true> かぎ
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="back">[<a href="/index">back</a>]</div>
    </body>
</html>