@extends('layouts.app')

@section('content')

 <h1>id = {{ $task->id }} のタスク詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>タスク名</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>
    
    {!! link_to_route("tasks.edit","タスク名を変更する",["id" => $task->id],["class" => "btn btn-success"]) !!}
    
    {!! Form::model($task,["route" => ["tasks.destroy",$task->id],"method" => "delete"]) !!}
        {!! Form::submit("削除",["class" => "btn btn-primary"]) !!}
    {!! Form::close() !!}

@endsection
