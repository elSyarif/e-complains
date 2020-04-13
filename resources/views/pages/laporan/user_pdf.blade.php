@extends('layouts.global')

@section('content')
<!-- Title -->
<div class="hk-pg-header mb-10 ml-15 mr-15">
  <div>
    <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i
            data-feather="file"></i></span></span>{{$title}}</h4>
  </div>
  <div class="d-flex">
    {{-- <a href="#" class="text-secondary mr-15"><span class="feather-icon"><i data-feather="printer"></i></span></a> --}}
    <a href="#" class="text-secondary mr-15"><span class="feather-icon"><i data-feather="download"></i></span></a>

  </div>
</div>
<!-- /Title -->
{{--  conten  --}}
<div class="col-xl-12">
  <section class="hk-sec-wrapper">
    <div class="row">
      <div class="col-sm">
        <form action="{{route('export.pdf')}}" method="POST" id="pdf-export">
          @csrf
          <div class="form-row">
            <div class="col-md-4 mb-10">
              <label for="TiketComplain">Tiket Komplain</label>
              <select name="TiketComplain" id="TiketComplain" class="form-control">
                <option value="">--pilih--</option>
                @foreach ($tiket as $item)
                <option value="{{$item->id}}">{{$item->kode . ' | '.$item->category}}</option>
                @endforeach
              </select>
              <div id="feedback"></div>
            </div>
            <div class="col-md-4 mb-10 mt-35">
              <label for="result">&nbsp;</label>
              <button type="submit" class="btn btn-primary btn-sm" target="_blank">Preview</button type="submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
{{--  end Conten  --}}
@endsection
@push('css')
<!-- Data Table CSS -->
<link href="{{ asset('theme') }}/vendors4/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet"
  type="text/css" />
<link rel="stylesheet" href="{{ asset('theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.css') }}">
<link href="{{ asset('theme') }}/vendors4/datatables.net-responsive-dt/css/responsive.dataTables.min.css"
  rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<!-- Data Table JavaScript -->
<script src="{{ asset('theme') }}/vendors4/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/jszip/dist/jszip.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/pdfmake/build/vfs_fonts.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('theme') }}/dist/js/dataTables-data.js"></script>
<script src="{{ asset('theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
<script src="{{ asset('js/app/report.js') }}"></script>
@endpush
