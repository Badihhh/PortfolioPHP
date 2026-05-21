@extends('admin.layouts.admin')
@section('title','Detail Pesan')
@section('page-title','Detail Pesan')

@section('content')
<div class="card" style="max-width:680px;">
  <div class="card-header">
    <h2><i class="fa-solid fa-envelope-open"></i> Detail Pesan</h2>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary btn-sm">
      <i class="fa-solid fa-arrow-left"></i> Kembali
    </a>
  </div>

  <div style="display:grid;gap:14px;">
    <div style="display:grid;grid-template-columns:120px 1fr;gap:8px;font-size:.88rem;">
      <span style="color:#888;font-weight:500;">Nama</span>
      <span><strong>{{ $message->name }}</strong></span>

      <span style="color:#888;font-weight:500;">Email</span>
      <span>{{ $message->email }}</span>

      <span style="color:#888;font-weight:500;">Waktu</span>
      <span>{{ $message->created_at->format('d M Y, H:i') }}</span>

      <span style="color:#888;font-weight:500;">Status</span>
      <span>
        @if($message->is_read)
          <span class="badge badge-success">Sudah Dibaca</span>
        @else
          <span class="badge badge-warning">Belum Dibaca</span>
        @endif
      </span>
    </div>

    <hr style="border:none;border-top:1px solid #f0f0f0;" />

    <div>
      <p style="color:#888;font-size:.83rem;font-weight:500;margin-bottom:8px;">Pesan:</p>
      <div style="background:#f8f9fa;border-radius:8px;padding:16px;font-size:.88rem;line-height:1.7;white-space:pre-wrap;">{{ $message->message }}</div>
    </div>

    <div style="display:flex;gap:10px;margin-top:8px;">
      <a href="mailto:{{ $message->email }}" class="btn btn-primary">
        <i class="fa-solid fa-reply"></i> Balas via Email
      </a>
      <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
            onsubmit="return confirm('Hapus pesan ini?')">
        @csrf @method('DELETE')
        <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</button>
      </form>
    </div>
  </div>
</div>
@endsection
