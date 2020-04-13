@extends('layouts.global')
@php
$cont = DB::table('vpercent')->select('*')->get();
$data =[];
foreach ($cont as $value) {
$data['persent'] = (int)$value->persent;
$data['count'] = (int)$value->count;
}

$tabel = DB::table('vprogres AS L')->select(
'L.id',
'L.kode',
'L.tanggal',
DB::raw('f_users(L.users, 1) AS nama'),
DB::raw('f_users(L.users, 2) AS avatar'),
DB::raw('SUM(L.percent) AS persent')
)->groupBy('L.id')->havingRaw('SUM(L.percent) < ?', [100])->orderBy('L.tanggal', 'DESC')->paginate(5);
  @endphp

  @section('content')
  @if (Auth::user()->role_id !=6)
  <div class="row">
    <div class="col-xl-12">
      <div class="hk-row">
        {{-- Card for direkturs--}}
        <div class="col-lg-4 col-sm-6">
          <div class="card card-sm">
            <div class="card-body">
              <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">Tiket</span>
              <div class="d-flex align-items-center justify-content-between position-relative">
                <div>
                  <span class="d-block display-5 font-weight-400 text-dark">{{json_encode($data['count'])}}</span>
                </div>
                <div class="position-absolute r-0">
                  <span id="pie_chart_1" class="d-flex easy-pie-chart" data-percent="{{json_encode($data['persent'])}}">
                    <span class="percent head-font">{{json_encode($data['persent'])}}</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{--  --}}
        {{-- <div class="col-lg-4 col-sm-6">
        <div class="card card-sm">
          <div class="card-body">
            <span class="d-block font-11 font-weight-500 text-dark text-uppercase mb-10">New Tiket</span>
            <div class="d-flex align-items-center justify-content-between position-relative">
              <div>
                <span class="d-block display-5 font-weight-400 text-dark">{{json_encode($data['count'])}}</span>
      </div>
    </div>
  </div>
  </div>
  </div> --}}
  </div>
  {{--  --}}
  {{-- Card Tabel --}}
  <div class="card">
    <div class="card-body pa-0">
      <div class="table-wrap">
        <div class="table-responsive">
          <table class="table table-sm table-hover mb-0">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th>Nama Pelanggan</th>
                <th>Tiket No.</th>
                <th>Kode Sepatu</th>
                <th>Tanggal</th>
                <th class="w-20">Kemajuan %</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tabel as $key => $value)
              <tr>
                <td><img width="35" class="img-fluid rounded" src="{{asset('storage'.$value->avatar)}}" alt="icon">
                </td>
                <td>{{$value->nama}}</td>
                <td>{{$value->kode}}</td>
                <td>{{$value->kode}}</td>
                <td>{{date('d M Y', strtotime($value->tanggal))}}</td>
                <td>
                  <div class="progress-wrap lb-side-left mnw-125p">
                    <div class="progress-lb-wrap">
                      <label class="progress-label mnw-25p">{{(int)$value->persent}}%</label>
                      <div class="progress progress-bar-xs">
                        <div
                          class="progress-bar bg-{{(int)$value->persent <= 45 ? 'danger' :((int)$value->persent < 65 ? 'primary' : 'success' )}} w-{{(int)$value->persent}}"
                          role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <br>
          {{$tabel->links()}}
          <br>
        </div>
      </div>
    </div>
  </div>
  {{-- end Card Table --}}
  </div>
  </div>
  @else
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Dashboard</div>

          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
            @endif


          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  @endsection

  @push('scripts')
  <script src="{{asset('/theme/vendors4/easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>

  <script>
    $(document).ready(function(){
  $('.pagination').addClass('justify-content-center');

  if( $('#pie_chart_1').length > 0 ){
    $('#pie_chart_1').easyPieChart({
    barColor : '#3a55b1',
    lineWidth: 3,
    animate: 3000,
    size: 50,
    lineCap: 'square',
    scaleColor: '#f5f5f6',
    trackColor: '#f5f5f6',
    onStep: function(from, to, percent) {
      debugger
    $(this.el).find('.percent').text(Math.round(percent));
    }
    });
    }
});
  </script>
  @endpush
