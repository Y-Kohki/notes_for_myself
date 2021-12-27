<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Coding</title>
    </head>
    <body>
        <h1>Coding Notes</h1>
        <form action="/coding" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="coding[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="coding[body]" placeholder="本文"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>