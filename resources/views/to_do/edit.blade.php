<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ToDo</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/to_do/{{ $to_do->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="content__start_time">
                    <h2>開始時刻</h2>
                    <input type='text' name='to_do[start_time]' value="{{ $to_do->start_time }}">
                </div>
                <div class="content__end_time">
                    <h2>終了時刻</h2>
                    <input type='text' name='to_do[end_time]' value="{{ $to_do->end_time }}">
                </div>
                <div class='content__title'>
                    <h2>Title</h2>
                    <input type="text" name="to_do[title]" placeholder="タイトル" value="{{ $to_do->title }}"/>
                </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>