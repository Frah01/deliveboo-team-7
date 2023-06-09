@extends('layouts.admin')

@section('content')
<div class="container dish">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 d-flex justify-content-end" >
            <div class="p-3">
                <a href="{{ route('admin.restaurants.index')}}" class="btn text-white fw-semibold indietro mt-3"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Torna ai ristoranti</a>
            </div>
        </div>
        <div class="offset-2 col-8 ">
            <h2 class="text-center mt-3"> Modifica {{$restaurant->nome}} </h2>
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
                <div class="mb-3 form-group ">
                    <label for="nome" class="control-label">Nome: </label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Inserisci il nome del ristorante" value="{{old('nome') ?? $restaurant->nome}}">
                </div>
                @error('nome')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group ">
                    <label for="indirizzo" class="control-label">Indirizzo: </label>
                    <input type="text" class="form-control" id="indirizzo" name="indirizzo" placeholder="Inserisci l'indirizzo" value="{{old('indirizzo') ?? $restaurant->indirizzo}}">
                </div>
                @error('indirizzo')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group ">
                    <label for="email" class="control-label">Email: </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Inserisci email" value="{{old('email') ?? $restaurant->email}}">
                </div>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group ">
                    <label for="partita_iva" class="control-label">Partita iva: </label>
                    <input type="text" class="form-control" id="partita_iva" name="partita_iva" placeholder="Inserisci la partita iva" value="{{old('partita_iva') ?? $restaurant->partita_iva}}">
                </div>
                @error('partita_iva')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group ">
                    <label for="telefono" class="control-label">Telefono: </label>
                    <input type="phone" class="form-control" id="telefono" name="telefono" placeholder="Inserisci un numero di telefono" value="{{old('telefono') ?? $restaurant->telefono}}">
                </div>
                @error('telefono')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="mb-3 form-group ">
                    <label class="control-label">Immagine in uso:</label>
                    <div class="mt-2 d-flex">
                        @if ((strpos($restaurant->immagine, "restaurant_image") !== false))
                        <img class="shadow w-25" src="{{asset('storage/'.$restaurant->immagine)}}">
                    @else
                        @if ($restaurant->immagine)
                        <img class="shadow w-25" src="{{asset($restaurant->immagine)}}">
                        @else 
                        <img class="shadow w-25" src="https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png" alt="immagine-non-disponibile">
                        @endif
                    @endif
                    </div>
                </div>
                <div class="mb-3 form-group ">
                    <label class="control-label">Immagine: </label>
                    <input type="file" name="immagine" id="immagine" class="form-control
                    @error('immagine')is-invalid @enderror">
                    @error('immagine')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-2 form-group ">
                    <label class="control-label">
                        Categorie:
                    </label>
                    @foreach ($categories as $category)
                        <div class="form-check @error('categories') is-invalid @enderror"></div>

                            @if($errors->any())
                            <input class="form-check-input" type="checkbox" value="{{$category->id}}" name="categories[]" {{in_array($category->id, old('categories', [])) ? 'checked' : ''}}>
                            <label class="form-check-label">{{$category->nome}}</label>
                            @else
                            <input class="form-check-input" type="checkbox" value="{{$category->id}}" name="categories[]" {{$restaurant->categories->contains($category) ? 'checked' : ''}}>
                            <label> {{$category->nome}}</label>
                            
                            @endif
                        

                    @endforeach
                </div>
                
                <div class="form-group mb-3 mt-3" >
                    <button type="submit" class="btn indietro text-white fw-semibold ">
                        Salva
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\UpdateRestaurantRequest') !!}
@endsection