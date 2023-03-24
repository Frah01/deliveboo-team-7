@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <div class="my-4">
                <h3>INSERISCI NUOVO PIATTO</h3>
            </div>
            <div>
                <a href="{{ route('admin.dishes.index')}}" class="indietro btn btn-primary my-4"> torna ai piatti</a>
            </div>
        </div>
        <div class="col-12">
            <form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group my-3 mx-5 ">
                <label class="control-label"><strong>Nome piatto</strong> </label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="inserisci nome piatto">
            </div>
            <div class="form-group my-3 mx-5">
                <label class="control-label"><strong>immagine</strong> </label>
                <input type="file" name="immagine" id="immagine" class="form-control">
            </div>
            <div class="form-group my-3 mx-5">
                <label class="control-label"><strong>prezzo</strong> </label>
                <input type="text" name="prezzo" id="prezzo" class="form-control" placeholder="inserisci prezzo">
            </div>
            <div class="form-group my-3 mx-5">
                <label class="control-label"><strong>ingredienti</strong> </label>
                <input type="text" name="ingredienti" class="form-control" placeholder="inserisci ingredienti">
            </div>
            <div class="form-group my-3 mx-5">
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
                <button type="submit" class="btn btn-success salva"><strong>SALVA</strong></button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection