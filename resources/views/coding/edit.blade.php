<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Starbucks</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/coding/{{ $coding->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>Title</h2>
                    <input type="text" name="coding[title]" placeholder="タイトル" value="{{ $coding->title }}"/>
                </div>
                <div class="content__body">
                    <h2>Body</h2>
                    <input type='text' name='coding[body]' value="{{ $coding->body }}">
                </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>