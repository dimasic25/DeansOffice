@extends('layout')

@section('title', 'Subjects')

@section('content')
    <a class="btn btn-primary" href="{{route('subjects.create', [$group, $student])}}" role="button">Add new Subject</a>
    <a class="btn btn-primary" href="{{route('subjects.sort', [$group, $student, 1])}}" role="button">Sort by Name</a>
    <a class="btn btn-primary" href="{{route('subjects.sort', [$group, $student, 2])}}" role="button">Sort by Mark</a>
    <a class="btn btn-primary" href="{{route('subjects.sort', [$group, $student, 3])}}" role="button">Sort by Id</a>
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
                    <form method="post" action="{{ route('subjects.destroy', [$group, $student, $subject])}}">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary" href="{{route('subjects.edit',  [$group, $student,$subject])}}" role="button">Edit</a>
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

    <a class="btn btn-secondary btn-lg mt-2" href="{{route('students.index', $group)}}" role="button">Back to Students</a>
@endsection
