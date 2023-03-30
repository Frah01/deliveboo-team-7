@extends('layouts.admin')
@section('content')
<div class="container" >
    <div class="row">
        <div class="col mt-5">
            <form action="/session" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <button class="btn text-white fw-semibold indietro" type="submit" id="checkout-live-button">Checkout</button>
            </form>
        </div>
    </div>
</div>
@endsection