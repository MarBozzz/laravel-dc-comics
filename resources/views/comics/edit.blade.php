@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Comic {{ $comic->title }}</h1>

        {{-- il metodo $errors->any() mi restituisce true se ci sono degli errori in sessione --}}
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
            {{-- con $errors->all() ottengo un array con tutti gli errori --}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('comics.update', $comic) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                {{-- con old('title') stampo il valore se è presente in sessione --}}
                {{-- il secondo parametro di old (opzionale)($comic->title) viene stapato se non è presente un old in sessione --}}
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $comic->title) }}" placeholder="Insert title">
                @error('title')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb" id="thumb" value="{{ old('thumb',$comic->thumb) }}" placeholder="Insert the thumb's URL">
                @error('thumb')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price *</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price',$comic->price) }}" placeholder="Insert price in €">
                @error('price')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" id="series" value="{{ old('series',$comic->series) }}" placeholder="Insert series">
                @error('series')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date *</label>
                <input type="text" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" id="sale_date" value="{{ old('sale_date',$comic->sale_date) }}" placeholder="Insert sale date">
                @error('sale_date')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{ old('type',$comic->type) }}" placeholder="Insert type">
                @error('type')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description',$comic->description) }}</textarea>
                @error('description')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

              <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>
        {{-- passo il paramentro che occorre nell'include- potrei passare anche ['title'=>$comic->title, 'id'=>$comic->id]--}}
        @include('partials.form-delete', ['comic'=>$comic])


    </div>
@endsection
