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
        <h1><span>N</span>otes <span>F</span>or <span>M</span>yself</h1>
        <div class='content starbucks'>
            <h2>Starbucks</h2>
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
                    <p class='evaluation'>{{ $post->evaluation }}</p>
                </div>
            @endforeach
            [<a href='/starbucks/create'>create</a>]
        </div>
        
        <div class='content coding'>
            <div class='coding'>
                <h2 class='title'>Coding</h2>
                @foreach ($coding as $coding_post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/coding/{{ $coding_post->id }}">{{ $coding_post->title }}</a>
                        </h2>
                        <p class='body'>{{ $coding_post->body }}</p>
                    </div>
                @endforeach
                [<a href='/coding/create'>create</a>]
            </div>
        </div>
        
        <div class='content to_do'>
            <div class='to_do'>
                <h2 class='title'>ToDo</h2>
                @foreach ($to_do as $to_do_post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/to_do/{{ $to_do_post->id }}/edit">{{ $to_do_post->start_time}}~{{ $to_do_post->end_time}}<br>{{ $to_do_post->title }}</a>
                        </h2>
                        <form action="/to_do/{{ $to_do_post->id }}" id="form_delete" method="post">
                            @csrf
                            @method('DELETE')
                            <input type='submit' style='display:none'>
                            <p>[<span onclick='return deletePost(this);'>delete</span>]</p> 
                        </form>
                    </div>
                @endforeach
                [<a href='/to_do/create'>create</a>]
            </div>
        </div>
        <script>
            function deletePost(e)
            {
                'use strict';
                if(confirm('削除すると復元できません。本当に削除しますか？'))
                {
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>