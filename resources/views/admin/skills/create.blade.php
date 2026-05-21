@extends('admin.layouts.admin')
@section('title','Tambah Skill')
@section('page-title','Tambah Skill')

@section('content')
<div class="card" style="max-width:560px;">
  <div class="card-header">
    <h2><i class="fa-solid fa-plus"></i> Tambah Skill Baru</h2>
    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
  </div>
  <form action="{{ route('admin.skills.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
      <div class="form-group">
        <label>Nama Skill <span style="color:red">*</span></label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Laravel" required />
        @error('name')<p class="field-error">{{ $message }}</p>@enderror
      </div>
      <div class="form-group">
        <label>Kategori <span style="color:red">*</span></label>
        <input type="text" name="category" class="form-control" value="{{ old('category') }}" placeholder="Contoh: Framework PHP" required />
        @error('category')<p class="field-error">{{ $message }}</p>@enderror
      </div>
    </div>
    <div class="form-group">
      <label>Icon / Gambar</label>
      <input type="file" name="image" class="form-control" accept="image/*" />
      <small style="color:#888;font-size:.75rem;">PNG, JPG, SVG. Maks 1MB.</small>
      @error('image')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div style="display:flex;gap:10px;margin-top:4px;">
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
      <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection
