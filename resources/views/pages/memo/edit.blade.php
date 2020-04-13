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
      <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Create Memo</h5>
        <div class="row">
          <div class="col-sm">
            <form action="" class="needs-validatio" id="memoForm" method="POST"> {{--add class was-validated --}}
              @csrf
              <div class="form-row">
                <div class="col-md-4 mb-10">
                  <label for="kode">Kode</label>
                  <input type="text" class="form-control form-control-lg" id="kode" name="kode"
                    value="{{ $memo->kode }}" {{ $memo->kode != null ? 'readonly' : ''}}>
                  <div id="feedback"></div>
                </div>
                <div class="col-md-4 mb-10">
                  <label for="tiket">Tiket No.</label>
                  <input type="text" class="form-control form-control-lg" id="tiket" name="tiket" value="{{ $memo->id}}"
                    value="{{ $memo->id }}" {{ $memo->id != null ? 'readonly' : ''}}>
                  <div id="feedback"></div>
                </div>
                <div class="col-md-4 mb-10">
                  <label for="to">Teruskan</label>
                  <select class="form-control select2-multiple" multiple="multiple" id="to" name="to[]">

                  </select>
                  <div id="feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-12 mb-10">
                  <label for="pesan">Pesan</label>
                  <textarea class="form-control" name="pesan" id="pesan" cols="30" rows="5"></textarea>
                </div>
              </div>
              <button class="btn btn-primary" type="submit">Submit Memo</button>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<!-- Select2 JavaScript -->
<script src="{{ asset('/theme/vendors4/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('/theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
{{-- <script src="{{ asset('/theme/dist/js/select2-data.js')}}"></script> --}}
<script>
  "use strict";
	$(".select2").select2();
	$("#to").select2({
			tags: true,
			tokenSeparators: [',', ' '],
			placeholder : 'Cari..',
			ajax:{
				url : 'to-user',
				dataType : 'json',
				delay : 200,
				processResults : function(data){
					debugger
					return{
						results : $.map(data, function(item){
							return{
								text : item.name,
								id : item.id
							}
						})
					};
				},
				cache : true
			}
	});
</script>
@endpush
