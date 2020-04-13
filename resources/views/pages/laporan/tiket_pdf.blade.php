@push('css')
<style>
  .page-break {
    page-break-after: always;
  }
</style>
<link href="{{ asset('theme') }}/dist/css/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
@endpush

<h3 class="text-center" style="text-align:center;">
  LAPORAN TIKET
</h3>
<div class="row">
  <div class="table-responsive">
    @foreach ($model as $item)
    <div class="page-break"></div>
    <table border="0" class="table table-flush" width="100%">
      <tr>
        <th class="text-left">Katagori Sepatu</th>
        <td>:</td>
        <td>{{ $item->category }}</td>
        <td>&nbsp;</td>
        <th class="text-left">Pelanggan</th>
        <td>:</td>
        <td>{{ $item->costumer }}</td>
      </tr>
      <tr>
        <th class="text-left">Kode Sepatu</th>
        <td>:</td>
        <td colspan="5">{{ $item->kode }}</td>
      </tr>
      <tr>
        <th class="text-left">Jenis Complain</th>
        <td>:</td>
        <td colspan="5">{{ $item->jenis_complain }}</td>
      </tr>
      <tr>
        <th colspan="3">Sebelum</th>
        <td>&nbsp;</td>
        <th colspan="3">Sesudah</th>
      </tr>
      <tr>
        <td colspan="3"><img src="{{asset('storage/'.$item->before)}}" width="100px" /></td>
        <td>&nbsp;</td>
        <td colspan="3"><img src="{{asset('storage/'.$item->after)}}" width="100px" /></td>
      </tr>
      <tr>
        <td>Komplain</td>
        <td>:</td>
        <td colspan="5">{{ $item->complain }}</td>
      </tr>
      @if ($item->result)
      <tr>
        <td>Hasil Produk</td>
        <td>:</td>
        <td colspan="5">{{ $item->result }}</td>
      </tr>
      @endif
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td>Inspek PMQA</td>
        <td>:</td>
        <td colspan="5">{{ $item->hasil }}</td>
      </tr>
      @if ($item->hasil_produksi)
      <tr>
        <td>Inspek Produk</td>
        <td>:</td>
        <td colspan="5">{{ $item->hasil_produksi }}</td>
      </tr>
      @endif
    </table>
    <hr>
    @endforeach

  </div>
</div>

@push('scrict')

@endpush
