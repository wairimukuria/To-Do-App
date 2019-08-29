@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <hr>
                    <center><h3>To Do </h3></center>
                    <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/tasks/create" class="btn btn-primary"> Create Task </a>
                    <hr>
                    <h3> Your Tasks </h3>
                    @if(count($tasks) >0)
                    <table class="table table-stripped">
                            <tr>
                                <th>Title</th>
                                <th></td>
                                <td></td>
                            </tr>
                            @foreach($tasks as $task)
                            <tr>
                                <th>{{$task-> title}}</th>
                                <td><a href="/tasks/{{$task->id}}/edit" class="btn btn-default"> Edit </a></td>
                                <td>
                                        {!!Form::open(['action' => ['TasksController@destroy', $task->id], 'method' => 'POST', 'class'=>'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @else
                        <p> You have No Tasks Yet</p>
                        <p> Click on the "Add New Task to add a task.</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
