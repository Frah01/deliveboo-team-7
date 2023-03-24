@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="my-3 d-flex justify-content-center">
                <a href="{{route('admin.restaurants.index')}}" class="btn indietro text-white fw-semibold"><i class="fa-sharp fa-solid fa-arrow-left mx-1"></i><span class="mx-1">Torna ai ristoranti</span></a>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div class="card p-0 shadow" style="width: 36rem;">
                <img src="{{asset($restaurant->immagine)}}" class="card-img-top" alt="...">
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


@endsection