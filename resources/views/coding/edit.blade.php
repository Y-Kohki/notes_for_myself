<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Starbucks</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/coding/{{ $coding->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>Title</h2>
                    <input type="text" name="coding[title]" placeholder="タイトル" value="{{ $coding->title }}"/>
                </div>
                <div class="content__body">
                    <h2>Body</h2>
                    <input id='textarea' type='text' name='coding[body]' value="{{ $coding->body }}">
                </div>
            <input type="submit" value="保存"/>
        </form>
        <button type="button" onclick="addText();">コードブロック</button>
        
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
    </body>
</html>