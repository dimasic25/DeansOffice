@extends('layout')

@section('title', isset($subject) ? 'Update note' : 'Create new note')

@section('content')
    <form method="post"
          @if(isset($subject))action="{{ route('subjects.update', [$group, $student, $subject]) }}"
          @else
          action="{{ route('subjects.store', [$group, $student]) }}"
        @endif>
        @csrf
        @isset($subject)
            @method('put')
        @endisset
        <div class="form-group">
            <label for="formGroupExampleInput">Name</label>
            <input name="name"
                   value="{{isset($subject) ? $subject->name : null}}" type="text" class="form-control"
                   id="formGroupExampleInput" placeholder="Name">
        </div>

        <div class="form-group mb-2">
            <label for="formGroupExampleInput">Mark</label>
            <input name="mark"
                   value="{{isset($subject) ? $subject->mark : null}}" type="text"
                   class="form-control"
                   id="formGroupExampleInput" placeholder="Mark">
        </div>

        <button class="btn btn-primary btn-lg" type="submit">{{isset($subject) ? 'Update' : 'Create'}}</button>
        <a class="btn btn-secondary btn-lg" href="{{route('subjects.index', [$group, $student])}}" role="button">Back to Subjects</a>
    </form>
@endsection
