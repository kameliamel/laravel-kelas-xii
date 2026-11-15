@extends('admin.layout')

@section('title', 'Kelola Cast')
@section('page_title', 'Kelola Cast / Pemeran')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Daftar Cast</h3>
    <a href="{{ route('admin.casts.create') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-plus"></i> Tambah Cast
    </a>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="width: 50px;">#</th>
            <th>Nama</th>
            <th style="width: 90px;">Umur</th>
            <th>Biografi</th>
            <th style="width: 140px; text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($casts as $index => $cast)
            <tr>
              <td>{{ $casts->firstItem() + $index }}</td>
              <td><strong>{{ $cast->name }}</strong></td>
              <td>{{ $cast->age }} th</td>
              <td>{{ Str::limit($cast->bio, 120) }}</td>
              <td style="text-align: center;">
                <a href="{{ route('admin.casts.edit', $cast) }}" class="btn btn-warning btn-xs" title="Edit">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                <form action="{{ route('admin.casts.destroy', $cast) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus cast ini? Semua peran terkait juga akan dihapus.')">
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
              <td colspan="5" class="text-center text-muted">Belum ada data cast.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="text-center">
      {{ $casts->links() }}
    </div>
  </div>
</div>
@endsection
