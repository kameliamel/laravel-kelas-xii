@extends('admin.layout')

@section('title', 'Edit User')
@section('page_title', 'Edit User: ' . $user->name)

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Form Edit User</h3>
    <a href="{{ route('admin.users.index') }}" class="btn btn-default btn-sm">
      <i class="fa fa-arrow-left"></i> Kembali
    </a>
  </div>
  <div class="panel-body">
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
      </div>

      <div class="form-group">
        <label for="email">Alamat Email <span class="text-danger">*</span></label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="password">Password Baru (Kosongkan jika tidak ingin mengubah password)</label>
            <input type="password" name="password" id="password" minlength="8" class="form-control" placeholder="Min. 8 karakter">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="role_id">Role Pengguna <span class="text-danger">*</span></label>
            <select name="role_id" id="role_id" class="form-control" required>
              <option value="">-- Pilih Role --</option>
              @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                  {{ $role->name }} (ID: {{ $role->id }})
                </option>
              @endforeach
            </select>
            @if (Auth::id() === $user->id)
              <small class="text-muted"><i class="fa fa-info-circle"></i> Ini adalah akun Anda sendiri. Role tidak boleh diubah dari Admin.</small>
            @endif
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Perbarui User
      </button>
      <a href="{{ route('admin.users.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
