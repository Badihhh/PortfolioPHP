@extends('layouts.portfolio')

@section('title', 'PORTFOLIO | Zaldi Ramadhan')

@section('hero')
  <!-- Hero -->
  <div class="hero">
    <div class="container">
      <div class="hero-box">
        <img src="{{ asset('images/Profile.png') }}" alt="Hero Image" />
        <h1>
          Hi!, I'm Zaldi Ramadhan <br />
          <span id="element"></span>
        </h1>
      </div>
    </div>
  </div>
  <!-- Hero -->
@endsection

@section('wave')
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path
      fill="#00cba9"
      fill-opacity="1"
      d="M0,0L48,37.3C96,75,192,149,288,176C384,203,480,181,576,160C672,139,768,117,864,106.7C960,96,1056,96,1152,106.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
    ></path>
  </svg>
@endsection

@section('content')
  {{-- Content area on home is intentionally minimal (hero page) --}}
@endsection

@push('scripts')
  <!-- Typed JS -->
  <script src="https://unpkg.com/typed.js@3.0.0/dist/typed.umd.js"></script>
  <script>
    var typed = new Typed("#element", {
      strings: ["Freelancer", "Web Developer"],
      typeSpeed: 100,
      loop: true,
      backspeed: 100,
      showCursor: false,
    });
  </script>
@endpush
