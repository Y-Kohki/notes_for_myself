<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ToDo</title>
        <link rel="stylesheet" href="{{ asset('/css/create.css')}}" type="text/css">
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <div class='main'>
        <h1>新規メモ</h1>
        <form action="/to_do" method="POST">
            @csrf
            <div class="start_time">
                <h4><br>開始時刻</h4>
                <input type="text"　name="to_do[start_time]" placeholder="開始時刻" value="{{ \Carbon\Carbon::tomorrow() }}"/>
            </div>
            <div class="end_time">
                <h4><br>終了時刻</h4>
                <input type="text" name="to_do[end_time]" placeholder="終了時刻" value="{{ \Carbon\Carbon::tomorrow() }}"/>
            </div>
            <div class="title">
                <h4><br>タイトル</h4>
                <input type="text" style="width: 400px;"　name="to_do[title]" placeholder="タイトル"/>
            </div>
            <br>
            <input type="submit" value="保存"/>
        </form>
        <br>
        <div class="back"><a href="/">戻る</a></div>
        </div>
        @endsection
    </body>
</html>