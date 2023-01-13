@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>New Comic</h1>

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

        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                {{-- con old('title') stampo il valore se è presente in sessione --}}
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}" placeholder="Insert title">
                @error('title')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb" id="thumb" value="{{ old('thumb') }}" placeholder="Insert the thumb's URL">
                @error('thumb')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price *</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ old('price') }}" placeholder="Insert price in €">
                @error('price')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" id="series" value="{{ old('series') }}" placeholder="Insert series">
                @error('series')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale Date *</label>
                <input type="text" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" id="sale_date" value="{{ old('sale_date') }}" placeholder="Insert sale date">
                @error('sale_date')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{ old('type') }}" placeholder="Insert type">
                @error('type')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <p class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
            </div>

              <button type="submit" class="btn btn-primary mb-5">Submit</button>
        </form>

    </div>
@endsection
