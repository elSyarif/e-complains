@extends('layouts.global')

@section('content')
<div class="hk-pg-header mb-10 ml-15 mr-15">
  <div>
    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
            data-feather="bar-chart-2"></i></span></span>{{$title}}</h4>
  </div>
</div>
{{--  --}}
<div class="col-xl-12">
  <div class="hk-sec-wrapper">
    <div class="row">
      <div class="col-sm">
        <div class="table-wrap">
          <canvas id="canvas" height="180" width="600"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
{{-- Chart Config --}}
@push('scripts')
<script src="{{ asset('/theme/vendors4/chart.js/dist/Chart.bundle.js') }}" charset="utf-8"></script>
<script>
  var url = "{{route('chart.data')}}";
    var dataAssembling = {{$assembling}};
    var dataCutting = {{$cutting}};
    var dataSewing = {{$sewing}};
    var dataStockfit = {{$stockfit}};
    var forLabel ={!!$date!!};

    $(document).ready(function(){
      debugger
      var ChartData = {
          labels: forLabel,
          datasets: [
              {
                label: 'Cutting',
                backgroundColor: "rgba(255, 99, 132, 0.2)",
                data: dataCutting
              },
              {
                label: 'Sewing',
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                data: dataSewing
              },
              {
                label: 'Assembling',
                backgroundColor: "rgba(0, 255, 56, 0.2)",
                data: dataAssembling
              },
              {
                label: 'Stockfit',
                backgroundColor: "rgba(255, 159, 64, 0.2)",
                data: dataStockfit
              },
          ],
          borderWidth: 1
          };
      var ctx = document.getElementById("canvas").getContext('2d');
      var myChart = new Chart(ctx, {
      type: 'bar',
      data: ChartData,
      options: {
              responsive: true,
              tooltips: {
                mode: 'index',
                intersect: false,
              },
              hover: {
                mode: 'nearest',
                intersect: true
              },
              scales: {
              yAxes: [{
                    ticks: {
                      beginAtZero:true,
                    }
                }]
              }
          }
      });
    });
</script>
@endpush
