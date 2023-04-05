@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="offset-1 col-10 d-flex justify-content-around align-items-center">
                <div class="my-4">
                    <h3>ELENCO DEGLI ORDINI</h3>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.dashboard')}}" class="indietro btn text-white fw-semibold my-4"><i class="fa-sharp fa-solid fa-arrow-left me-2"></i>Torna alla dashboard</a>
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
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <th>Data</th>
                        <th>Numero Ordine</th>
                        <th>Nome cliente</th>
                        <th>Indirizzo</th>
                        <th>Prezzo Totale</th>
                        <th>Azioni</th>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->data}}</td>
                                <td>{{ $order->id}}</td>
                                <td>{{ $order->nome}} {{ $order->cognome}}</td>
                                <td>{{ $order->indirizzo}}</td>
                                <td>{{ $order->prezzo_totale}}</td>
                                {{-- <td>
                                    <a href="{{ route('admin.orders.show', $order->slug)}}" title="Visualizza" class="btn btn-sm btn-square btn-primary">
                                        <i class="fas fa-eye text-black"></i>
                                    </a>
                                    <a href="{{ route('admin.orders.edit', $order->slug)}}" title="Modifica" class="btn btn-sm btn-square btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form class="d-inline-block" method="POST" action="{{route('admin.orders.destroy', ['order' => $order['slug']])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-square btn-danger confirm-delete-button m-1" data-title="{{$order->nome}}"><i class="fas fa-trash" ></i></button>
                                    </form>
                                </td> --}}
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
    </div>
@include('partials.modal_delete')
@endsection