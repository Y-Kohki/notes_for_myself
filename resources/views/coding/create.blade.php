<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Coding</title>
        <link rel="stylesheet" href="{{ asset('/css/create.css')}}" type="text/css">
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <div class='main'>
        <h1>新規メモ</h1>
        <form action="/coding" method="POST">
            @csrf
            <div class="title">
                <h4><br>タイトル</h2>
                <input type="text" style="width: 400px;" name="coding[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h4><br>本文</h2>
                <textarea id="textarea" style="width: 800px; height:400px; white-space:pre-wrap;" name="coding[body]" placeholder="本文"></textarea>
                <br>
                <button type="button" onclick="addText();">コードブロック</button>
                <br><br>
            <input type="submit" value="保存"/>
        </form>
    
        <br><br>
        <div class="back"><a href="/">戻る</a></div>
        
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