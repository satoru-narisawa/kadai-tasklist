@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>タスク管理アプリにようこそ</h1>
            {!! link_to_route("signup.get","アカウント登録はこちら",[],["class"=>"btn btn-lg btn-primary"]) !!}
        </div>
    </div>
    @endif
@endsection