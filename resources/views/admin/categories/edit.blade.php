@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>MODIFICA CATEGORIA</h2>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li><i class="fa-solid fa-triangle-exclamation"></i>{{ $error }}</li>    
                                    @endforeach                
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('admin.categories.update', $category->slug)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nome</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Titolo" value="{{ old('nome') ?? $category->nome}}">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" rows="5" name="descrizione" id="descrizione" placeholder="Contenuto">{{ $category->descrizione }}</textarea>
                                </div>
                            </div>
                            <div class="mb-4 row mb-0">
                                <div>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.index') }}">Indietro</a>
                                    <button class="btn btn-sm btn-success" type="submit">Aggiorna</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection