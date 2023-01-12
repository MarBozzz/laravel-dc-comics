@extends('layouts.main')

@section('content')

<h1 class="whitebg text-center py-5">DC Comics</h1>

<div class="container">

<table class="table table-striped">
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
                <td> <a class="btn btn-primary" title="show" href="{{ route('comics.show', $comic) }}">Show</a> </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection
