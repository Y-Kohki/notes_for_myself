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
            <form action="/starbucks/{{ $starbucks->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h4><br>タイトル</h4>
                    <input type="text"　style="width: 400px;" name="starbucks[original_drink]" placeholder="タイトル" value="{{ $starbucks->original_drink }}"/>
                </div>
                <div class="content__drink">
                    <h4><br>ドリンク</h4>
                    <input type='text'　style="width: 400px;" name='starbucks[drink]' value="{{ $starbucks->drink }}">
                </div>
                <div class="customs">
                    <h4><br>カスタム</h4>
                    @foreach($customs as $custom)
                        <label>
                            <input type="checkbox" value="{{ $custom->id }}" name="customs_array[]" {{ $isChecked[$custom->id] }}>
                                {{$custom->custom}}
                            </input>
                        </label>
                    @endforeach 
                </div>
                <div class="content__memo">
                    <h4><br>備考</h4>
                    <textarea style="width: 800px; height:100px" name='starbucks[memo]' >{{ $starbucks->memo }}</textarea>
                </div>
                <div class="content__evaluation">
                    <h4><br>10段階評価</h4>
                    
                    <input type="number" name="starbucks[evaluation]" min="1" max="10" value="{{ $starbucks->evaluation }}">
            </div>
            <br>
            <input type="submit" value="保存"/>
        </form>
        </div>
        @endsection
    </body>
</html>