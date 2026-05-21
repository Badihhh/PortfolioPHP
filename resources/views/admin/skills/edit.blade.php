@extends('admin.layouts.admin')
@section('title','Edit Skill')
@section('page-title','Edit Skill')

@section('content')
<div class="card" style="max-width:560px;">
  <div class="card-header">
    <h2><i class="fa-solid fa-pen"></i> Edit Skill</h2>
    <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
  </div>
  <form action="{{ route('admin.skills.update', $skill) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
      <div class="form-group">
        <label>Nama Skill <span style="color:red">*</span></label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $skill->name) }}" required />
        @error('name')<p class="field-error">{{ $message }}</p>@enderror
      </div>
      <div class="form-group">
        <label>Kategori <span style="color:red">*</span></label>
        <input type="text" name="category" class="form-control" value="{{ old('category', $skill->category) }}" required />
        @error('category')<p class="field-error">{{ $message }}</p>@enderror
      </div>
    </div>
    <div class="form-group">
      <label>Ganti Icon / Gambar</label>
      @if($skill->image)
        <div style="margin-bottom:10px;">
          <img src="{{ asset('images/tools/' . $skill->image) }}" style="width:52px;height:52px;object-fit:contain;border:2px solid #e0e0e0;border-radius:8px;padding:4px;" />
          <p style="font-size:.73rem;color:#888;margin-top:4px;">Gambar saat ini</p>
        </div>
      @endif
      <input type="file" name="image" class="form-control" accept="image/*" />
      <small style="color:#888;font-size:.75rem;">Kosongkan jika tidak ingin mengganti.</small>
      @error('image')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div style="display:flex;gap:10px;margin-top:4px;">
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
      <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection
