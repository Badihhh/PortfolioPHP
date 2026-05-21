@extends('admin.layouts.admin')
@section('title','Pesan Masuk')
@section('page-title','Pesan Masuk')

@section('content')
<div class="card">
  <div class="card-header">
    <h2><i class="fa-solid fa-envelope"></i> Semua Pesan Masuk</h2>
  </div>
  <table>
    <thead>
      <tr><th>#</th><th>Nama</th><th>Email</th><th>Pesan</th><th>Waktu</th><th>Status</th><th>Aksi</th></tr>
    </thead>
    <tbody>
      @forelse($messages as $i => $msg)
        <tr class="{{ !$msg->is_read ? 'unread-row' : '' }}">
          <td>{{ $messages->firstItem() + $i }}</td>
          <td><strong>{{ $msg->name }}</strong></td>
          <td>{{ $msg->email }}</td>
          <td>{{ Str::limit($msg->message, 45) }}</td>
          <td>{{ $msg->created_at->format('d M Y H:i') }}</td>
          <td>
            @if($msg->is_read)
              <span class="badge badge-success">Dibaca</span>
            @else
              <span class="badge badge-warning">Baru</span>
            @endif
          </td>
          <td style="display:flex;gap:6px;flex-wrap:wrap;">
            <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-info btn-sm">
              <i class="fa-solid fa-eye"></i> Baca
            </a>
            @if(!$msg->is_read)
              <form action="{{ route('admin.messages.read', $msg) }}" method="POST" style="display:inline">
                @csrf @method('PATCH')
                <button class="btn btn-secondary btn-sm"><i class="fa-solid fa-check"></i></button>
              </form>
            @else
              <form action="{{ route('admin.messages.unread', $msg) }}" method="POST" style="display:inline">
                @csrf @method('PATCH')
                <button class="btn btn-warning btn-sm"><i class="fa-solid fa-rotate-left"></i></button>
              </form>
            @endif
            <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" style="display:inline"
                  onsubmit="return confirm('Hapus pesan ini?')">
              @csrf @method('DELETE')
              <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7" style="text-align:center;color:#aaa;padding:32px;">Belum ada pesan masuk.</td></tr>
      @endforelse
    </tbody>
  </table>
  <div class="pagination-wrap">{{ $messages->links() }}</div>
</div>
@endsection
