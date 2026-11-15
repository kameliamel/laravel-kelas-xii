@extends('admin.layout')

@section('title', 'Tambah User')
@section('page_title', 'Tambah User Baru')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Form Tambah User</h3>
    <a href="{{ route('admin.users.index') }}" class="btn btn-default btn-sm">
      <i class="fa fa-arrow-left"></i> Kembali
    </a>
  </div>
  <div class="panel-body">
    <form action="{{ route('admin.users.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
      </div>

      <div class="form-group">
        <label for="email">Alamat Email <span class="text-danger">*</span></label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">Password (Min. 8 karakter) <span class="text-danger">*</span></label>
            <input type="password" name="password" id="password" minlength="8" class="form-control" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="role_id">Role Pengguna <span class="text-danger">*</span></label>
            <select name="role_id" id="role_id" class="form-control" required>
              <option value="">-- Pilih Role --</option>
              @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                  {{ $role->name }} (ID: {{ $role->id }})
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Simpan User
      </button>
      <a href="{{ route('admin.users.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
