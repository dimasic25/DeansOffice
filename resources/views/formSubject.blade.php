@extends('layout')

@section('title', isset($subject) ? 'Update record' : 'Create new record')

@section('content')
    <form method="post"
          @if(isset($subject))action="{{ route('subjects.update', $subject) }}"
          @else
          action="{{ route('subjects.store') }}"
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

        <div class="form-group">
            <label for="formGroupExampleInput">Mark</label>
            <input name="mark"
                   value="{{isset($subject) ? $subject->mark : null}}" type="text"
                   class="form-control"
                   id="formGroupExampleInput" placeholder="Mark">
        </div>

        <button class="btn btn-primary btn-lg" type="submit">{{isset($subject) ? 'Update' : 'Create'}}</button>
        <a class="btn btn-secondary btn-lg" href="{{route('subjects.index', 1)}}" role="button">Back to Students</a>
    </form>
@endsection
