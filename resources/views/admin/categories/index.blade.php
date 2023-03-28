@extends('layouts.admin')

@section('content')
    <div class="container">
            <div class="row mt-5">
                <div class="offset-1 col-10 d-flex justify-content-around">
                    <div class="my-4">
                        <h3>ELENCO DELLE CATEGORIE</h3>
                    </div>
                    <div class=" d-flex">
                        <a href="{{ route('admin.dashboard')}}" class="indietro btn text-white fw-semibold my-4"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Torna alla dashboard</a>
                        <a href="{{ route('admin.categories.create') }}" class="indietro btn text-white fw-semibold my-4 ms-2">Aggiungi</a>
                    </div>
                    <hr>
                </div>
            </div>
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="row">
            <div class="offset-1 col-10">
                <table class="table table-striped">
                    <thead>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Slug</th>
                        <th>Azioni</th>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id}}</td>
                                <td>{{ $category->nome}}</td>
                                <td>{{ $category->slug}}</td>
                                <td>
                                    <a href="{{ route('admin.categories.show', $category->slug)}}" title="Visualizza" class="btn btn-sm btn-square btn-primary">
                                        <i class="fas fa-eye text-black"></i>
                                    </a>
                                    <a href="{{ route('admin.categories.edit', $category->slug)}}" title="Modifica" class="btn btn-sm btn-square btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form class="d-inline-block" method="POST" action="{{route('admin.categories.destroy', ['category' => $category['slug']])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-square btn-danger confirm-delete-button m-1" data-title="{{$category->nome}}"><i class="fas fa-trash" ></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            {{-- <tr>
                                <td scope="row" colspan="4">
                                    <div class="alert text-center mb-0">
                                        <h2 class="alert-heading">PROGETTI NON DISPONIBILI!</h2>
                                        <hr>
                                        <p class="mb-0">Aggiungi nuovi progetti <a href="{{ route('admin.projects.create') }}">qui</a></p>
                                      </div>
                                </td>
                            </tr> --}}
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
   
@include('partials.modal_delete')
@endsection