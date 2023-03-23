@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex">
            <div>
                <h2>{{$restaurant->nome}}</h2>
            </div>
            <div>
                <a href="{{route('admin.restaurants.index')}}" class="btn btn-primary">torna ai ristoranti </a>
            </div>
            
        </div>
        <div class="col-12">
            
            
            <strong>Slug:</strong><p>{{$restaurant->slug}}</p>
            <strong>titolo</strong>
            <p>{{$restaurant->nome}}</p>
            <img src="{{$restaurant->immagine}}" class="cover-img img img-fluid" alt="{{$restaurant->nome}}">
            <strong>indirizzo</strong>
            <p>{{$restaurant->indirizzo}}</p>
            <strong>numero di telefono</strong>
            <p>{{$restaurant->telefono}}</p>
            <strong>email</strong>
            <p>{{$restaurant->email}}</p>
            <strong>partita iva</strong>
            <p>{{$restaurant->partita_iva}}</p>
            
        </div>
    </div>
</div>


@endsection