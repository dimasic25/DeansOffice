@extends('layout')

@section('title', isset($student) ? 'Update note' : 'Create new note')

@section('content')
    <form method="post"
          @if(isset($student))action="{{ route('students.update', [$group, $student->id]) }}"
          @else
          action="{{ route('students.store', $group) }}"
        @endif>
        @csrf
        @isset($student)
            @method('put')
        @endisset
        <div class=" form-group">
            <label for="formGroupExampleInput">Name</label>
            <input name="name"
                   value="{{isset($student) ? $student->name : null}}" type="text" class="form-control"
                   id="formGroupExampleInput" placeholder="Name">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Date_birth</label>
            <input name="date_birth"
                   value="{{isset($student) ? $student->date_birth : null}}" type="date"
                   class="form-control"
                   id="formGroupExampleInput">
        </div>

        <div class="form-group mb-2">
            <label for="formGroupExampleInput">Group</label>
            <input name="group_id"
                   value="{{isset($student) ? $student->group_id : $id}}" type="text" readonly
                   class="form-control"
                   id="formGroupExampleInput" placeholder="Group_id">
        </div>

            <button class="btn btn-primary btn-lg" type="submit">{{isset($student) ? 'Update' : 'Create'}}</button>
            <a class="btn btn-secondary btn-lg" href="{{route('students.index', $id)}}" role="button">Back to Groups</a>



    </form>
@endsection
