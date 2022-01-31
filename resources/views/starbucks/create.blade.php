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
        <h1>新規メモ</h1>
        <form action="/starbucks" method="POST">
            @csrf
            <div class="title">
                <h4><br>タイトル</h4>
                <input type="text" style="width: 400px;" name="starbucks[original_drink]" placeholder="タイトル"/>
            </div>
            <div class="drink">
                <h4><br>ドリンク</h4>
                <input type='text' style="width: 400px;" name="starbucks[drink]" placeholder="フラペチーノ等">
            </div>
            <div class="customs">
                <h4><br>カスタム</h4>
                @foreach($customs as $custom)
                    <label>
                        <input type="checkbox" value="{{ $custom->id }}" name="customs_array[]">
                            {{$custom->custom}}
                        </input>
                    </label>
                @endforeach 
            </div>
            <div class="memo">
                <h4><br>備考</h4>
                <textarea name="starbucks[memo]" style="width: 400px; height: 100px;" placeholder="備考"></textarea>
            </div>
            <div class="evaluation">
                <h4><br>10段階評価</h4>
                <input type="number" name="starbucks[evaluation]" min="1" max="10" value="5">
            </div>
            <br>
            <input type="submit" value="保存"/>
        </form>
        <br>
        <div class="back"><a href="/">戻る</a></div>
        @endsection
        </div>
    </body>
</html>