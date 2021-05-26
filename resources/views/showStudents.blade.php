@extends('layout')

@section('title', ''. $subject->name)

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Date_birth</th>
            <th scope="col">Group_id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $note)
            <tr>
                <th scope="row">{{$note->id}}</th>
                <td>
                   {{$note->name}}
                </td>
                <td>{{ $note->date_birth}}</td>
                <td>{{ $note->group_id }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a class="btn btn-secondary btn-lg mt-2" href="{{route('subjects.index', [$group, $student])}}" role="button">Back to Subjects</a>
@endsection
