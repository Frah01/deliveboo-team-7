@extends('layouts.admin')
@section('content')

<div class="container dish">
    <div class="row ">
        <div class="col-12  d-flex justify-content-between ">
            <div class="my-5 col-titolo p-3 mx-5">
                <h5 class=>modifica piatto: {{$dish->nome}}</h5>
            </div>
            <div>
                <a href="{{ route('admin.dishes.index')}}" class="btn btn-primary indietro mx-5  my-5"> torna ai piatti</a>
            </div>
        </div>
        <div class="col-12 ">
            <form action="{{route('admin.dishes.update', $dish->slug)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="form-group col-dish 3 mx-5 pt-3">
                <label class="control-label"><strong>Nome piatto</strong> </label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="inserisci nome piatto" value="{{old('nome') ?? $dish->nome}}">
            </div>
            <div class="form-group col-dish  mx-5">
                <label class="control-label"><strong>immagine in uso</strong> </label>
                <div>
                    <img src="{{$dish->immagine}}" alt="{{$dish->immagine}}" class="w-50">
                </div>
                <label class="control-label "><strong>nuova immagine</strong> </label>
                <input type="file" name="immagine" id="immagine" class="form-control" @error('immagine')is-invalid @enderror>
            </div>
            <div class="form-group col-dish  mx-5">
                <label class="control-label"><strong>prezzo</strong> </label>
                <input type="text" name="prezzo" id="prezzo" class="form-control" placeholder="inserisci prezzo" value="{{old('prezzo') ?? $dish->prezzo}}">
            </div>
            <div class="form-group col-dish  mx-5">
                <label class="control-label"><strong>ingredienti</strong> </label>
                <input type="text" name="ingredienti" class="form-control" placeholder="inserisci ingredienti" value="{{old('ingredienti') ?? $dish->ingredienti}}">
            </div>
            <div class="form-group col-dish mx-5 pb-4">
                <label class="control-label"><strong>tipologia</strong> </label>
                <select name="tipologia" id="tipologia">
                    <option value="1">antipasto</option>
                    <option value="2">primo</option>
                    <option value="3">secondo</option>
                    <option value="4">dolce</option>
                    <option value="5">bibita</option>
                </select>
            </div>
            <div class="form-group my-3 mx-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-success salva"><strong>salva</strong> </button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection