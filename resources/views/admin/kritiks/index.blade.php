@extends('admin.layout')

@section('title', 'Kelola Komentar')
@section('page_title', 'Kelola Komentar & Ulasan Film')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Daftar Komentar / Kritik</h3>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="width: 50px;">#</th>
            <th style="width: 160px;">Pengguna (User)</th>
            <th style="width: 200px;">Judul Film</th>
            <th>Isi Komentar</th>
            <th style="width: 100px; text-align: center;">Rating</th>
            <th style="width: 140px; text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($kritiks as $index => $kritik)
            <tr>
              <td>{{ $kritiks->firstItem() + $index }}</td>
              <td>
                <strong>{{ $kritik->user->name ?? 'User Terhapus' }}</strong>
                <br><small class="text-muted">{{ $kritik->user->email ?? '-' }}</small>
              </td>
              <td>{{ $kritik->film->title ?? 'Film Terhapus' }}</td>
              <td>{{ $kritik->comment }}</td>
              <td style="text-align: center;">
                <span class="label label-warning" style="font-size: 13px;">
                  <i class="fa fa-star"></i> {{ $kritik->rating }}/5
                </span>
              </td>
              <td style="text-align: center;">
                <a href="{{ route('admin.kritiks.edit', $kritik) }}" class="btn btn-warning btn-xs" title="Edit">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                <form action="{{ route('admin.kritiks.destroy', $kritik) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
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
              <td colspan="6" class="text-center text-muted">Belum ada data komentar.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="text-center">
      {{ $kritiks->links() }}
    </div>
  </div>
</div>
@endsection
