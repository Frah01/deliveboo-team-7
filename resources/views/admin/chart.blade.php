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
    const ctx = document.getElementById('myChart');
   const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3, 2, 4, 6, 7, 7, 10],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection 