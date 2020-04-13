@extends('layouts.global')

@section('content')

<!-- Title -->
<div class="hk-pg-header mx-10">
  <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon">
        &nbsp; <i data-feather="user"></i></span></span>{{$title}}</h4>
</div>
<!-- /Title -->
{{--  conten  --}}
<div class="col-xl-12">
  <a href="{{ route('create.user') }}" class="btn btn-primary mb-10 add" title="Add User" id="addUser">Add
    User</a>
  <section class="hk-sec-wrapper">
    <div class="row">
      <div class="col-sm">
        <div class="table-wrap">
          <table id="myTable" class="table tablesaw table-hover mb-0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Status</th>
                <th>Action</th>
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

<link rel="stylesheet" href="{{ asset('theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.css') }}">
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
<script src="{{ asset('theme/vendors4/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('theme') }}/vendors4/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('theme') }}/dist/js/dataTables-data.js"></script>
<script src="{{ asset('js/app/users.js') }}"></script>
<script>
  $('#myTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            searchable: false,
            ajax: "{{ route('data.user') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'gambar', name: 'gambar', orderable : false},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action'},
            ]
        });
</script>
@endpush
