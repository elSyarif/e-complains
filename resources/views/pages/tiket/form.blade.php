@extends('layouts.global')

@section('content')

<div class="col-sm-12">
  <a href="{{ route('tiket.index') }}" class="btn btn-primary mb-10 modal-show" title="Tiket Complain"
    id="addTiket">Data Tiket</a>
  <section class="hk-sec-wrapper">
    <div class="row">
      <div class="col-sm">
        <form enctype="multipart/form-data" action="{{ route('tiket.store') }}" class="needs-validation" novalidate
          method="POST">
          @csrf
          <div class="form-row">
            <div class="col-md-12 mb-10 sm-12">
              <label for="category">Kategori Sepatu</label>
              <select name="category" id="category" class="form-control select2">
                <option>select</option>
                <option value="Running">Running</option>
                <option value="Walking Shoes">Walking Shoes</option>
                <option value="Onitsuka Tiger">Onitsuka Tiger</option>
                <option value="Haglofs">Haglofs</option>
                <option value="Asics Tiger">Asics Tiger</option>
              </select>
              <div class="er">

              </div>
            </div>
            <div class="col-md-6 mb-10 sm-12">
              <label for="kode">Kode Sepatu</label>
              <input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Sepatu" required>
              <div class="er">

              </div>
            </div>
            <div class="col-md-6 mb-10 sm-12">
              <label for="jenis_complain">Jenis Complain</label>
              <select name="jenis_complain" id="jenis_complain" class="form-control">
                <option value="PRODUCTION">PRODUCTION</option>
                <option value="PRODUCT">PRODUCT</option>
              </select>
              <div class="er">

              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="images">Gambar</label>
            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
              <div class="input-group-prepend">
                <span class="input-group-text">Unggah</span>
              </div>
              <div class="form-control text-truncate" data-trigger="fileinput"><i
                  class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
              <span class="input-group-append">
                <span class=" btn btn-primary btn-file"><span class="fileinput-new">Pilih File</span><span
                    class="fileinput-exists">Ganti</span>
                  <input id="image" type="file" name="image">
                </span>
                <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a>
              </span>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-10 sm-12">
              <label for="description">Deskripsi</label>
              <textarea class="form-control" name="description" id="description" required></textarea>
              <div class="er">

              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 mb-10 sm-12">
              <input class="btn btn-primary" type="submit" value="simpan">
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.css') }}">

<!-- select2 CSS -->
<link href="{{ asset('theme') }}/vendors4/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />

<!-- Daterangepicker CSS -->
<link href="{{ asset('theme') }}/vendors4/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />

@endpush
{{--    --}}
@push('scripts')
{{--  <script src="{{ asset('js/main.js') }}"></script> --}}
<script src="{{ asset('theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
<!-- Select2 JavaScript -->
<script src="{{ asset('theme') }}/vendors4/select2/dist/js/select2.full.min.js"></script>
<script src="{{ asset('theme') }}/dist/js/select2-data.js"></script>

<!-- Daterangepicker JavaScript -->
<script src="{{ asset('theme') }}/vendors4/moment/min/moment.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/daterangepicker/daterangepicker.js"></script>
<script src="{{ asset('theme') }}/dist/js/daterangepicker-data.js"></script>

@endpush
