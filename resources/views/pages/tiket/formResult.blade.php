<div class="row">
  <div class="col-sm">
    <form action="{{ route('tiket.update', ['id'=>$model->id])}}" method="post">
      @csrf
      <input type="hidden" value="PUT" name="_method">

      <div class="form-group row">
        <label for="id" class="col-sm-4 col-form-label">Tiket No</label>
        <div class="col-sm-10">
          <input value="{{old('id') ? old('id') : $model->id}}"
            class="form-control {{$errors->first('id') ? "is-invalid" : ""}}" type="text" name="id" id="id" readonly />
        </div>
      </div>
      <div class="form-group row">
        <label for="id" class="col-sm-4 col-form-label">Kode Sepatu</label>
        <div class="col-sm-10">
          <input value="{{old('kode') ? old('kode') : $model->kode}}"
            class="form-control {{$errors->first('kode') ? "is-invalid" : ""}}" type="text" name="kode" id="kode"
            readonly />
        </div>
      </div>
    </form>
  </div>
</div>
