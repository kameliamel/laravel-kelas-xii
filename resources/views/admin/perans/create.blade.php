@extends('admin.layout')

@section('title', 'Tambah Peran')
@section('page_title', 'Tambah Peran Baru')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Form Tambah Peran</h3>
    <a href="{{ route('admin.perans.index') }}" class="btn btn-default btn-sm">
      <i class="fa fa-arrow-left"></i> Kembali
    </a>
  </div>
  <div class="panel-body">
    <form action="{{ route('admin.perans.store') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="actor">Nama Karakter / Tokoh <span class="text-danger">*</span></label>
        <input type="text" name="actor" id="actor" class="form-control" placeholder="Contoh: Iron Man / Tony Stark" value="{{ old('actor') }}" required>
      </div>

      <div class="form-group">
        <label for="film_id">Film <span class="text-danger">*</span></label>
        <select name="film_id" id="film_id" class="form-control" required>
          <option value="">-- Pilih Film --</option>
          @foreach ($films as $film)
            <option value="{{ $film->id }}" {{ old('film_id') == $film->id ? 'selected' : '' }}>
              {{ $film->title }} ({{ $film->year }})
            </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="cast_id">Pemeran (Cast) <span class="text-danger">*</span></label>
        <select name="cast_id" id="cast_id" class="form-control" required>
          <option value="">-- Pilih Pemeran --</option>
          @foreach ($casts as $cast)
            <option value="{{ $cast->id }}" {{ old('cast_id') == $cast->id ? 'selected' : '' }}>
              {{ $cast->name }}
            </option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Simpan Peran
      </button>
      <a href="{{ route('admin.perans.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
