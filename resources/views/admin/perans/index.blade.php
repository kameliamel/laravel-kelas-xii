@extends('admin.layout')

@section('title', 'Kelola Peran')
@section('page_title', 'Kelola Peran / Karakter')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Daftar Peran</h3>
    <a href="{{ route('admin.perans.create') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-plus"></i> Tambah Peran
    </a>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="width: 50px;">#</th>
            <th>Nama Karakter / Peran</th>
            <th>Film</th>
            <th>Pemeran (Cast)</th>
            <th style="width: 140px; text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($perans as $index => $peran)
            <tr>
              <td>{{ $perans->firstItem() + $index }}</td>
              <td><strong>{{ $peran->actor }}</strong></td>
              <td>{{ $peran->film->title ?? '-' }}</td>
              <td><span class="label label-default">{{ $peran->cast->name ?? '-' }}</span></td>
              <td style="text-align: center;">
                <a href="{{ route('admin.perans.edit', $peran) }}" class="btn btn-warning btn-xs" title="Edit">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                <form action="{{ route('admin.perans.destroy', $peran) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus peran ini?')">
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
              <td colspan="5" class="text-center text-muted">Belum ada data peran.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="text-center">
      {{ $perans->links() }}
    </div>
  </div>
</div>
@endsection
