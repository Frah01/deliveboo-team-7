@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>ELENCO PIATTI</h2>
                    </div>
                    <div>
                        <a href="{{ route('admin.dishes.create') }}" class="btn btn-sm btn-primary">Aggiungi piatto</a>
                    </div>
                </div>
                <hr>
            </div>
            @if (session('message'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="row">
                    @foreach ($dishes as $dish)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 my-3 ">
                        <div class="mx-2 h-100 shadow rounded card-restaurant">
                            <div class="show-icon card">
                                <ul class="mb-0 ps-0 d-flex">
                                    <li class="p-1">
                                        <a href="{{ route('admin.dishes.show', $dish->slug)}}" title="Visualizza" class="btn btn-square bg-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </li>
                                    <li class="p-1">
                                        <a href="{{ route('admin.dishes.edit', $dish->slug)}}" title="Modifica" class="btn btn-square btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </li>
                                    <li class="p-1">
                                        <form class="d-inline-block" method="POST" action="{{route('admin.dishes.destroy', ['dish' => $dish['slug']])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger confirm-delete-button" data-title="{{$dish->nome}}" title="Elimina"><i class="fas fa-trash" ></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="card h-100">
                                <div class="h-200 position-relative">
                                    @if ((strpos($dish->immagine, "dish_image") !== false))
                                        <img class="card-img-top" src="{{asset('storage/'.$dish->immagine)}}">
                                    @else
                                        @if ($dish->immagine)
                                        <img class="card-img-top" src="{{asset($dish->immagine)}}">
                                        @else 
                                        <img class="card-img-top" src="https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png" alt="immagine-non-disponibile">
                                        @endif
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><strong>{{$dish->nome}}</strong></h5>
                                    <div><em><strong>Tipologia: </strong></em>{{$dish->tipologia}}</div>
                                    <div class="card-title d-inline-block"><strong>Disponibile: </strong></div>
                                    @if ($dish->disponibile == true)
                                       <span>  Sì  </span>
                                    @else
                                        <div class="badge-disponibile">Prodotto Terminato!</div>
                                       <span > No </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@include('partials.modal_delete')
@endsection
