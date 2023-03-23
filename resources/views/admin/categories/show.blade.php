@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>DETTAGLIO CATEGORIA</h2>
                    </div>
                    <div>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.index') }}">Torna all'elenco</a>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-12">
                <label class="d-block"><strong>Nome</strong></label>
                <p>{{ $category->nome }}</p>
                <label class="d-block"><strong>Descrizione</strong></label>
                @if ($category->descrizione)
                <p>{{ $category->descrizione }}</p>
                @else
                <p> ... descrizione non presente ...</p>                    
                @endif
            </div>
            <hr>
            <div class="col-12">
                <h4>Ristoranti che appartengono a questa categoria:</h4>
                {{-- <div class="row">
                    @forelse ($category->projects as $project)
                        <div class="col-12 col-md-3">
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h4>{{ $project->title}}</h4>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <a href="{{ route('admin.projects.show', $project->slug)}}" class="btn btn-sm btn-primary">Continua a leggere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h5>Non ci sono post per questa categoria</h5>
                    @endforelse
                </div> --}}
            </div>
        </div>
    </div>
@endsection