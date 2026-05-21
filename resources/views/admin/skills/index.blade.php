@extends('admin.layouts.admin')
@section('title','Skills / Tools')
@section('page-title','Skills / Tools')

@section('content')
<div class="card">
  <div class="card-header">
    <h2><i class="fa-solid fa-wrench"></i> Semua Skills</h2>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Skill</a>
  </div>
  <table>
    <thead><tr><th>#</th><th>Icon</th><th>Nama</th><th>Kategori</th><th>Aksi</th></tr></thead>
    <tbody>
      @forelse($skills as $i => $skill)
        <tr>
          <td>{{ $skills->firstItem() + $i }}</td>
          <td>
            @if($skill->image)
              <img src="{{ asset('images/tools/' . $skill->image) }}" style="width:38px;height:38px;object-fit:contain;" />
            @else
              <div style="width:38px;height:38px;background:#f0f0f0;border-radius:6px;display:flex;align-items:center;justify-content:center;color:#bbb;"><i class="fa-solid fa-code"></i></div>
            @endif
          </td>
          <td><strong>{{ $skill->name }}</strong></td>
          <td><span class="badge badge-success">{{ $skill->category }}</span></td>
          <td style="display:flex;gap:6px;">
            <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i> Edit</a>
            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus skill ini?')">
              @csrf @method('DELETE')
              <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5" style="text-align:center;color:#aaa;padding:32px;">Belum ada skill. <a href="{{ route('admin.skills.create') }}">Tambah sekarang</a>.</td></tr>
      @endforelse
    </tbody>
  </table>
  <div class="pagination-wrap">{{ $skills->links() }}</div>
</div>
@endsection
