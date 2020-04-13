@extends('layouts.global')

@section('content')
<div class="col-xl-12">
  <a href="{{ route('tiket.create') }}" class="btn btn-primary mb-10 modal-show" title="Tiket Complain"
    id="addTiket">Buat Tiket Baru</a>
  <section class="hk-sec-wrapper">
    <h5 class="hk-sec-title">{{ "Data Tiket Complain" }}</h5>
    <div class="row">
      <div class="col-sm">
        <div class="table-wrap">
          <div class="table-responsive">
            <table class="table table-hover table-bordered mb-0">
              <thead>
                <tr>
                  <th style="width: 2%;">{{ '#' }}</th>
                  <th>Katagori Sepatu</th>
                  <th>Kode Sepatu</th>
                  <th>Tipe Komplain</th>
                  <th>Gambar</th>
                  <th>Deskripsi</th>
                </tr>
              </thead>
              <tbody>
                @php
                $i=1;
                @endphp
                @foreach ($tikets as $row)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td> {{ $row->category }}</td>
                  <td>{{ $row->kode }} </td>
                  <td>{{ $row->jenis_complain }}</td>
                  <td> <img src="{{asset('storage/'.$row->images)}}" width="70px" /></td>
                  <td>{{ $row->description }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <br>
            {{ $tikets->links() }}
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.css') }}">

@endpush
@push('scripts')
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
@endpush
