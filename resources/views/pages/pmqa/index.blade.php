@extends('layouts.global')

@section('content')
{{--  conten  --}}
<div class="col-xl-12">
  <section class="hk-sec-wrapper">
    <div class="row">
      <div class="col-sm">
        <div class="table-wrap">
          <table id="myTable" class="table tablesaw table-hover mb-0">
            <thead>
              <tr>
                <th>Kode Memo</th>
                <th>Kode Sepatu</th>
                <th>Katagori Sepatu</th>
                <th>Tipe</th>
                <th>Pesan</th>
                <th>Status</th>
                <th>Aksi</th>
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
<script>
  debugger
        $('#myTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searchable: false,
            ajax: "{{ route('pmqa.list') }}",
            columns: [
                {data: 'auto_kode', name: 'auto_kode'},
                {data: 'kode', name: 'kode'},
                {data: 'category', name: 'category'},
                {data: 'jenis_complain', name: 'jenis_complain'},
                {data: 'pesan', name: 'pesan', orderable : false},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'}
            ]
        });
</script>
@endpush
