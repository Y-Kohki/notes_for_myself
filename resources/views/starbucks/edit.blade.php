<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Starbucks</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/starbucks/{{ $starbucks->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>Title</h2>
                    <input type="text" name="starbucks[original_drink]" placeholder="タイトル" value="{{ $starbucks->original_drink }}"/>
                </div>
                <div class="content__drink">
                    <h2>Drink</h2>
                    <input type='text' name='starbucks[drink]' value="{{ $starbucks->drink }}">
                </div>
                <div class="customs">
                    <h2>Customs</h2>
                    @foreach($customs as $custom)
                        <label>
                            <input type="checkbox" value="{{ $custom->id }}" name="customs_array[]" {{ $isChecked[$custom->id] }}>
                                {{$custom->custom}}
                            </input>
                        </label>
                    @endforeach 
                </div>
                <div class="content__memo">
                    <h2>Memo</h2>
                    <input type='text' name='starbucks[memo]' value="{{ $starbucks->memo }}">
                </div>
                <div class="content__evaluation">
                    <h2>Evaluation</h2>
                    <input type='text' name='starbucks[evaluation]' value="{{ $starbucks->evaluation }}">
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
</html>