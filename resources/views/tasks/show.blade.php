@extends('layouts.app')

@section('content')
<a href="/tasks" class="btn btn-default">  Go Back </a>
    <h1>{{$task->title}}</h1>
    <small>Created on {{$task->created_at}}</small>
    <hr>
    <div>
        {{$task->note}} 
    </div>
    <hr>
    <a href="/tasks/{{$task->id}}/edit" class="btn btn-success"> Edit Task </a>

    {!!Form::open(['action' => ['TasksController@destroy', $task->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection