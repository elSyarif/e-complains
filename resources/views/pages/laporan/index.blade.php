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
    <a href="{{route('download.pdf')}}" class="text-secondary mr-15" target="_blank"><span class="feather-icon"><i
          data-feather="download"></i></span></a>
    <a href="{{route('tiket.pdf')}}" class="btn btn-primary btn-sm" target="_blank">Preview</a>
  </div>
</div>
<!-- /Title -->
{{--  conten  --}}
<div class="col-xl-12">
  <section class="hk-sec-wrapper">
    <div class="row">
      <div class="col-sm">
        <div class="table-wrap">
          <table id="myTable" class="table tablesaw table-hover mb-0">
            <thead>
              <tr>
                <th width="15%">Kode Memo</th>
                <th>Kode Sepatu</th>
                <th>Jenis Komplain</th>
                <th>Pesan</th>
                <th width="15%">Hasil Inspek</th>
                <th>Status</th>
                {{-- <th>Action</th> --}}
              </tr>

            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
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
<script src="{{ asset('js/app/result.js') }}"></script>
<script>
  $('#myTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searchable: false,
            ajax: "{{ route('laporan.table') }}",
            columns: [
                {data: 'id', name: 'kode'},
                {data: 'kode', name: 'Artic'},
                {data: 'jenis_complain', name: 'jenis_complain'},
                {data: 'complain', name: 'complain'},
                {data: 'hasil', name: 'hasil', orderable : false},
                {data: 'result', name: 'result'}
                // {data: 'action', name: 'action'}
            ],
            columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }
            ]
        });
</script>
@endpush
