@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-between">
            <div class="my-4 mx-3">
                <h3>AGGIUNGI NUOVO RISTORANTE</h3>
            </div>
            <div class="mx-3">
                <a href="{{ route('admin.restaurants.index')}}" class="indietro btn text-white fw-semibold my-4"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Torna ai ristoranti</a>
            </div>
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
            <form action="{{route('admin.restaurants.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group">
                    <label for="nome" class="control-label">Nome: </label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserisci il nome del ristorante">
                </div>
                @error('nome')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group">
                    <label for="slug" class="control-label">Slug: </label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Inserisci lo slug del ristorante">
                </div>
                @error('slug')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group">
                    <label for="indirizzo" class="control-label">Indirizzo: </label>
                    <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="Inserisci l'indirizzo">
                </div>
                @error('indirizzo')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group">
                    <label for="email" class="control-label">Email: </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Inserisci email">
                </div>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group">
                    <label for="partita_iva" class="control-label">Partita iva: </label>
                    <input type="text" class="form-control" id="partita_iva" name="partita_iva" placeholder="Inserisci la partita iva">
                </div>
                @error('partita_iva')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group">
                    <label for="telefono" class="control-label">Telefono: </label>
                    <input type="phone" class="form-control" id="telefono" name="telefono" placeholder="Inserisci un numero di telefono">
                </div>
                @error('telefono')
                <div class="text-danger">{{$message}}</div>
                @enderror
                
                <div class="form-group my-3">
                    <label class="control-label">Immagine: </label>
                    <input type="file" name="immagine" id="immagine" class="form-control
                    @error('immagine')is-invalid @enderror">
                    @error('immagine')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                        <label for="nome" class="control-label">Categoria: </label>
                    @foreach ($categories as $category)
                    <div>
                    <input class="mx-2" type="checkbox" value="{{$category->id}}" name="categories[]">
                    <label class="form-check-label">{{$category->nome}}</label>  
                    </div>
                    @endforeach
                </div>
                </div>
                @error('categoria')
                    <div class="text-danger">{{$message}}</div>
                @enderror

                <button type="submit" class="btn indietro text-white fw-semibold ms-3 mb-5">
                    Salva
                </button>
            </form>
        </div>
    </div>
</div>
   
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\StoreRestaurantRequest') !!}
@endsection