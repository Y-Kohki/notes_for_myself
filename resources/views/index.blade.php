<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Notes For Myself</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/css/index.css')}}" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        
        @extends('layouts.app')

        @section('content')
        <div class=note>
        <div class='content starbucks'>
            <h2 class='mainTitle'>Starbucks</h2>
            <a class='create' href='/starbucks/create'>新規メモ</a>
            <div class='list'>
            @foreach ($starbucks as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/starbucks/{{ $post->id }}">{{ $post->original_drink }}</a>
                    </h2>
                    <p class='drink'>{{ $post->drink }}</p>
                    @foreach($post->customs as $custom)   
                        {{ $custom->custom }}
                    @endforeach
                    <p class='memo'>{{ $post->memo }}</p>
                    <p class='evaluation'>{{ $post->evaluation }}点</p>
                </div>
            @endforeach
            </div>
        </div>
        
        <div class='content coding'>
            <div class='coding'>
                <h2 class='mainTitle'>Coding</h2>
                <a class='create' href='/coding/create'>新規メモ</a>
                <div class='list'>
                @foreach ($coding as $coding_post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/coding/{{ $coding_post->id }}">{{ $coding_post->title }}</a>
                        </h2>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        
        <div class='content to_do'>
            <div class='to_do'>
                <h2 class='mainTitle'>ToDo</h2>
                <a class='create' href='/to_do/create'>新規メモ</a>
                
                <div class='list'>
                @foreach ($events as $event) 
                    <div class='post'>
                        <form action="/to_do/{{ $event->id }}"  method="post">
                            @csrf
                            @method('DELETE')
                            <input type='submit' style='display:none'>
                            <button type="submit">delete</button>
                        </form>
                        <h4 class='title'>
                                <a href="/to_do/{{ $event->id }}/edit">{{ $event->startDateTime->format('Y年n月j日G時') }}~{{ $event->endDateTime->format('G時') }}<br>{{ $event->name }}</a>
                        </h4>
                        
                    </div>
                @endforeach
                
                <div class='calendar'>
                    <iframe src="https://calendar.google.com/calendar/embed?src=f6f9tala35h9r6v285k66j88is%40group.calendar.google.com&ctz=Asia%2FTokyo" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                </div>
                </div>
            </div>
        </div>
        </div>
        @endsection
    </body>
</html>