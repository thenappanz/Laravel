@extends('layout')

@section('content')
<h1 class="title">Create a New Project</h1>
<form method="POST" action="/projects">
     @csrf
     <div class="field">
         <label class="label" for="title">Title</label>
         <div class="control">
         <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" placeholder="Title" value="{{ old('title') }}">
         </div>
     </div>
     <div class="field">
         <label class="label" for="description">Description</label>
         <div class="control">
            <textarea name="description" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}">{{ old('description') }}</textarea>
         </div>
     </div>
     <div class="field">
         <div class="control">
             <button type="submit" class="button is-success">Create Project</button>
         </div>
     </div>
     
     @include('errors')
    
 </form>
@endsection
