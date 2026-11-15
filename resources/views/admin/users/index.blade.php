@extends('admin.layout')

@section('title', 'Kelola User')
@section('page_title', 'Kelola Pengguna (User)')

@section('content')
<div class="panel-admin">
  <div class="panel-heading">
    <h3>Daftar Pengguna</h3>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">
      <i class="fa fa-plus"></i> Tambah User
    </a>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="width: 50px;">#</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th style="width: 140px; text-align: center;">Role</th>
            <th style="width: 140px; text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $index => $user)
            <tr>
              <td>{{ $users->firstItem() + $index }}</td>
              <td>
                <strong>{{ $user->name }}</strong>
                @if (Auth::id() === $user->id)
                  <span class="label label-primary" style="margin-left: 5px;">Akun Anda</span>
                @endif
              </td>
              <td>{{ $user->email }}</td>
              <td style="text-align: center;">
                @if ((int) $user->role_id === 2)
                  <span class="label label-danger">Admin</span>
                @else
                  <span class="label label-info">User Biasa</span>
                @endif
              </td>
              <td style="text-align: center;">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-xs" title="Edit">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                @if (Auth::id() !== $user->id)
                  <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus user ini? Kritik & profil miliknya akan ikut terhapus.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-xs" title="Hapus">
                      <i class="fa fa-trash"></i> Hapus
                    </button>
                  </form>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted">Belum ada data user.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="text-center">
      {{ $users->links() }}
    </div>
  </div>
</div>
@endsection
