@extends('layout')

@section('title', 'Students')

@section('content')
    <a class="btn btn-primary" href="{{route('students.create')}}" role="button">Add new Student</a>
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
                   {{$student->name}}
                </td>
                <td>{{ $student->date_birth}}</td>
                <td>
                    <form method="post" action="{{ route('students.destroy', $student)}}">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary" href="{{route('students.edit',  $student)}}" role="button">Edit</a>
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
{{--    <form method="post" action="{{ route('groups.destroy', $group)}}">--}}
{{--        <div class="btn-group mt-2" role="group" aria-label="Basic example">--}}
{{--            <a class="btn btn-primary" href="{{route('groups.edit', $group)}}" role="button">Edit</a>--}}
{{--            @csrf--}}
{{--            @method('delete')--}}
{{--            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--        </div>--}}
{{--    </form>--}}

    <a class="btn btn-secondary btn-lg mt-2" href="{{route('groups.index')}}" role="button">Back to Groups</a>
@endsection
