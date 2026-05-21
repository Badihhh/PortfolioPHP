@extends('admin.layouts.admin')
@section('title','Tambah Project')
@section('page-title','Tambah Project')

@section('content')
<div class="card" style="max-width:720px;">
  <div class="card-header">
    <h2><i class="fa-solid fa-plus"></i> Tambah Project Baru</h2>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
  </div>
  <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Judul Project <span style="color:red">*</span></label>
      <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Contoh: Website Sekolah" required />
      @error('title')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div class="form-group">
      <label>Deskripsi <span style="color:red">*</span></label>
      <textarea name="description" class="form-control" placeholder="Deskripsi singkat..." required>{{ old('description') }}</textarea>
      @error('description')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
      <div class="form-group">
        <label>URL Demo</label>
        <input type="url" name="demo_url" class="form-control" value="{{ old('demo_url') }}" placeholder="https://" />
        @error('demo_url')<p class="field-error">{{ $message }}</p>@enderror
      </div>
      <div class="form-group">
        <label>URL Github</label>
        <input type="url" name="github_url" class="form-control" value="{{ old('github_url') }}" placeholder="https://github.com/..." />
        @error('github_url')<p class="field-error">{{ $message }}</p>@enderror
      </div>
    </div>
    <div class="form-group">
      <label>Gambar Project</label>
      <input type="file" name="image" class="form-control" accept="image/*" />
      <small style="color:#888;font-size:.75rem;">JPG, PNG, WEBP. Maks 2MB.</small>
      @error('image')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div style="display:flex;gap:10px;margin-top:4px;">
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
      <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection
