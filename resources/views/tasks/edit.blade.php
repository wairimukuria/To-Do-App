@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>
    <hr>
    {!! Form::open(['action' => ['TasksController@update', $task->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $task->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group">
            {{Form::label('note', 'Note')}}
            {{Form::textarea('note', $task->note, ['class' => 'form-control', 'placeholder' => 'Add Note'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
         {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
     {!! Form::close() !!}
@endsection