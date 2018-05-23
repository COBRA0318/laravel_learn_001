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
            <tr><th>name: </th><td><input type="text" name="name"></td></tr>
            <tr><th>mail: </th><td><input type="text" name="mail"></td></tr>
            <tr><th>age:  </th><td><input type="text" name="age"></td></tr>
        </form>
    </table>
   @endsection

   @section('footer')
   copyright 2017 tuyano.
   @endsection
