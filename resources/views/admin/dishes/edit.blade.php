@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <div class="my-5">
                <h5>modifica piatto: {{$dish->nome}}</h5>
            </div>
            <div>
                <a href="{{ route('admin.dishes.index')}}" class="btn btn-primary my-2"> torna ai piatti</a>
            </div>
        </div>
        <div class="col-12">
            <form action="{{route('admin.dishes.update', $dish->slug)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="form-group my-3">
                <label class="control-label">Nome piatto</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="inserisci nome piatto" value="{{old('nome') ?? $dish->nome}}">
            </div>
            <div class="form-group my-4">
                <label class="control-label">immagine in uso</label>
                <div>
                    <img src="{{$dish->immagine}}" alt="{{$dish->immagine}}" class="w-50">
                </div>
                <label class="control-label my-3">nuova immagine</label>
                <input type="file" name="immagine" id="immagine" class="form-control" @error('immagine')is-invalid @enderror>
            </div>
            <div class="form-group my-3">
                <label class="control-label">prezzo</label>
                <input type="text" name="prezzo" id="prezzo" class="form-control" placeholder="inserisci prezzo" value="{{old('prezzo') ?? $dish->prezzo}}">
            </div>
            <div class="form-group my-3">
                <label class="control-label">ingredienti</label>
                <input type="text" name="ingredienti" class="form-control" placeholder="inserisci ingredienti" value="{{old('ingredienti') ?? $dish->ingredienti}}">
            </div>
            <div class="form-group my-3">
                <label class="control-label">tipologia</label>
                <select name="tipologia" id="tipologia">
                    <option value="1">antipasto</option>
                    <option value="2">primo</option>
                    <option value="3">secondo</option>
                    <option value="4">dolce</option>
                    <option value="5">bibita</option>
                </select>
            </div>
            <div class="form-group my-3">
                <button type="submit" class="btn btn-success">salva</button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection