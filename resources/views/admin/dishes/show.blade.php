@extends('layouts.admin')
@section('content')

<div class="container back-grey">
    <div class="row">
        <div class="col-12">
            <div class="offset-md-3 col-md-6 d-flex justify-content-between p-2 my-3">
                @if (Auth::user()->id == 1)
                    <a href="{{ route('admin.dishes.index')}}" class="indietro btn text-white fw-semibold"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Torna ai piatti</a>
                    <a href="{{ route('admin.restaurants.show', $slug)}}" class="indietro btn text-white fw-semibold"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Torna al ristorante</a>
                </div>
                @else
                <div class="offset-md-3 col-md-6 d-flex justify-content-center">
                    <a href="{{ route('admin.restaurants.show', $slug)}}" class="indietro btn text-white fw-semibold"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Torna al ristorante</a>
                </div>
                @endif
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card p-0 shadow" style="max-width: 36rem;">
                @if ((strpos($dish->immagine, "dish_image") !== false))
                    <img class="card-img-top" src="{{asset('storage/'.$dish->immagine)}}">
                @else
                    @if ($dish->immagine)
                    <img class="card-img-top" src="{{asset($dish->immagine)}}">
                    @else 
                    <img class="card-img-top" src="https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png" alt="immagine-non-disponibile">
                    @endif
                @endif
                <div class="card-body">
                  <h5 class="card-title">{{$dish->nome}}</h5>
                  <p class="card-text"><span class="fw-semibold">Prezzo: </span>{{$dish->prezzo}}</p>
                  <p class="card-text"><span class="fw-semibold">Ingredienti: </span>{{$dish->ingredienti}}</p>
                  <p class="card-text"><span class="fw-semibold">Tipologia: </span>{{$dish->tipologia}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection