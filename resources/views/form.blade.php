@extends('layout')

@section('title', isset($group) ? 'Update note' : 'Create new note')

@section('content')
    <form method="post"
          @if(isset($group))action="{{ route('groups.update', $group) }}"
          @else
          action="{{ route('groups.store') }}"
        @endif>
        @csrf
        @isset($group)
            @method('put')
        @endisset
        <div class=" form-group">
            <label for="formGroupExampleInput">Name</label>
            <input name="name"
                   value="{{isset($group) ? $group->name : null}}" type="text" class="form-control"
                   id="formGroupExampleInput" placeholder="Name">
        </div>

        <div class="form-group mb-2">
            <label for="formGroupExampleInput">Year</label>
            <input name="year"
                   value="{{isset($group) ? $group->year : null}}" type="text"
                   class="form-control"
                   id="formGroupExampleInput" placeholder="Year">
        </div>


           <button class="btn btn-primary btn-lg" type="submit">{{isset($group) ? 'Update' : 'Create'}}</button>
            <a class="btn btn-secondary btn-lg" href="{{route('groups.index')}}" role="button">Back to Groups</a>

    </form>
@endsection
