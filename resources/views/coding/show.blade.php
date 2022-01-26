<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Coding</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <h1 class="title">
            {{ $coding->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                @foreach($explode as $body)
                    @if($loop->iteration % 2 == 0)
                        <input id="copyTarget.{{ $loop->iteration }}" type="text" value="{{ $body }}" readonly>
                        <button onclick="copyToClipboard{{ $loop->iteration }}()">Copy text</button>
                        <script>
                            function copyToClipboard{{ $loop->iteration }}()
                            {
                            var copyTarget = document.getElementById("copyTarget.{{ $loop->iteration }}");
                            copyTarget.select();
                            document.execCommand("Copy");
                            alert("コピーできました！ : " + copyTarget.value);
                            }
                        </script>
                    @else
                        <p>{{ $body }}</p>
                    @endif
                @endforeach    
            </div>
        </div>
        <div class="footer">
            <p class="edit">[<a href="/coding/{{ $coding->id }}/edit">edit</a>]</p>
            <form action="/coding/{{ $coding->id }}" id="form_delete" method="post">
                @csrf
                @method('DELETE')
                <input type='submit' style='display:none'>
                <p>[<span onclick='return deletePost(this);'>delete</span>]</p> 
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
        @endsection
    </body>
</html>