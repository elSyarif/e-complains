@extends('layouts.global')
@push('css')
<link href="{{ asset('/theme/vendors4/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet"
  type="text/css" />
@endpush

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="hk-sec-wrapper">
        <div class="hk-sec-title">
          <h3>{{$title}}</h3>
        </div>
        <div class="row">
          <div class="col-sm">
            <form action="" method="post" id="inspek-cek" enctype="multipart/form-data" class="needs-validation"
              novalidate>
              @csrf
              <div class="form-row">
                <div class="col-md-4 mb-10">
                  <label for="tiket_id">Tiket No</label>
                  <input type="text" class="form-control" id="tiket_id" name="tiket_id" value="{{ $memo['tiket_id'] }}"
                    {{ $memo['tiket_id'] != null ? 'readonly' : ''}}>
                  <div id="feedback"></div>
                </div>
                <div class="col-md-4 mb-10">
                  <label for="memo_id">Memo No</label>
                  <input type="text" class="form-control" id="memo_id" name="memo_id" value="{{ $memo['id'] }}"
                    {{ $memo['id'] != null ? 'readonly' : ''}}>
                  <div id="feedback"></div>
                </div>
                <div class="col-md-4 mb-10">
                  <label for="category">Katagori Sepatu</label>
                  <input type="text" class="form-control" id="category" name="category" value="{{ $memo['category'] }}"
                    {{ $memo['category'] != null ? 'readonly' : ''}}>
                  <div id="feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-10">
                  <label for="result">Hasil</label>
                  <select name="result" id="result" class="form-control" required>
                    <option value>--pilih--</option>
                    <option value="Cutting">Cutting</option>
                    <option value="Sewing">Sewing</option>
                    <option value="Assembling">Assembling</option>
                    <option value="Stockfit">Stockfit</option>
                  </select>
                  <div class="invalid-feedback">Please choose the column</div>
                </div>
                <div class="col-md-4 mb-10">
                  <div class="form-group">
                    <label for="images">Gambar</label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Unggah</span>
                      </div>
                      <div class="form-control text-truncate" data-trigger="fileinput"><i
                          class="glyphicon glyphicon-file fileinput-exists"></i> <span
                          class="fileinput-filename"></span>
                      </div>
                      <span class="input-group-append">
                        <span class=" btn btn-primary btn-file"><span class="fileinput-new">Pilih
                            file</span><span class="fileinput-exists">Ganti</span>
                          <input id="image" type="file" name="image" required>
                        </span>
                        <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Hapus</a>
                      </span>
                    </div>
                    <div class="invalid-feedback">Please choose the file</div>
                  </div>
                </div>
                <div class="form-group col-md-4 mb-10">
                  <label for="description">Deskripsi</label>
                  <textarea type="text" class="form-control" id="description" value="" name="description"
                    required></textarea>
                  <div class="invalid-feedback">Please fill the column</div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-4 mb-10">
                  <input type="submit" class="btn btn-primary" value="Simpan" name="simpan" id="inspekSimpan">
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

@push('scripts')
<script src="{{ asset('/theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
@endpush
