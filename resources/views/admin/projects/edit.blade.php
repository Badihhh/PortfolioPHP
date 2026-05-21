@extends('admin.layouts.admin')
@section('title','Edit Project')
@section('page-title','Edit Project')

@section('content')
<div class="card" style="max-width:720px;">
  <div class="card-header">
    <h2><i class="fa-solid fa-pen"></i> Edit Project</h2>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
  </div>
  <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="form-group">
      <label>Judul Project <span style="color:red">*</span></label>
      <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required />
      @error('title')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div class="form-group">
      <label>Deskripsi <span style="color:red">*</span></label>
      <textarea name="description" class="form-control" required>{{ old('description', $project->description) }}</textarea>
      @error('description')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
      <div class="form-group">
        <label>URL Demo</label>
        <input type="url" name="demo_url" class="form-control" value="{{ old('demo_url', $project->demo_url) }}" placeholder="https://" />
      </div>
      <div class="form-group">
        <label>URL Github</label>
        <input type="url" name="github_url" class="form-control" value="{{ old('github_url', $project->github_url) }}" placeholder="https://github.com/..." />
      </div>
    </div>
    <div class="form-group">
      <label>Ganti Gambar</label>
      @if($project->image)
        <div style="margin-bottom:10px;">
          <img src="{{ asset('images/proyek/' . $project->image) }}" style="width:100px;height:70px;object-fit:cover;border-radius:8px;border:2px solid #e0e0e0;" />
          <p style="font-size:.73rem;color:#888;margin-top:4px;">Gambar saat ini</p>
        </div>
      @endif
      <input type="file" name="image" class="form-control" accept="image/*" />
      <small style="color:#888;font-size:.75rem;">Kosongkan jika tidak ingin mengganti.</small>
      @error('image')<p class="field-error">{{ $message }}</p>@enderror
    </div>
    <div style="display:flex;gap:10px;margin-top:4px;">
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
      <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
    </div>
  </form>
</div>
@endsection
