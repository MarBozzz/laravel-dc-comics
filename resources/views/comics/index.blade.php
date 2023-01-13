@extends('layouts.main')

@section('content')

<h1 class="whitebg text-center py-3">DC Comics</h1>

<div class="container">

<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Series</th>
        <th scope="col">Type</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($comics as $comic )
            <tr>
                <th scope="row">{{$comic->id}}</th>
                <td>{{$comic->title}}</td>
                <td>{{$comic->series}}</td>
                <td>{{$comic->type}}</td>
                <td>
                    <a class="btn btn-primary" title="show" href="{{ route('comics.show', $comic) }}">Show</a>
                    <a class="btn btn-warning" title="edit" href="{{ route('comics.edit', $comic) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection
