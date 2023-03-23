@extends('layouts.admin')
@section('content')
<div class="container back-grey">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-start p-2">
                <a class="btn btn-primary" href="{{route('admin.dishes.index')}}"><i class="fa-solid fa-arrow-left mx-1"></i><span class="mx-2">Torna ai tuoi piatti</span></a>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-8">
            <div class="d-flex  align-items-center">  
                <div class="mt-3 mx-2">
                    <div>
                        <h4 >Nome Piatto:</h4>
                        <p class=" text-uppercase fw-semibold">{{$dish['nome']}}</p>
                    </div>
                    <div>
                        <h4 class="fw-semibold">Immagine</h4> 
                        <div class="d-flex my-2">
                            <img class="img-fluid shadow" src="{{asset('storage/' .$dish->immagine)}}" alt="{{$dish->nome}}" class="w-50"> 
                        </div>
                    </div>
                    <div>
                        <h4 class="fw-semibold">Prezzo:</h4> 
                        <p class="fw-semibold">{{$dish['prezzo']}}</p>  
                    </div>
                    <div>
                        <h4 class="fw-semibold">Ingredienti:</h4> 
                        <p class="fw-semibold">{{$dish['ingredienti']}}</p>  
                    </div>
                    <div>
                        <h4 class="fw-semibold">Tipo:</h4> 
                        <p class="fw-semibold">{{$dish['tipologia']}}</p>  
                    </div>
                    <div>
                        <h4 class="fw-semibold">Slug:</h4> 
                        <p class="fw-semibold">{{$dish['slug']}}</p>  
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection