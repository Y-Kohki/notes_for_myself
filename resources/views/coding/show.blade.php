<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coding</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/show.css')}}" type="text/css">
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <div class='main'>
        <h2 class="title">
            {{ $coding->title }}
        </h2>
        <div class="content">
            <div class="content__post">
                @foreach($explode as $body)
                    @if($loop->iteration % 2 == 0)
                        <input id="copyTarget.{{ $loop->iteration }}" type="text" value="{{ $body }}" readonly>
                        <button onclick="copyToClipboard{{ $loop->iteration }}()">コピー</button>
                        <script>
                            function copyToClipboard{{ $loop->iteration }}()
                            {
                            var copyTarget = document.getElementById("copyTarget.{{ $loop->iteration }}");
                            copyTarget.select();
                            document.execCommand("Copy");
                            alert("コピーしました！ : " + copyTarget.value);
                            }
                        </script>
                    @else
                        
                        <p><br>{{ $body }}</p>
                    @endif
                @endforeach    
            </div>
        </div>
        <div class="footer">
            <p class="edit"><a href="/coding/{{ $coding->id }}/edit">編集</a></p>
            <form action="/coding/{{ $coding->id }}" id="form_delete" method="post">
                @csrf
                @method('DELETE')
                <input type='submit' style='display:none'>
                <p><span onclick='return deletePost(this);'>削除</span></p> 
            </form>
            <a href="/">戻る</a>
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
        </div>
        @endsection
    </body>
</html>