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
  LAPORAN TIKET {{ ' '.$model['kode'] }}
</h3>
<div class="row">
  <div class="table-responsive">
    <table width="100%" border="0" class="table table-flush">
      <tr>
        <th class="text-left" width="20%">Katagori Sepatu</th>
        <td class="text-right" width="2%">:</td>
        <td>{{ $model['category'] }}</td>
        <td>&nbsp;</td>
        <th class="text-left" width="15%">Pelanggan</th>
        <td class="text-right" width="2%">:</td>
        <td>{{ $model['costumer'] }}</td>
      </tr>
      <tr>
        <th class="text-left">Kode Sepatu</th>
        <td>:</td>
        <td colspan="5">{{ $model['kode'] }}</td>
      </tr>
      <tr>
        <th class="text-left">Jenis Complain</th>
        <td>:</td>
        <td colspan="5">{{ $model['jenis_complain'] }}</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <th colspan="3">Sebelum</th>
        <td>&nbsp;</td>
        <th colspan="3">Sesudah</th>
      </tr>
      <tr>
        <td colspan="3"><img src="{{asset('storage/'.$model['before'])}}" width="100px" /></td>
        <td>&nbsp;</td>
        <td colspan="3"><img src="{{asset('storage/'.$model['after'])}}" width="100px" /></td>
      </tr>
      <tr>
        <td>Komplain</td>
        <td>:</td>
        <td colspan="5">{{ $model['complain'] }}</td>
      </tr>
      @if ($model['result'])
      <tr>
        <td>Hasil Produk</td>
        <td>:</td>
        <td colspan="5">{{ $model['result'] }}</td>
      </tr>
      @endif
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
      <tr>
        <td>Inspek PMQA</td>
        <td>:</td>
        <td colspan="5">{{ $model['hasil'] }}</td>
      </tr>
      @if ($model['hasil_produksi'])
      <tr>
        <td>Inspek Produk</td>
        <td>:</td>
        <td colspan="5">{{ $model['hasil_produksi'] }}</td>
      </tr>
      @endif
    </table>
  </div>
</div>
