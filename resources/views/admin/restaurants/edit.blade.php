@extends('layouts.admin')

@section('content')
<div class="container dish">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"> Modifica: {{$restaurant->nome}} </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ( $errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.restaurants.update', $restaurant->slug)}}" method="POST" class="mt-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 form-group my-3 mx-5">
                    <label for="nome" class="control-label">Nome: </label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserisci il nome del ristorante" value="{{old('nome') ?? $restaurant->nome}}">
                </div>
                @error('nome')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group my-3 mx-5">
                    <label for="slug" class="control-label">Slug: </label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Inserisci lo slug del ristorante" value="{{old('slug') ?? $restaurant->slug}}">
                </div>
                @error('slug')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group my-3 mx-5">
                    <label for="indirizzo" class="control-label">Indirizzo: </label>
                    <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="Inserisci l'indirizzo" value="{{old('indirizzo') ?? $restaurant->indirizzo}}">
                </div>
                @error('indirizzo')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group my-3 mx-5">
                    <label for="email" class="control-label">Email: </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Inserisci email" value="{{old('email') ?? $restaurant->email}}">
                </div>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group my-3 mx-5">
                    <label for="partita_iva" class="control-label">Partita iva: </label>
                    <input type="text" class="form-control" id="partita_iva" name="partita_iva" placeholder="Inserisci la partita iva" value="{{old('partita_iva') ?? $restaurant->partita_iva}}">
                </div>
                @error('partita_iva')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group my-3 mx-5">
                    <label for="telefono" class="control-label">Telefono: </label>
                    <input type="phone" class="form-control" id="telefono" name="telefono" placeholder="Inserisci un numero di telefono" value="{{old('telefono') ?? $restaurant->telefono}}">
                </div>
                @error('telefono')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
                <div class="form-group my-3 mx-5">
                    <label class="control-label">Immagine: </label>
                    <input type="file" name="immagine" id="immagine" class="form-control
                    @error('immagine')is-invalid @enderror">
                    @error('immagine')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group my-3 mx-5 d-flex justify-content-center" >
                    <button type="submit" class="btn btn-success my-3">
                        Salva
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>

@endsection