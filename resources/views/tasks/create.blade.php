@extends('layouts.app')

@section('content')
    <h1>Add A New Task</h1>
    <hr>
    <!--Text Editor goes here-->
    {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>

        <div class="form-group">
            {{Form::label('note', 'Note')}}
            {{Form::textarea('note', '', ['class' => 'form-control', 'placeholder' => 'Add Note'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
