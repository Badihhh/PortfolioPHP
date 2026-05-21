<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/icon/favicon.ico') }}" type="image/x-icon" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,500;1,600&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
      integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <title>@yield('title', 'PORTFOLIO | Zaldi Ramadhan')</title>

    @stack('styles')
  </head>
  <body>
    <header>
      <!-- Navbar -->
      <div class="navbar">
        <div class="container">
          <div class="navbar-box">
            <ul class="menu">
              <li><a href="{{ url('/') }}"         class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
              <li><a href="{{ url('/about') }}"    class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
              <li><a href="{{ url('/projects') }}" class="{{ request()->is('projects') ? 'active' : '' }}">Projects</a></li>
              <li><a href="{{ url('/contact') }}"  class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>

              {{-- Tombol Login / Admin --}}
              @auth
                <li class="nav-login"><a href="{{ route('admin.dashboard') }}"></a></li>
                <li class="nav-logout">
                  <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit"></button>
                  </form>
                </li>
                @else
                <li class="nav-login"><a href="{{ route('login') }}"></a></li>
              @endauth
            </ul>
          </div>
        </div>
      </div>
      <!-- Navbar -->

      @yield('hero')
    </header>

    @yield('wave')

    @yield('content')

    <!-- Footer -->
    <footer>
      <p>&copy; Copyright {{ date('Y') }} by <span>Zaldi Ramadhan.</span></p>
      <div class="social">
        <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-square-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-square-linkedin"></i></a>
      </div>
    </footer>
    <!-- Footer -->

    <!-- JS -->
    <script src="{{ asset('dist/js/script.js') }}"></script>

    @stack('scripts')
  </body>
</html>