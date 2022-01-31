<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ToDo</title>
        <link rel="stylesheet" href="{{ asset('/css/edit.css')}}" type="text/css">
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <div class='main'>
        <h1 class="title">編集</h1>
        <div class="content">
            <form action="/to_do/{{ $event->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="content__start_time">
                    <h4><br>開始時刻</h4>
                    <input type='text' name='to_do[startDateTime]' value="{{ $event->startDateTime }}">
                </div>
                <div class="content__end_time">
                    <h4><br>終了時刻</h4>
                    <input type='text' name='to_do[endDateTime]' value="{{ $event->endDateTime }}">
                </div>
                <div class='content__title'>
                    <h4><br>タイトル</h4>
                    <input type="text" style="width: 400px;" name="to_do[name]" placeholder="タイトル" value="{{ $event->name }}"/>
                </div>
                <br>
            <input type="submit" value="保存"/>
        </form>
        </div>
        @endsection
    </body>
</html>