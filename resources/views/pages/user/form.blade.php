<form enctype="multipart/form-data" action="{{ route('users.store') }}" class="needs-validation" novalidate
  method="POST" id="user-Form">
  @csrf
  <div class="form-row">
    <div class="col-md-6 mb-10 sm-12">
      <label for="nama">Nama </label>
      <input type="text" name="nama" id="nama" class="form-control select2">
      <div class="er">
      </div>
    </div>
    <div class="col-md-6 mb-10 sm-12">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
    </div>
    <div class="col-md-6 mb-10 sm-12">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control">
      <div class="er">

      </div>
    </div>
    <div class="col-md-6 mb-10 sm-12">
      <label for="role">Role AS</label>
      <select name="role" id="role" class="form-control">
        @php
        $role = \App\Role::whereNotIn('id', [6])->get();
        @endphp
        @foreach ($role as $item)
        <option value="{{$item->id}}">{{$item->role}}</option>
        @endforeach
      </select>
      <div class="er">

      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="avatar">Avatar</label>
    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
      <div class="input-group-prepend">
        <span class="input-group-text">Upload</span>
      </div>
      <div class="form-control text-truncate" data-trigger="fileinput"><i
          class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
      <span class="input-group-append">
        <span class=" btn btn-primary btn-file"><span class="fileinput-new">Select
            file</span><span class="fileinput-exists">Change</span>
          <input id="avatar" type="file" name="avatar">
        </span>
        <a href="#" class="btn btn-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
      </span>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-10 sm-12">
      <label for="status">Status</label>
      <select name="status" id="status" class="form-control">
        <option value="ACTIVE">ACTIVE</option>
        <option value="INACTIVE">INACTIVE</option>
      </select>
      <div class="er">

      </div>
    </div>
  </div>
  {{-- <div class="form-row">
    <div class="col-md-12 mb-10 sm-12">
      <input class="btn btn-primary" type="submit" value="simpan">
    </div>
  </div> --}}
  <div class="modal-footer" id="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="btn-save">Create</button>
  </div>
</form>
