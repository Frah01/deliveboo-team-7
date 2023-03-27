@extends('layouts.admin')
@section('content')

<div class="container dish">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-end" >
            <div class="mx-5 p-3">
                <a href="{{ route('admin.dishes.index')}}" class="btn text-white fw-semibold indietro mt-3"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Torna ai piatti</a>
            </div>
        </div>
        <div class="col-12 col-md-8 offset-md-2">
            <h2 class="text-center mt-3 mx-5"> Modifica {{$dish->nome}} </h2>
        </div>
    </div>
    <div class="row ">
        <div class="mx-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ( $errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
        <div class="col-12 col-md-8 offset-md-2 ">
            <form action="{{route('admin.dishes.update', $dish->slug)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="form-group col-dish mx-5 pt-3">
                <label class="control-label">Nome piatto</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="inserisci nome piatto" value="{{old('nome') ?? $dish->nome}}">
                @error('nome')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-dish my-3 mx-5">
                <label class="control-label">Immagine in uso</label>
                <div class="mt-2 d-flex ">
                    <img class="shadow w-25" src="{{$dish->immagine}}" alt="{{$dish->immagine}}" class="w-50">
                </div>
            </div>
            <div class="form-group col-dish  my-3 mx-5">
                <label class="control-label ">Nuova immagine</label>
                <input type="file" name="immagine" id="immagine" class="form-control" @error('immagine')is-invalid @enderror>
            </div>
            <div class="form-group col-dish  my-3 mx-5">
                <label class="control-label">Prezzo</label>
                <input type="text" name="prezzo" id="prezzo" class="form-control" placeholder="inserisci prezzo" value="{{old('prezzo') ?? $dish->prezzo}}">
                @error('prezzo')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-dish  my-3 mx-5">
                <label class="control-label">Ingredienti</label>
                <input type="text" name="ingredienti" class="form-control" placeholder="inserisci ingredienti" value="{{old('ingredienti') ?? $dish->ingredienti}}">
                @error('ingredienti')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group col-dish mx-5 pb-4">
                <label class="control-label">Tipologia</label>
                <select class="form-select" aria-label="Seleziona la tipologia di piatto" name="tipologia" id="tipologia">
                    <option  selected disabled>Seleziona la tipologia di piatto</option>
                    <option value="antipasto" @if (old('tipologia') == 'antipasto') selected @endif>Antipasto</option>
                    <option value="primo">Primo</option>
                    <option value="secondo">Secondo</option>
                    <option value="dolce">Dolce</option>
                    <option value="bibita">Bibita</option>
                  </select>
            </div>
            <div class="form-group my-3 mx-5">
                <button type="submit" class="btn text-white fw-semibold indietro">Salva</button>
            </div>
            </form>
        </div>
    </div>
</div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\UpdateDishRequest') !!}

@endsection