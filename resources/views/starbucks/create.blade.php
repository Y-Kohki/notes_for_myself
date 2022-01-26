<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Starbucks</title>
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <h1>Starbucks Notes</h1>
        <form action="/starbucks" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="starbucks[original_drink]" placeholder="タイトル"/>
            </div>
            <div class="drink">
                <h2>Drink</h2>
                <textarea name="starbucks[drink]" placeholder="キャラメルフラペチーノ"></textarea>
            </div>
            <div class="customs">
                <h2>Customs</h2>
                @foreach($customs as $custom)
                    <label>
                        <input type="checkbox" value="{{ $custom->id }}" name="customs_array[]">
                            {{$custom->custom}}
                        </input>
                    </label>
                @endforeach 
            </div>
            <div class="memo">
                <h2>Memo</h2>
                <textarea name="starbucks[memo]" placeholder="備考"></textarea>
            </div>
            <div class="evaluation">
                <h2>Evaluation</h2>
                <textarea name="starbucks[evaluation]" placeholder="評価"></textarea>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
        @endsection
    </body>
</html>