<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Original Drink</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $starbucks->original_drink }}
        </h1>
        <div class="content">
            <div class="content__post">
                <p>{{ $starbucks->drink }}</p>
                @foreach($starbucks->customs as $custom)   
                    {{ $custom->custom }}
                @endforeach
                <p>{{ $starbucks->memo }}</p>
                <p>{{ $starbucks->evaluation }}</p>
            </div>
        </div>
        <div class="footer">
            <p class="edit">[<a href="/starbucks/{{ $starbucks->id }}/edit">edit</a>]</p>
            <form action="/starbucks/{{ $starbucks->id }}" id="form_delete" method="post">
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
    </body>
</html>