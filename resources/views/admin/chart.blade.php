@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col mt-5" >
            <canvas id="myChart"></canvas> 
        </div>
    </div>
</div>
<script>
    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};
    const data = {
        labels: labels,
        datasets: [{
            label: 'Ordini',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users,
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
  </script>
@endsection 