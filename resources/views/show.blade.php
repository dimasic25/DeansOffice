@extends('layout')

@section('title', 'Students')

@section('content')
    <a class="btn btn-primary" href="{{route('students.create', $id)}}" role="button">Add new Student</a>
    <a class="btn btn-primary" href="{{route('students.sort', [$id, 1])}}" role="button">Sort by Name</a>
    <a class="btn btn-primary" href="{{route('students.sort', [$id, 2])}}" role="button">Sort by Date_birth</a>
    <a class="btn btn-primary" href="{{route('students.sort', [$id, 3])}}" role="button">Sort by Id</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Date_birth</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>
                    <a href="{{ route('students.show', [\App\Models\Student::find($student->id)->group, $student]) }}">{{$student->name}}</a>
                </td>
                <td>{{ $student->date_birth}}</td>
                <td>
                    <form method="post"
                          action="{{ route('students.destroy', [\App\Models\Student::find($student->id)->group,$student])}}">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary"
                               href="{{route('students.edit',  [\App\Models\Student::find($student->id)->group,$student])}}"
                               role="button">Edit</a>
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

    <a class="btn btn-secondary btn-lg mt-2" href="{{route('groups.index')}}" role="button">Back to Groups</a>
@endsection
