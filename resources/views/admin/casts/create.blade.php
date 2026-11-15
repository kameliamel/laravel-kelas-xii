@extends('admin.layout')

@section('title', 'Tambah Cast')
@section('page_title', 'Tambah Cast Baru')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Form Tambah Cast</h3>
    <a href="{{ route('admin.casts.index') }}" class="btn btn-default btn-sm">
      <i class="fa fa-arrow-left"></i> Kembali
    </a>
  </div>
  <div class="panel-body">
    <form action="{{ route('admin.casts.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Nama Pemeran / Cast (Maks. 45 karakter) <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" maxlength="45" class="form-control" value="{{ old('name') }}" required>
      </div>

      <div class="form-group">
        <label for="age">Umur (tahun) <span class="text-danger">*</span></label>
        <input type="number" name="age" id="age" min="1" max="150" class="form-control" value="{{ old('age') }}" required>
      </div>

      <div class="form-group">
        <label for="bio">Biografi <span class="text-danger">*</span></label>
        <textarea name="bio" id="bio" rows="5" class="form-control" required>{{ old('bio') }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Simpan Cast
      </button>
      <a href="{{ route('admin.casts.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
