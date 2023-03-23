@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row d-flex flex-wrap ">
            <h1 class="col-12 my-5 text-info">
                Elenco dei piatti: 
            </h1>
        @foreach ( $dishes as $dish )
        <div class="card-group">
            <a href="{{route('admin.dishes.show',  ['dish' => $dish['slug']])}}">
                <div class="card">
                    <img class="card-img-top" src="{{asset('storage/' .$dish->immagine)}}" alt="{{$dish->nome}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$dish->nome}}</h5>
                            <p class="card-text">Prezzo: {{$dish->prezzo}} euro</p>
                            <p class="card-text">Ingredienti utilizzati: {{$dish->ingredienti}}</p>
                            <p>Tecnologie:
                                @forelse ($dish->categories as $category)
                                <span>{{ $category->nome }}</span>
                                @empty
                                Nessuna categoria
                                @endforelse
                            </p>
                            
                        </div>
                </div>
            </a>
        </div>

        @endforeach
        </div>
    </div>
@endsection