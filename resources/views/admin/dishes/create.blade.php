@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-between">
            <div class="my-4 mx-3">
                <h3>INSERISCI NUOVO PIATTO</h3>
            </div>
            <div class="mx-3">
                <a href="{{ route('admin.restaurants.show', $restaurant_slug)}}" class="indietro btn text-white fw-semibold my-4"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Torna al ristorante</a>
            </div>
        </div>
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
            <form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group  ">
                <label class="control-label">Nome piatto</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="inserisci nome piatto">
                @error('nome')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group ">
                <label class="control-label">Immagine</label>
                <input type="file" name="immagine" id="immagine" class="form-control">
              
               
            </div>
            <div class="form-group ">
                <label class="control-label">Prezzo</label>
                <input type="text" name="prezzo" id="prezzo" class="form-control" placeholder="inserisci prezzo">
                @error('prezzo')
                    <div class="text-danger">{{$message}}</div>
               @enderror
            </div>
            <div class="form-group ">
                <label class="control-label">Ingredienti</label>
                <input type="text" name="ingredienti" class="form-control" placeholder="inserisci ingredienti">
                @error('ingredienti')
                    <div class="text-danger">{{$message}}</div>
               @enderror
            </div>
            <div class="form-group col-dish pb-4">
                <label class="control-label">Tipologia</label>
                <select class="form-select" aria-label="Seleziona la tipologia di piatto" name="tipologia" id="tipologia">
                    <option value="" selected disabled>Seleziona la tipologia di piatto</option>
                    <option value="antipasto">Antipasto</option>
                    <option value="primo">Primo</option>
                    <option value="secondo">Secondo</option>
                    <option value="pizza">Pizza</option>
                    <option value="dolce">Dolce</option>
                    <option value="bibita">Bibita</option>
                  </select>
                  @error('tipologia')
                      <div class="text-danger">{{$message}}</div>
                  @enderror
            </div>
            <div class="form-group ">
                <button type="submit" class="btn text-white indietro fw-semibold"><strong>Salva</strong></button>
            </div>
        </form>
    </div>
</div>
</div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\StoreDishRequest') !!}

@endsection