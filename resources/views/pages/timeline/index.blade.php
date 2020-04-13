@extends('layouts.global')

@section('content')
<!-- Title -->
<div class="hk-pg-header mb-10 px-10">
  <div>
    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
            data-feather="activity"></i></span></span>{{ $header }}</h4>
  </div>
</div>
<!-- /Title -->
<div class="col-xl-12">
  <div class="card card-lg">
    <h5 class="card-header">
      {{ $title }}
    </h5>
    <h6 class="card-header">
      {{ 'Kode : '.$tiket->kode}}
    </h6>
    <div class="card-body">
      @foreach ($timeline as $item)
      <div class="user-activity">
        <div class="media">
          <div class="media-img-wrap">
            <div class="avatar avatar-sm">
              <img src="{{asset('storage/')}}{{$item->avatar}}" alt="user" class="avatar-img rounded-circle">
            </div>
          </div>
          <div class="media-body">
            <div>
              {{-- labael timeine --}}
              <span class="d-block mb-5"><span
                  class="font-weight-500 text-dark text-capitalize">{{$item->name}}</span><span
                  class="pl-5">{{$item->stat}}</span></span>
              {{-- time Response --}}
              <span class="d-block font-13 mb-20">{{ date('d F Y H:i:s', strtotime($item->tanggal)) }}</span>
            </div>
            @if ($item->images)
            <img class="d-150 rounded mb-15 mr-15" src="{{asset('storage/') .'/'}}{{$item->images}}" alt="thumb">
            @endif
            <div class="d-block mb-20">
              <strong>Deskripsi</strong><br>
              <p>{{$item->description}} @if ($item->stat == 'CLOSED')
                {{$item->name}}
                @endif</p>
            </div>
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </div>
</div>
@endsection
