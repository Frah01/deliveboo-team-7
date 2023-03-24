@extends('layouts.admin')

@section('content')
<div class="container dashboard-container">
    <h2 class="fs-4  my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header color-card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body color-card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('Hai effettuato correttamente l\'accesso al tuo account!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
