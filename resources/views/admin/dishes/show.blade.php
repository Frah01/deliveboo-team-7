@extends('layouts.admin')
@section('content')
<div class="container back-grey">
    <div class="row">
        <div class="col ">
            <div class="d-flex justify-content-center p-2">
                <a href="{{route('admin.dishes.index')}}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-arrow-left mx-1"></i><span class="mx-1">Torna ai piatti</span></a>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <div class="card p-0 shadow" style="width: 36rem;">
                <img src="{{asset($dish->immagine)}}" class="card-img-top" alt="...">
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