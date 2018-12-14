@extends('layout')

@section('content')

<h1 class="title">{{ $project->title }}</h1>

@can('update', $project)
    <p>Access to update</p>
@endcan

<div class="content">{{ $project->description }}</div>

<p style="margin-bottom: 1em;">
<a href="/projects/{{ $project->id }}/edit"  class="button is-primary"> Edit </a>
</p>

@if ($project->tasks->count())
    <div class="box">   
        @foreach ($project->tasks as $task)
           <div>
           <form method="POST" action="/tasks/{{ $task->id }}">
                @method('PATCH')
                @csrf
                <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->description }}
                </label>
            </form>
           </div>
        @endforeach
    </div>
@endif

<form class="box" method="POST" action="/projects/{{ $project->id }}/tasks" class="box">
    @csrf
    <div class="field">
         <label class="label" for="description">
             <div class="control">
                    <input type="text" class="input" name="description" placeholder="New Task">
             </div>        
            </label>
    </div>
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link">Add Task</button>
        </div>
    </div>
</form>


@include('errors')

@endsection