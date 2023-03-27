@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="my-3 d-flex justify-content-between">
                <a href="{{route('admin.restaurants.index')}}" class="btn indietro text-white fw-semibold"><i class="fa-sharp fa-solid fa-arrow-left mx-1"></i><span class="mx-1">Torna ai ristoranti</span></a>
                <a href="{{route('admin.dishes.create')}}" class="btn indietro text-white fw-semibold"><i class="fa-solid fa-utensils mx-1"></i><span class="mx-1">Aggiungi piatto</span></a>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div class="card p-0 shadow" style="width: 36rem;">
                @if ((strpos($restaurant->immagine, "restaurant_image") !== false))
                        <img class="card-img-top" src="{{asset('storage/'.$restaurant->immagine)}}">
                    @else
                        @if ($restaurant->immagine)
                        <img class="card-img-top" src="{{asset($restaurant->immagine)}}">
                        @else 
                        <img class="card-img-top" src="https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png" alt="immagine-non-disponibile">
                        @endif
                    @endif
                <div class="card-body">
                  <h5 class="card-title">{{$restaurant->nome}}</h5>
                  <p class="card-text"><span class="fw-semibold">Indirizzo: </span>{{$restaurant->indirizzo}}</p>
                  <p class="card-text"><span class="fw-semibold">Telefono: </span>{{$restaurant->telefono}}</p>
                  <p class="card-text"><span class="fw-semibold">Email: </span>{{$restaurant->email}}</p>
                  <p class="card-text"><span class="fw-semibold">Partita Iva: </span>{{$restaurant->partita_iva}}</p>
                  <p class="card-text"><span class="fw-semibold">Categoria:  @forelse($restaurant->categories as $category)
                <p>{{$category->nome}}</p>
                @empty
                <p>nessuna nessuna categoria selezionata</p> 
                @endforelse</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 mt-3">
            <h4>Piatti che appartengono a questa ristorante:</h4>
            <div class="row">
                @forelse ($restaurant->dishes as $dish)
                <div class="col-3 d-flex justify-content-center">
                    <div class="card p-0 shadow" style="width: 36rem;">
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
                @empty
                    <h5>Non ci sono piatti per questo ristorante</h5>
                @endforelse
            </div>
        </div>
    </div>
</div>


@endsection