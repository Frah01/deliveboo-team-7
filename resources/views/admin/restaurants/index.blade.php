@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>ELENCO RISTORANTI</h2>
                    </div>
                    <div>
                        {{-- <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">Aggiungi categoria</a> --}}
                    </div>
                </div>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Slug</th>
                        <th>Azioni</th>
                    </thead>
                    <tbody>
                        @foreach ($restaurants as $restaurant)
                            <tr>
                                <td>{{ $restaurant->id}}</td>
                                <td>{{ $restaurant->nome}}</td>
                                <td>{{ $restaurant->slug}}</td>
                                <td>
                                    <a href="{{ route('admin.restaurants.show', $restaurant->slug)}}" title="Visualizza" class="btn btn-sm btn-square btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    {{-- <a href="{{ route('admin.posts.edit', $post->slug)}}" title="Modifica" class="btn btn-sm btn-square btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a> --}}
                                    <form class="d-inline-block" method="POST" action="{{route('admin.restaurants.destroy', ['restaurant' => $restaurant['slug']])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-square btn-danger confirm-delete-button m-1" data-title="{{$restaurant->name}}"><i class="fas fa-trash" ></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include('partials.modal_delete')
@endsection