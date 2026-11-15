<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Dashboard') - OneMovies Admin</title>
  <link href="{{ asset('template/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    .admin-wrapper {
      display: flex;
      min-height: 100vh;
    }
    .admin-sidebar {
      width: 240px;
      background: #212529;
      color: #fff;
      flex-shrink: 0;
    }
    .admin-sidebar .sidebar-brand {
      padding: 18px 20px;
      font-size: 18px;
      font-weight: bold;
      color: #FF8D1B;
      border-bottom: 1px solid #343a40;
      display: block;
      text-decoration: none;
    }
    .admin-sidebar .sidebar-brand span {
      color: #fff;
    }
    .admin-sidebar ul.nav {
      padding: 10px 0;
      margin: 0;
      list-style: none;
    }
    .admin-sidebar ul.nav li a {
      color: #c2c7d0;
      padding: 12px 20px;
      display: block;
      text-decoration: none;
      font-size: 14px;
      transition: background 0.2s, color 0.2s;
    }
    .admin-sidebar ul.nav li a i {
      margin-right: 10px;
      width: 18px;
      text-align: center;
    }
    .admin-sidebar ul.nav li a:hover,
    .admin-sidebar ul.nav li.active a {
      background: #343a40;
      color: #FF8D1B;
    }
    .admin-sidebar .sidebar-footer {
      padding: 15px 20px;
      border-top: 1px solid #343a40;
    }
    .admin-content {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      overflow-x: hidden;
    }
    .admin-header {
      background: #fff;
      padding: 14px 25px;
      border-bottom: 1px solid #dee2e6;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .admin-main {
      padding: 25px;
      flex-grow: 1;
    }
    .panel-admin {
      background: #fff;
      border: 1px solid #e3e6f0;
      border-radius: 4px;
      box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,.05);
      margin-bottom: 25px;
    }
    .panel-admin .panel-heading {
      padding: 15px 20px;
      background: #fafafa;
      border-bottom: 1px solid #e3e6f0;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .panel-admin .panel-heading h3 {
      margin: 0;
      font-size: 16px;
      font-weight: 600;
      color: #333;
    }
    .panel-admin .panel-body {
      padding: 20px;
    }
    .stat-card {
      background: #fff;
      border-radius: 6px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.06);
      border-left: 4px solid #FF8D1B;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .stat-card .stat-number {
      font-size: 28px;
      font-weight: bold;
      color: #212529;
    }
    .stat-card .stat-label {
      color: #6c757d;
      font-size: 13px;
      text-transform: uppercase;
      font-weight: 600;
    }
    .stat-card i {
      font-size: 36px;
      color: #d1d5db;
    }
    .table > thead > tr > th {
      border-bottom: 2px solid #dee2e6;
      background-color: #f8f9fa;
      color: #495057;
      font-size: 13px;
      text-transform: uppercase;
    }
    .table > tbody > tr > td {
      vertical-align: middle;
      font-size: 14px;
    }
    .pagination {
      margin: 10px 0 0 0;
    }
  </style>
</head>
<body>
<div class="admin-wrapper">
  <!-- Sidebar -->
  <aside class="admin-sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
      One<span>Movies</span> Admin
    </a>
    <ul class="nav">
      <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
      </li>
      <li class="{{ request()->routeIs('admin.films.*') ? 'active' : '' }}">
        <a href="{{ route('admin.films.index') }}"><i class="fa fa-film"></i> Film</a>
      </li>
      <li class="{{ request()->routeIs('admin.casts.*') ? 'active' : '' }}">
        <a href="{{ route('admin.casts.index') }}"><i class="fa fa-users"></i> Cast</a>
      </li>
      <li class="{{ request()->routeIs('admin.genres.*') ? 'active' : '' }}">
        <a href="{{ route('admin.genres.index') }}"><i class="fa fa-tags"></i> Genre</a>
      </li>
      <li class="{{ request()->routeIs('admin.perans.*') ? 'active' : '' }}">
        <a href="{{ route('admin.perans.index') }}"><i class="fa fa-user-secret"></i> Peran</a>
      </li>
      <li class="{{ request()->routeIs('admin.kritiks.*') ? 'active' : '' }}">
        <a href="{{ route('admin.kritiks.index') }}"><i class="fa fa-comments"></i> Komentar</a>
      </li>
      <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
        <a href="{{ route('admin.users.index') }}"><i class="fa fa-user"></i> User</a>
      </li>
      <li>
        <a href="{{ route('home') }}" target="_blank"><i class="fa fa-external-link"></i> Website Utama</a>
      </li>
    </ul>
    <div class="sidebar-footer">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger btn-block btn-sm" style="font-weight: 600;">
          <i class="fa fa-sign-out"></i> Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- Content -->
  <div class="admin-content">
    <header class="admin-header">
      <div>
        <h4 style="margin: 0; font-weight: 600; color: #333;">@yield('page_title', 'Dashboard')</h4>
      </div>
      <div>
        <span style="color: #6c757d; font-size: 14px;">
          <i class="fa fa-user-circle"></i> {{ Auth::user()->name }} <span class="label label-warning" style="margin-left: 5px;">Admin</span>
        </span>
      </div>
    </header>

    <main class="admin-main">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
      @endif

      @if (session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Terjadi kesalahan input:</strong>
          <ul style="margin: 5px 0 0 20px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @yield('content')
    </main>
  </div>
</div>

<script src="{{ asset('template/js/jquery-2.1.4.min.js') }}"></script>
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
@yield('scripts')
</body>
</html>
