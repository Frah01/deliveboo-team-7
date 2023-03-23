@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between">
            <div>
                <h5>inserisci nuovo piatto</h5>
            </div>
            <div>
                <a href="{{ route('admin.dishes.index')}}" class="btn btn-primary"> torna ai piatti</a>
            </div>
        </div>
        <div class="col-12">
            <form action="{{route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group my-3">
                <label class="control-label">Nome piatto</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="inserisci nome piatto">
            </div>
            <div class="form-group my-3">
                <label class="control-label">immagine</label>
                <input type="file" name="immagine" id="immagine" class="form-control">
            </div>
            <div class="form-group my-3">
                <label class="control-label">prezzo</label>
                <input type="text" name="prezzo" id="prezzo" class="form-control" placeholder="inserisci prezzo">
            </div>
            <div class="form-group my-3">
                <label class="control-label">ingredienti</label>
                <input type="text" name="ingredienti" class="form-control" placeholder="inserisci ingredienti">
            </div>
            

            <div class="form-group my-3">
                <button type="submit" class="btn btn-success">salva</button>
            </div>
            </form>
        </div>
    </div>
</div>



@endsection