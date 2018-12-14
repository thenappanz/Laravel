@extends('layout')

@section('content')
    <h1 class="title">Projects</h1>
    <div style="margin-bottom: 1em;">
        <a  class="button is-primary" href="/projects/create"> Create Project </a>
    </div>
    <ul>
        @foreach ($projects as $project)
        <li>
                <a href="/projects/{{ $project->id }}"> {{ $project->title }} </a>
        </li>
        @endforeach 
    </ul>
@endsection
