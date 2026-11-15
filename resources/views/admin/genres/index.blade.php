@extends('admin.layout')

@section('title', 'Kelola Genre')
@section('page_title', 'Kelola Genre Film')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Daftar Genre</h3>
    <a href="{{ route('admin.genres.create') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-plus"></i> Tambah Genre
    </a>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="width: 50px;">#</th>
            <th>Nama Genre</th>
            <th style="width: 140px; text-align: center;">Jumlah Film</th>
            <th style="width: 140px; text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($genres as $index => $genre)
            <tr>
              <td>{{ $genres->firstItem() + $index }}</td>
              <td><strong>{{ $genre->name }}</strong></td>
              <td style="text-align: center;">
                <span class="badge">{{ $genre->films_count ?? 0 }} film</span>
              </td>
              <td style="text-align: center;">
                <a href="{{ route('admin.genres.edit', $genre) }}" class="btn btn-warning btn-xs" title="Edit">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                <form action="{{ route('admin.genres.destroy', $genre) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus genre ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-xs" title="Hapus">
                    <i class="fa fa-trash"></i> Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center text-muted">Belum ada data genre.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="text-center">
      {{ $genres->links() }}
    </div>
  </div>
</div>
@endsection
