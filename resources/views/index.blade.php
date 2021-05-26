@extends('layout')

@section('title', 'Groups')

@section('content')
    <a class="btn btn-primary" href="{{route('groups.create')}}" role="button">Create new note</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Year</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <th scope="row">{{$group->id}}</th>
                <td>
                    <a href="{{ route('groups.show', $group) }}">{{ $group->name}}</a>
                </td>
                <td>{{ $group->year}}</td>
                <td>
                    <form method="post" action="{{ route('groups.destroy', $group)}}">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-primary" href="{{route('groups.edit',  $group)}}" role="button">Edit</a>
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
@endsection
