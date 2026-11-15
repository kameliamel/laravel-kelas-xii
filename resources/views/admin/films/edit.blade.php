@extends('admin.layout')

@section('title', 'Edit Film')
@section('page_title', 'Edit Film: ' . $film->title)

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Form Edit Film</h3>
    <a href="{{ route('admin.films.index') }}" class="btn btn-default btn-sm">
      <i class="fa fa-arrow-left"></i> Kembali
    </a>
  </div>
  <div class="panel-body">
    <form action="{{ route('admin.films.update', $film) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="title">Judul Film <span class="text-danger">*</span></label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $film->title) }}" required>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="genre_id">Genre <span class="text-danger">*</span></label>
            <select name="genre_id" id="genre_id" class="form-control" required>
              <option value="">-- Pilih Genre --</option>
              @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" {{ old('genre_id', $film->genre_id) == $genre->id ? 'selected' : '' }}>
                  {{ $genre->name }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="year">Tahun Rilis (1900 - 2100) <span class="text-danger">*</span></label>
            <input type="number" name="year" id="year" class="form-control" min="1900" max="2100" value="{{ old('year', $film->year) }}" required>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="poster">Poster Film (Biarkan kosong jika tidak ingin mengubah poster)</label>
        @if ($film->poster)
          <div style="margin-bottom: 10px;">
            <img src="/{{ $film->poster }}" alt="{{ $film->title }}" style="width: 100px; height: 140px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
            <span class="text-muted" style="margin-left: 10px; font-size: 13px;">Poster saat ini</span>
          </div>
        @endif
        <input type="file" name="poster" id="poster" class="form-control" accept="image/jpeg,image/png,image/webp,image/jpg">
      </div>

      <div class="form-group">
        <label for="sinopsis">Sinopsis <span class="text-danger">*</span></label>
        <textarea name="sinopsis" id="sinopsis" rows="5" class="form-control" required>{{ old('sinopsis', $film->sinopsis) }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Perbarui Film
      </button>
      <a href="{{ route('admin.films.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
