@extends('admin.layout')

@section('title', 'Edit Komentar')
@section('page_title', 'Edit Komentar Film')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Form Edit Komentar</h3>
    <a href="{{ route('admin.kritiks.index') }}" class="btn btn-default btn-sm">
      <i class="fa fa-arrow-left"></i> Kembali
    </a>
  </div>
  <div class="panel-body">
    <form action="{{ route('admin.kritiks.update', $kritik) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Pengguna (User)</label>
            <input type="text" class="form-control" value="{{ $kritik->user->name ?? 'User Terhapus' }} ({{ $kritik->user->email ?? '-' }})" readonly style="background-color: #eee; cursor: not-allowed;">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Judul Film</label>
            <input type="text" class="form-control" value="{{ $kritik->film->title ?? 'Film Terhapus' }}" readonly style="background-color: #eee; cursor: not-allowed;">
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="rating">Rating (1 - 5) <span class="text-danger">*</span></label>
        <select name="rating" id="rating" class="form-control" required>
          <option value="">-- Pilih Rating --</option>
          @for ($i = 1; $i <= 5; $i++)
            <option value="{{ $i }}" {{ old('rating', $kritik->rating) == $i ? 'selected' : '' }}>
              {{ $i }} Bintang
            </option>
          @endfor
        </select>
      </div>

      <div class="form-group">
        <label for="comment">Isi Komentar (Maks. 500 karakter) <span class="text-danger">*</span></label>
        <textarea name="comment" id="comment" rows="5" maxlength="500" class="form-control" required>{{ old('comment', $kritik->comment) }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Perbarui Komentar
      </button>
      <a href="{{ route('admin.kritiks.index') }}" class="btn btn-default">Batal</a>
    </form>
  </div>
</div>
@endsection
