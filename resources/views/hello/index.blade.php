@extends('layouts.helloapp')
<style>
    .pagination { font-size:12pt; }
    .pagination li { display:inline-block }
    tr th a:link { color: white; }
    tr th a:visited { color: white; }
    tr th a:hover { color: white; }
    tr th a:active { color: white; }
</style>
@section('title', 'Index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
	<!-- @if (Auth::check())
    <p>USER: {{$user->name . ' (' . $user->email . ')'}}</p>
    @else
    <p>※ログインしていません。（<a href="/login">ログイン</a>｜
        <a href="/register">登録</a>）</p>
    @endif -->
    @if(count($errors) > 0)
    <p>入力に問題があります。再入力して下さい。</p>
    {{--<div>--}}
        {{--<ul>--}}
            {{--@foreach($errors->all() as $error)--}}
                {{--<li>{{$error}}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
    @endif
    {{--   <table>
       <tr>
           <th><a href="/hello?sort=name">name</a></th>
           <th><a href="/hello?sort=mail">mail</a></th>hell
           <th><a href="/hello?sort=age">age</a></th>
       </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{$item['name']}}</td>
                <td>{{$item['mail']}}</td>
            </tr>
        @endforeach
       </table>  --}}
    <p>{{$msg}}</p>
    <table>
        <form action="/hello" method="post">
            @if ($errors->has('name'))
            <tr><th>ERROR</th><td>{{$errors->first('name')}}</td></tr>
            @endif
            <tr><th>name: </th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
            @if ($errors->has('mail'))
                <tr><th>ERROR</th><td>{{$errors->first('mail')}}</td></tr>
            @endif
            <tr><th>mail: </th><td><input type="text" name="mail" value="{{old('mail')}}"></td></tr>
            @if ($errors->has('mail'))
                <tr><th>ERROR</th><td>{{$errors->first('age')}}</td></tr>
            @endif
            <tr><th>age:  </th><td><input type="text" name="age"  value="{{old('age')}}"></td></tr>
            <tr><th></th><td><input type="submit" value="send"></td></tr>
        </form>
    </table>
    {{--<table>--}}
        {{--<form action="/hello" method="post">--}}
            {{--<tr><th>name: </th><td><input type="text" name="name"></td></tr>--}}
            {{--<tr><th>mail: </th><td><input type="text" name="mail"></td></tr>--}}
            {{--<tr><th>age:  </th><td><input type="text" name="age"></td></tr>--}}
            {{--<tr><th></th><td><input type="submit" value="send"></td></tr>--}}
        {{--</form>--}}
    {{--</table>--}}
   @endsection

   @section('footer')
   copyright 2017 tuyano.
   @endsection
