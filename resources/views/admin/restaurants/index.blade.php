@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>ELENCO RISTORANTI</h2>
                </div>
                <div>
                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-sm btn-primary">Aggiungi ristorante</a>
                </div>
            </div>
            <hr>
        </div>
        @if (session('message'))
        <div class="col-12">
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
        @endif
        @foreach ($restaurants as $restaurant)
        <div class="col-md-4 col-sm-6 my-3">
            <div class="mx-2 h-100 card-restaurant">
                <div class="show-icon card">
                    <ul class="mb-0 ps-0 d-flex">
                        <li class="p-1">
                            <a href="{{ route('admin.restaurants.show', $restaurant->slug)}}" title="Visualizza" class="btn btn-square bg-info">
                                <i class="fas fa-eye"></i>
                            </a>
                        </li>
                        <li class="p-1">
                            <a href="{{ route('admin.restaurants.edit', $restaurant->slug)}}" title="Modifica" class="btn btn-square btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                        </li>
                        <li class="p-1">
                            <form class="d-inline-block" method="POST" action="{{route('admin.restaurants.destroy', ['restaurant' => $restaurant['slug']])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-square btn-danger confirm-delete-button" data-title="{{$restaurant->nome}}" title="Elimina"><i class="fas fa-trash"></i></button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="card h-100">
                    <div>
                        <img class="card-img-top" src="{{asset($restaurant->immagine)}}" alt="{{$restaurant->nome}}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{$restaurant->nome}}</strong></h5>
                        <div>
                            <em><strong>Categoria: </strong></em>
                            @forelse($restaurant->categories as $category)
                            <p>{{$category->nome}}</p>
                            @empty
                            <p>nessuna categoria selezionata</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('partials.modal_delete')
@endsection
