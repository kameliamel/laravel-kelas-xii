@extends('admin.layout')

@section('title', 'Kelola Film')
@section('page_title', 'Kelola Film')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Daftar Film</h3>
    <a href="{{ route('admin.films.create') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-plus"></i> Tambah Film
    </a>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="width: 50px;">#</th>
            <th style="width: 80px;">Poster</th>
            <th>Judul</th>
            <th>Genre</th>
            <th style="width: 90px;">Tahun</th>
            <th>Sinopsis</th>
            <th style="width: 140px; text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($films as $index => $film)
            <tr>
              <td>{{ $films->firstItem() + $index }}</td>
              <td style="text-align: center;">
                @if ($film->poster)
                  <img src="/{{ $film->poster }}" alt="{{ $film->title }}" style="width: 50px; height: 70px; object-fit: cover; border-radius: 3px;">
                @else
                  <span class="text-muted">-</span>
                @endif
              </td>
              <td><strong>{{ $film->title }}</strong></td>
              <td><span class="label label-info">{{ $film->genre->name ?? '-' }}</span></td>
              <td>{{ $film->year }}</td>
              <td>{{ Str::limit($film->sinopsis, 90) }}</td>
              <td style="text-align: center;">
                <a href="{{ route('admin.films.edit', $film) }}" class="btn btn-warning btn-xs" title="Edit">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                <form action="{{ route('admin.films.destroy', $film) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus film ini? Semua peran & kritik terkait akan ikut terhapus.')">
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
              <td colspan="7" class="text-center text-muted">Belum ada data film.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="text-center">
      {{ $films->links() }}
    </div>
  </div>
</div>
@endsection
