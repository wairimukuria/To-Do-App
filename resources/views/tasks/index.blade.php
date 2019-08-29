@extends('layouts.app')

@section('content')
    <h1>Tasks</h1>
    <hr>
    @if(count($tasks) > 0 )
        @foreach($tasks as $task)
            <div class="well">
                <h3><a href="/tasks/{{$task->id}}">{{$task->title}}</a></h3>
                <small>Created on {{$task->created_at}}</small>
                {{-- created by (Optional
                by {{$task->user->name}}) --}}
            </div>
            <hr>
        @endforeach
        {{$tasks->links()}}
    @else
    <p> You do not have any tasks yet</p>
    @endif
@endsection