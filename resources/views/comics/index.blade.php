@extends('layouts.main')

@section('content')


<div class="container">

<h1 class="whitebg text-center py-3">DC Comics</h1>

{{-- Se esiste la variabile di sessione 'deleted' impostata in controller destroy --}}
@if (session('deleted'))
<div class="alert alert-success text-center" role="alert">
    {{session('deleted')}}
</div>
@endif

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

                    {{-- passo il paramentro che occorre nell'include- potrei passare anche ['title'=>$comic->title, 'id'=>$comic->id]--}}
                    @include('partials.form-delete', ['comic'=>$comic])

                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>

@endsection
