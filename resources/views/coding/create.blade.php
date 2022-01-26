<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Coding</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <h1>Coding Notes</h1>
        <form action="/coding" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="coding[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea id="textarea" name="coding[body]" placeholder="本文"></textarea>
                
                
                
            <input type="submit" value="保存"/>
        </form>
        <button type="button" onclick="addText();">コードブロック</button>
        
        <div class="back">[<a href="/">back</a>]</div>
        
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
        @endsection
    </body>
</html>