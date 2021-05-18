@extends('layout')

@section('title', 'Groups')

@section('content')
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id: {{$group->id}}</li>
            <li class="list-group-item">Title: {{$group->name}}</li>
            <li class="list-group-item">Date: {{$group->year}}</li>
        </ul>
    </div>
    <form method="post" action="{{ route('groups.destroy', $group)}}">
        <div class="btn-group mt-2" role="group" aria-label="Basic example">
            <a class="btn btn-primary" href="{{route('groups.edit', $group)}}" role="button">Edit</a>
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>

    <a class="btn btn-secondary btn-lg mt-2" href="{{route('groups.index')}}" role="button">Back to Groups</a>
@endsection
