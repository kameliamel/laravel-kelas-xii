@extends('admin.layout')

@section('title', 'Dashboard')
@section('page_title', 'Ringkasan Dashboard')

@section('content')
<div class="row">
  <div class="col-md-4 col-sm-6">
    <div class="stat-card" style="border-left-color: #337ab7;">
      <div>
        <div class="stat-number">{{ $totalFilms }}</div>
        <div class="stat-label">Total Film</div>
      </div>
      <i class="fa fa-film" style="color: #337ab7;"></i>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="stat-card" style="border-left-color: #5cb85c;">
      <div>
        <div class="stat-number">{{ $totalCasts }}</div>
        <div class="stat-label">Total Cast</div>
      </div>
      <i class="fa fa-users" style="color: #5cb85c;"></i>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="stat-card" style="border-left-color: #f0ad4e;">
      <div>
        <div class="stat-number">{{ $totalGenres }}</div>
        <div class="stat-label">Total Genre</div>
      </div>
      <i class="fa fa-tags" style="color: #f0ad4e;"></i>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="stat-card" style="border-left-color: #5bc0de;">
      <div>
        <div class="stat-number">{{ $totalPerans }}</div>
        <div class="stat-label">Total Peran</div>
      </div>
      <i class="fa fa-user-secret" style="color: #5bc0de;"></i>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="stat-card" style="border-left-color: #d9534f;">
      <div>
        <div class="stat-number">{{ $totalKritiks }}</div>
        <div class="stat-label">Total Komentar</div>
      </div>
      <i class="fa fa-comments" style="color: #d9534f;"></i>
    </div>
  </div>

  <div class="col-md-4 col-sm-6">
    <div class="stat-card" style="border-left-color: #6f42c1;">
      <div>
        <div class="stat-number">{{ $totalUsers }}</div>
        <div class="stat-label">Total User</div>
      </div>
      <i class="fa fa-user" style="color: #6f42c1;"></i>
    </div>
  </div>
</div>

<div class="panel-admin">
  <div class="panel-heading">
    <h3><i class="fa fa-info-circle"></i> Selamat Datang di Dashboard Admin</h3>
  </div>
  <div class="panel-body">
    <p>Gunakan menu di sidebar sebelah kiri untuk mengelola master data film, cast/pemeran, genre, relasi peran aktor, ulasan/komentar pengunjung, serta data pengguna sistem.</p>
  </div>
</div>
@endsection
