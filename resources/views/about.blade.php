@extends('layouts.portfolio')

@section('title', 'PORTFOLIO | About')

@section('wave')
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#00cba9" fill-opacity="1"
      d="M0,64L30,58.7C60,53,120,43,180,53.3C240,64,300,96,360,96C420,96,480,64,540,74.7C600,85,660,139,720,154.7C780,171,840,149,900,149.3C960,149,1020,171,1080,149.3C1140,128,1200,64,1260,64C1320,64,1380,128,1410,160L1440,192L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
    </path>
  </svg>
@endsection

@section('content')
<div class="about">
  <div class="container">
    <h1>About Me</h1>
    <div class="about-box">
      <div class="box">
        {{-- Foto dari database, fallback ke profile.jpeg --}}
        @if($about && $about->photo)
          <img src="{{ asset('images/' . $about->photo) }}" alt="About Image" />
        @else
          <img src="{{ asset('assets/images/profile.jpeg') }}" alt="About Image" />
        @endif
        <div>
          <p>{{ $about ? $about->bio : 'Tulis bio kamu di admin panel.' }}</p>
          <a href="{{ url('/projects') }}">See Projects</a>
        </div>
      </div>

      <div class="box">
        <h1>Tools</h1>
        <p>Here are the tools I use:</p>
        <div class="tools">
          @forelse($skills as $skill)
            <div class="tools-box">
              @if($skill->image)
                <img src="{{ asset('images/tools/' . $skill->image) }}" alt="{{ $skill->name }}" />
              @else
                <div class="tools-icon"><i class="fa-solid fa-code"></i></div>
              @endif
              <div class="tools-desc">
                <h3>{{ $skill->name }}</h3>
                <p>{{ $skill->category }}</p>
              </div>
            </div>
          @empty
            <p style="color:#888;">Belum ada skill yang ditambahkan.</p>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
