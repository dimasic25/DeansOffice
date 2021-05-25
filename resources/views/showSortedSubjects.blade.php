@extends('layout')

@section('title', 'Subjects')

@section('content')
    <a class="btn btn-primary" href="{{route('subjects.create')}}" role="button">Add new Subject</a>
    {{--    <a class="btn btn-primary" href="{{route('subjects.sort')}}" role="button">Sort</a>--}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Mark</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
            <tr>
                <th scope="row">{{$subject->id}}</th>
                <td>
                    {{$subject->name}}
                </td>
                <td>{{ $subject->mark}}</td>
                <td>
                    <form method="post" action="{{ route('subjects.destroy', $subject)}}">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary" href="{{route('subjects.edit',  $subject)}}" role="button">Edit</a>
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a class="btn btn-secondary btn-lg mt-2" href="{{route('students.index')}}" role="button">Back to Students</a>
@endsection
