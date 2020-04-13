@extends('layouts.global')


@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Buat Memo Baru</h5>
        <div class="row">
          <div class="col-sm">
            <form action="" class="needs-validatio" id="memoForm"> {{--add class was-validated --}}
              <div class="form-row">
                <div class="col-md-4 mb-10">
                  <label for="kode">Kode Sepatu</label>
                  <input type="text" class="form-control" id="kode" name="kode">
                  <div id="feedback"></div>
                </div>
                <div class="col-md-4 mb-10">
                  <label for="tiket">Tiket No.</label>
                  <input type="text" class="form-control" id="tiket" name="tiket">
                  <div id="feedback"></div>
                </div>
                <div class="col-md-4 mb-10">
                  <label for="to">Teruskan</label>
                  <input type="text" class="form-control" id="to" name="to">
                  <div id="feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-10">
                  <label for="pesan">Pesan</label>
                  <textarea class="form-control" name="pesan" id="pesan" cols="30" rows="5"></textarea>
                </div>
              </div>
              <button class="btn btn-primary" type="submit">Simpan</button>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
@endsection
