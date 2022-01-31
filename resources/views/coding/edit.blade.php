<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Starbucks</title>
        <link rel="stylesheet" href="{{ asset('/css/create.css')}}" type="text/css">
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <div class='main'>
        <h1 class="title">編集</h1>
        <div class="content">
            <form action="/coding/{{ $coding->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h4><br>タイトル</h4>
                    <input type="text" style="width: 400px;" name="coding[title]" placeholder="タイトル" value="{{ $coding->title }}"/>
                </div>
                <div class="content__body">
                    <h4><br>本文</h4>
                    <textarea id='textarea' style="width: 800px; height:400px; white-space:pre-wrap;" name='coding[body]'>{{ $coding->body }}</textarea>
                </div>
                <button type="button" onclick="addText();">コードブロック</button>
                <br><br>
            <input type="submit" value="保存"/>
        </form>
        
        
        
        <script>
            function addText()
            {
	            var area = document.getElementById('textarea');
	            area.value = area.value.substr(0, area.selectionStart)
		            	+
		            	'\n```\n'
		            	
			            + area.value.substr(area.selectionStart, area.selectionEnd - area.selectionStart)
		            	+
		            	'\n```\n'
		            	
		            	+ area.value.substr(area.selectionEnd);
            }
        </script>
        </div>
        @endsection
    </body>
</html>