<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ToDo</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <h1>ToDo Notes</h1>
        <form action="/to_do" method="POST">
            @csrf
            <div class="start_time">
                <h2>start_time</h2>
                <input type="text" name="to_do[start_time]" placeholder="開始時刻" value="{{ \Carbon\Carbon::tomorrow() }}"/>
            </div>
            <div class="end_time">
                <h2>end_time</h2>
                <input type="text" name="to_do[end_time]" placeholder="終了時刻" value="{{ \Carbon\Carbon::tomorrow() }}"/>
            </div>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="to_do[title]" placeholder="タイトル"/>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
        @endsection
    </body>
</html>