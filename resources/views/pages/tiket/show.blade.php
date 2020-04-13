<div class="row">
  <div class="table-responsive">
    <table border="1" class="table table-flush">
      <tr>
        <th class="text-left">Katagori Sepatu</th>
        <td>:</td>
        <td>{{ $model['category'] }}</td>
        <td>&nbsp;</td>
        <th class="text-left">Pelanggan</th>
        <td>:</td>
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
      <tr>
        <td>Hasil Inspek</td>
        <td>:</td>
        <td colspan="5">{{ $model['result'] }}</td>
      </tr>
    </table>
  </div>
</div>
