@extends('layouts.app')

@section('content')
<div class="jumbotron-deliveroo">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-login">
                    <div class="card-body text-center text-light my-3">Sei un ristoratore? Registrati alla piattaforma! </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.restaurants.store') }}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-4 row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right text-light">Nome Attività: </label>
    
                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
    
                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right text-light">Email: </label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right text-light">{{ __('Password: ') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-light">{{ __('Confirm Password:') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label for="indirizzo" class="col-md-4 col-form-label text-md-right text-light">Indirizzo: </label>
    
                                <div class="col-md-6">
                                    <input id="indirizzo" type="text" class="form-control @error('indirizzo') is-invalid @enderror" name="indirizzo" value="{{ old('indirizzo') }}" required autocomplete="indirizzo" autofocus>
    
                                    @error('indirizzo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="partita_iva" class="col-md-4 col-form-label text-md-right text-light">Partita Iva: </label>
    
                                <div class="col-md-6">
                                    <input id="partita_iva" type="text" class="form-control @error('partita_iva') is-invalid @enderror" name="partita_iva" value="{{ old('partita_iva') }}" required autocomplete="partita_iva" autofocus>
    
                                    @error('partita_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="immagine" class="col-md-4 col-form-label text-md-right text-light">Immagine: </label>
    
                                <div class="col-md-6">
                                    <input id="immagine" type="file" class="form-control @error('immagine') is-invalid @enderror" name="immagine" value="{{ old('immagine') }}" required autocomplete="immagine" autofocus>
    
                                    @error('immagine')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn button-login">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
