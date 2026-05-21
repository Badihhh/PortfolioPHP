@extends('admin.layouts.admin')
@section('title','Dashboard')
@section('page-title','Dashboard')

@section('content')
<div class="stats-grid">
  <div class="stat-card">
    <div class="stat-icon teal"><i class="fa-solid fa-envelope"></i></div>
    <div class="stat-info">
      <h3>{{ $totalMessages }}</h3>
      <p>Total Pesan
        @if($unreadMessages > 0)
          <span class="badge badge-danger">{{ $unreadMessages }} baru</span>
        @endif
      </p>
    </div>
  </div>
  <div class="stat-card">
    <div class="stat-icon green"><i class="fa-solid fa-diagram-project"></i></div>
    <div class="stat-info"><h3>{{ $totalProjects }}</h3><p>Total Projects</p></div>
  </div>
  <div class="stat-card">
    <div class="stat-icon blue"><i class="fa-solid fa-wrench"></i></div>
    <div class="stat-info"><h3>{{ $totalSkills }}</h3><p>Total Skills</p></div>
  </div>
</div>

<!-- Pesan Terbaru -->
<div class="card">
  <div class="card-header">
    <h2><i class="fa-solid fa-envelope"></i> Pesan Terbaru</h2>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
  </div>
  <table>
    <thead><tr><th>Nama</th><th>Email</th><th>Pesan</th><th>Waktu</th><th>Status</th></tr></thead>
    <tbody>
      @forelse($recentMessages as $msg)
        <tr class="{{ !$msg->is_read ? 'unread-row' : '' }}">
          <td>{{ $msg->name }}</td>
          <td>{{ $msg->email }}</td>
          <td>{{ Str::limit($msg->message, 50) }}</td>
          <td>{{ $msg->created_at->diffForHumans() }}</td>
          <td>
            @if($msg->is_read)
              <span class="badge badge-success">Dibaca</span>
            @else
              <span class="badge badge-warning">Baru</span>
            @endif
          </td>
        </tr>
      @empty
        <tr><td colspan="5" style="text-align:center;color:#aaa;padding:24px;">Belum ada pesan masuk.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Project Terbaru -->
<div class="card">
  <div class="card-header">
    <h2><i class="fa-solid fa-diagram-project"></i> Project Terbaru</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-plus"></i> Tambah</a>
  </div>
  <table>
    <thead><tr><th>#</th><th>Judul</th><th>Deskripsi</th><th>Dibuat</th></tr></thead>
    <tbody>
      @forelse($recentProjects as $i => $project)
        <tr>
          <td>{{ $i + 1 }}</td>
          <td><strong>{{ $project->title }}</strong></td>
          <td>{{ Str::limit($project->description, 55) }}</td>
          <td>{{ $project->created_at->format('d M Y') }}</td>
        </tr>
      @empty
        <tr><td colspan="4" style="text-align:center;color:#aaa;padding:24px;">Belum ada project.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
