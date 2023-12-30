@extends('layouts.app')


@section('title','The List of tasks')




@section('content')
    
    <div>
        <a href="{{ route('tasks.create') }}">Add Task!</a>
    </div>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show',['id' => $task->id]) }}"> {{$task->title}} </a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
    

    @if ($tasks->count())
        <div>
            {{ $tasks->links() }}
        </div>
    @endif
@endsection

    
