@extends('admin.layouts.admin')
@section('title','Edit About')
@section('page-title','About Me')

@section('content')
<div style="display:grid;grid-template-columns:1fr 1fr;gap:22px;align-items:start;">

  <!-- Form Edit -->
  <div class="card">
    <div class="card-header">
      <h2><i class="fa-solid fa-user-pen"></i> Edit Informasi About</h2>
    </div>
    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
      @csrf @method('PATCH')

      <div class="form-group">
        <label>Bio / Deskripsi Diri <span style="color:red">*</span></label>
        <textarea name="bio" class="form-control" rows="8" placeholder="Tulis deskripsi diri kamu..." required>{{ old('bio', $about->bio) }}</textarea>
        @error('bio')<p class="field-error">{{ $message }}</p>@enderror
      </div>

      <div class="form-group">
        <label>Foto Profil</label>
        @if($about->photo)
          <div style="margin-bottom:10px;">
            <img src="{{ asset('images/' . $about->photo) }}" style="width:90px;height:90px;object-fit:cover;border-radius:50%;border:3px solid #00cba9;" />
            <p style="font-size:.73rem;color:#888;margin-top:4px;">Foto saat ini</p>
          </div>
        @endif
        <input type="file" name="photo" class="form-control" accept="image/*" />
        <small style="color:#888;font-size:.75rem;">JPG, PNG, WEBP. Maks 2MB. Kosongkan jika tidak ingin mengganti.</small>
        @error('photo')<p class="field-error">{{ $message }}</p>@enderror
      </div>

      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
    </form>
  </div>

  <!-- Preview -->
  <div class="card">
    <div class="card-header">
      <h2><i class="fa-solid fa-eye"></i> Preview</h2>
      <a href="{{ url('/about') }}" target="_blank" class="btn btn-secondary btn-sm">
        <i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat Halaman
      </a>
    </div>
    <div style="text-align:center;padding:10px 0 20px;">
      @if($about->photo)
        <img src="{{ asset('images/' . $about->photo) }}" style="width:100px;height:100px;object-fit:cover;border-radius:50%;border:3px solid #00cba9;margin-bottom:14px;" />
      @else
        <div style="width:100px;height:100px;border-radius:50%;background:#e0e0e0;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;color:#aaa;font-size:2rem;">
          <i class="fa-solid fa-user"></i>
        </div>
      @endif
      <p style="font-size:.88rem;color:#555;line-height:1.7;">{{ $about->bio }}</p>
    </div>
  </div>

</div>
@endsection
