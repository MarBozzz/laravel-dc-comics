@extends('layouts.main')

@section('content')
    <div class="container text-center">
        <h1>{{$comic->title}}</h1>
        <div>
            <img src="{{$comic->thumb}}" alt="{{$comic->title}}">
        </div>
        <p>Price: {{$comic->price}} €</p>
        <p>Series: {{$comic->series}}</p>
        <p>Sale date: {{$comic->sale_date}}</p>
        <p>Type: {{$comic->type}}</p>
        <p>{!!$comic->description!!}</p>
        <a class="btn btn-info" href="{{route('comics.index')}}">Torna all'elenco</a>
    </div>
@endsection
