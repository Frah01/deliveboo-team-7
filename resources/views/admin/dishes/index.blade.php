@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row d-flex flex-wrap ">
            <h1 class="col-12 my-5 text-info">
                Elenco dei piatti: 
            </h1>
              @if(session('message'))
            <div class="alert alert-success my-3" >
                {{session('message')}}
            </div>
            @endif
        @foreach ( $dishes as $dish )
        <div class="card-group w-25 p-2">
            <a class="text-decoration-none text-black" href="{{route('admin.dishes.show',  ['dish' => $dish['slug']])}}">
                <div class="card">
                    <img class="card-img-top" src="{{asset($dish->immagine)}}" alt="{{$dish->nome}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$dish->nome}}</h5>
                            <p class="card-text">Prezzo: {{$dish->prezzo}} euro</p>
                            <p class="card-text">Ingredienti utilizzati: {{$dish->ingredienti}}</p> 
                            <form class="d-inline-block" method="POST" action="{{route('admin.dishes.destroy', ['dish' => $dish['slug']])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-square btn-danger confirm-delete-button m-1" data-title="{{$dish->name}}"><i class="fas fa-trash" ></i></button>
                            </form>
                        </div>
                </div>
            </a>
        </div>

        @endforeach
        </div>
    </div>
@include('partials.modal_delete')
@endsection