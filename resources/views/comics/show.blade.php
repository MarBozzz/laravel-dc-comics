@extends('layouts.main')

@section('content')
    <div class="container text-center">
        <h1 class="mt-5">{{$comic->title}}</h1>
        <div class="d-flex my-5 justify-content-evenly">
            <div class="">
                <img class="" src="{{$comic->thumb}}" alt="{{$comic->title}}">
            </div>
            <div class="layover d-flex flex-column justify-content-between">
                <p><strong>Price: </strong>{{$comic->price}} €</p>
                <p><strong>Series: </strong>{{$comic->series}}</p>
                <p><strong>Sale date: </strong>{{$comic->sale_date}}</p>
                <p><strong>Type: </strong>{{$comic->type}}</p>
            </div>
        </div>
        <p class="layover">{!!$comic->description!!}</p>
        <a class="btn btn-info" href="{{route('comics.index')}}">Torna all'elenco</a>
    </div>
@endsection
