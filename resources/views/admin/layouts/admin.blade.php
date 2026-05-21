<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Admin') | Portfolio</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" crossorigin="anonymous" />
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Poppins', sans-serif; background: #f4f6f9; }
    .admin-wrapper { display: flex; min-height: 100vh; }

    /* Sidebar */
    .sidebar { width: 240px; background: linear-gradient(180deg,#1a1a2e,#16213e); color:#fff; position:fixed; height:100vh; overflow-y:auto; }
    .sidebar-brand { padding:24px 20px; border-bottom:1px solid rgba(255,255,255,.1); display:flex; align-items:center; gap:12px; }
    .sidebar-brand i { color:#00cba9; font-size:1.4rem; }
    .sidebar-brand h2 { font-size:1rem; font-weight:600; }
    .sidebar-brand span { font-size:.7rem; color:#00cba9; display:block; }
    .sidebar-menu { padding:12px 0; }
    .sidebar-menu h6 { padding:8px 20px; font-size:.62rem; text-transform:uppercase; letter-spacing:1.5px; color:rgba(255,255,255,.35); margin-top:8px; }
    .sidebar-menu a { display:flex; align-items:center; gap:10px; padding:11px 20px; color:rgba(255,255,255,.7); text-decoration:none; font-size:.85rem; border-left:3px solid transparent; transition:all .2s; }
    .sidebar-menu a:hover, .sidebar-menu a.active { background:rgba(0,203,169,.1); color:#00cba9; border-left-color:#00cba9; }
    .sidebar-menu a i { width:16px; text-align:center; }
    .badge-count { margin-left:auto; background:#ef4444; color:#fff; border-radius:20px; padding:1px 7px; font-size:.7rem; }

    /* Main */
    .main-content { margin-left:240px; flex:1; display:flex; flex-direction:column; }
    .topbar { background:#fff; padding:14px 24px; display:flex; align-items:center; justify-content:space-between; box-shadow:0 1px 4px rgba(0,0,0,.07); position:sticky; top:0; z-index:100; }
    .topbar h1 { font-size:1.05rem; color:#1a1a2e; font-weight:600; }
    .topbar-user { display:flex; align-items:center; gap:12px; font-size:.85rem; color:#555; }
    .avatar { width:34px; height:34px; border-radius:50%; background:linear-gradient(135deg,#00cba9,#1a1a2e); display:flex; align-items:center; justify-content:center; color:#fff; font-weight:600; font-size:.85rem; }
    .topbar-user form button { background:none; border:none; color:#e74c3c; cursor:pointer; font-size:.85rem; font-family:'Poppins',sans-serif; display:flex; align-items:center; gap:5px; padding:6px 10px; border-radius:6px; }
    .topbar-user form button:hover { background:#fef2f2; }
    .page-content { padding:24px; flex:1; }

    /* Cards */
    .card { background:#fff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,.06); padding:22px; margin-bottom:22px; }
    .card-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:18px; padding-bottom:14px; border-bottom:1px solid #f0f0f0; }
    .card-header h2 { font-size:.95rem; color:#1a1a2e; font-weight:600; }

    /* Stats */
    .stats-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:16px; margin-bottom:24px; }
    .stat-card { background:#fff; border-radius:12px; padding:18px; box-shadow:0 2px 8px rgba(0,0,0,.06); display:flex; align-items:center; gap:14px; }
    .stat-icon { width:48px; height:48px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.2rem; }
    .stat-icon.green { background:#d1fae5; color:#059669; }
    .stat-icon.blue  { background:#dbeafe; color:#2563eb; }
    .stat-icon.teal  { background:#ccfbf1; color:#0d9488; }
    .stat-icon.red   { background:#fee2e2; color:#dc2626; }
    .stat-info h3 { font-size:1.5rem; font-weight:700; color:#1a1a2e; }
    .stat-info p  { font-size:.75rem; color:#888; }

    /* Table */
    table { width:100%; border-collapse:collapse; font-size:.85rem; }
    thead th { background:#f8f9fa; padding:11px 14px; text-align:left; font-weight:600; color:#555; font-size:.78rem; text-transform:uppercase; letter-spacing:.4px; }
    tbody td { padding:13px 14px; border-bottom:1px solid #f0f0f0; color:#333; vertical-align:middle; }
    tbody tr:last-child td { border-bottom:none; }
    tbody tr:hover { background:#fafafa; }

    /* Badges */
    .badge { padding:3px 9px; border-radius:20px; font-size:.72rem; font-weight:500; }
    .badge-success { background:#d1fae5; color:#059669; }
    .badge-warning { background:#fef3c7; color:#d97706; }
    .badge-danger  { background:#fee2e2; color:#dc2626; }
    .badge-gray    { background:#f1f5f9; color:#555; }

    /* Buttons */
    .btn { padding:7px 14px; border-radius:7px; font-size:.83rem; font-weight:500; text-decoration:none; border:none; cursor:pointer; display:inline-flex; align-items:center; gap:5px; transition:all .2s; font-family:'Poppins',sans-serif; }
    .btn-primary   { background:#00cba9; color:#fff; }
    .btn-primary:hover   { background:#00a88a; }
    .btn-danger    { background:#fee2e2; color:#dc2626; }
    .btn-danger:hover    { background:#fecaca; }
    .btn-secondary { background:#f1f5f9; color:#555; }
    .btn-secondary:hover { background:#e2e8f0; }
    .btn-warning   { background:#fef3c7; color:#d97706; }
    .btn-warning:hover   { background:#fde68a; }
    .btn-info      { background:#dbeafe; color:#2563eb; }
    .btn-info:hover      { background:#bfdbfe; }
    .btn-sm { padding:4px 9px; font-size:.78rem; }

    /* Forms */
    .form-group { margin-bottom:18px; }
    .form-group label { display:block; font-size:.83rem; font-weight:500; color:#374151; margin-bottom:5px; }
    .form-control { width:100%; padding:9px 12px; border:1px solid #d1d5db; border-radius:7px; font-size:.85rem; font-family:'Poppins',sans-serif; outline:none; color:#333; transition:border-color .2s,box-shadow .2s; }
    .form-control:focus { border-color:#00cba9; box-shadow:0 0 0 3px rgba(0,203,169,.1); }
    textarea.form-control { resize:vertical; min-height:90px; }

    /* Alerts */
    .alert { padding:11px 14px; border-radius:8px; margin-bottom:18px; font-size:.85rem; display:flex; align-items:center; gap:8px; }
    .alert-success { background:#d1fae5; color:#065f46; border-left:4px solid #059669; }
    .alert-danger  { background:#fee2e2; color:#991b1b; border-left:4px solid #dc2626; }

    .field-error { color:#dc2626; font-size:.75rem; margin-top:4px; }
    .pagination-wrap { display:flex; justify-content:flex-end; margin-top:14px; }

    /* Message unread row */
    .unread-row { background:#fffbeb !important; font-weight:600; }
  </style>
  @stack('styles')
</head>
<body>
<div class="admin-wrapper">

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <i class="fa-solid fa-briefcase"></i>
      <div>
        <h2>Portfolio</h2>
        <span>Admin Panel</span>
      </div>
    </div>
    <nav class="sidebar-menu">
      <h6>Main</h6>
      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="fa-solid fa-gauge"></i> Dashboard
      </a>

      <h6>Konten</h6>
      <a href="{{ route('admin.messages.index') }}" class="{{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
        <i class="fa-solid fa-envelope"></i> Pesan Masuk
        @php $unread = \App\Models\Message::where('is_read', false)->count(); @endphp
        @if($unread > 0)
          <span class="badge-count">{{ $unread }}</span>
        @endif
      </a>
      <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
        <i class="fa-solid fa-diagram-project"></i> Projects
      </a>
      <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
        <i class="fa-solid fa-wrench"></i> Skills / Tools
      </a>
      <a href="{{ route('admin.about.index') }}" class="{{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
        <i class="fa-solid fa-user"></i> About
      </a>

      <h6>Site</h6>
      <a href="{{ url('/') }}" target="_blank">
        <i class="fa-solid fa-globe"></i> Lihat Portfolio
      </a>
    </nav>
  </aside>

  <!-- Main Content -->
  <div class="main-content">
    <div class="topbar">
      <h1>@yield('page-title', 'Dashboard')</h1>
      <div class="topbar-user">
        <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
        <span>{{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
        </form>
      </div>
    </div>

    <div class="page-content">
      @if(session('success'))
        <div class="alert alert-success"><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger"><i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}</div>
      @endif

      @yield('content')
    </div>
  </div>

</div>
@stack('scripts')
</body>
</html>
