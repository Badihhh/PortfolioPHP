@extends('admin.layouts.admin')
@section('title','Manage Projects')
@section('page-title','Projects')

@section('content')
<div class="card">
  <div class="card-header">
    <h2><i class="fa-solid fa-diagram-project"></i> Semua Projects</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
      <i class="fa-solid fa-plus"></i> Tambah Project
    </a>
  </div>
  <table>
    <thead><tr><th>#</th><th>Gambar</th><th>Judul</th><th>Deskripsi</th><th>Aksi</th></tr></thead>
    <tbody>
      @forelse($projects as $i => $project)
        <tr>
          <td>{{ $projects->firstItem() + $i }}</td>
          <td>
            @if($project->image)
              <img src="{{ asset('images/proyek/' . $project->image) }}" style="width:60px;height:42px;object-fit:cover;border-radius:6px;" />
            @else
              <div style="width:60px;height:42px;background:#f0f0f0;border-radius:6px;display:flex;align-items:center;justify-content:center;color:#bbb;"><i class="fa-solid fa-image"></i></div>
            @endif
          </td>
          <td><strong>{{ $project->title }}</strong></td>
          <td>{{ Str::limit($project->description, 50) }}</td>
          <td style="display:flex;gap:6px;">
            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i> Edit</a>
            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus project ini?')">
              @csrf @method('DELETE')
              <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5" style="text-align:center;color:#aaa;padding:32px;">Belum ada project. <a href="{{ route('admin.projects.create') }}">Tambah sekarang</a>.</td></tr>
      @endforelse
    </tbody>
  </table>
  <div class="pagination-wrap">{{ $projects->links() }}</div>
</div>
@endsection
