<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ToDo</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/to_do/{{ $event->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="content__start_time">
                    <h2>開始時刻</h2>
                    <input type='text' name='to_do[startDateTime]' value="{{ $event->startDateTime }}">
                </div>
                <div class="content__end_time">
                    <h2>終了時刻</h2>
                    <input type='text' name='to_do[endDateTime]' value="{{ $event->endDateTime }}">
                </div>
                <div class='content__title'>
                    <h2>Title</h2>
                    <input type="text" name="to_do[name]" placeholder="タイトル" value="{{ $event->name }}"/>
                </div>
            <input type="submit" value="保存"/>
        </form>
        @endsection
    </body>
</html>