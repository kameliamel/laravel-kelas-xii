@extends('admin.layout')

@section('title', 'Tambah Genre')
@section('page_title', 'Tambah Genre Baru')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Form Tambah Genre</h3>
    <a href="{{ route('admin.genres.index') }}" class="btn btn-default btn-sm">
      <i class="fa fa-arrow-left"></i> Kembali
    </a>
  </div>
  <div class="panel-body">
    <form action="{{ route('admin.genres.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="name">Nama Genre <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Simpan Genre
      </button>
      <a href="{{ route('admin.genres.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
