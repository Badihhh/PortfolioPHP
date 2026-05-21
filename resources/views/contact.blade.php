@extends('layouts.portfolio')

@section('title', 'PORTFOLIO | Contact')

@section('wave')
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path
      fill="#00cba9"
      fill-opacity="1"
      d="M0,64L30,58.7C60,53,120,43,180,53.3C240,64,300,96,360,96C420,96,480,64,540,74.7C600,85,660,139,720,154.7C780,171,840,149,900,149.3C960,149,1020,171,1080,149.3C1140,128,1200,64,1260,64C1320,64,1380,128,1410,160L1440,192L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"
    ></path>
  </svg>
@endsection

@section('content')
  <!-- Contact Content -->
  <section id="contact">
    <div class="contact main-container">
      <div class="contact-left">

        @if(session('success'))
          <div style="background:#d1fae5;color:#065f46;padding:12px 16px;border-radius:8px;margin-bottom:16px;border-left:4px solid #059669;">
            <strong>✓</strong> {{ session('success') }}
          </div>
        @endif

        <form class="contact-form" action="{{ route('contact.send') }}" method="POST">
          @csrf
          <div>
            <input
              type="text"
              placeholder="Name"
              name="name"
              value="{{ old('name') }}"
              required
            />
            @error('name')<span style="color:red;font-size:0.8rem;">{{ $message }}</span>@enderror
          </div>
          <div>
            <input
              type="email"
              placeholder="Email"
              name="email"
              value="{{ old('email') }}"
              required
            />
            @error('email')<span style="color:red;font-size:0.8rem;">{{ $message }}</span>@enderror
          </div>
          <div>
            <textarea
              name="message"
              id="message"
              placeholder="Message"
              cols="30"
              rows="10"
              required
            >{{ old('message') }}</textarea>
            @error('message')<span style="color:red;font-size:0.8rem;">{{ $message }}</span>@enderror
          </div>
          <button type="submit" class="btn-submit">Send Message</button>
        </form>
      </div>

      <div class="contact-right">
        <!-- Contact Item 1 -->
        <div class="contact-item">
          <div class="contact-item-icon">
            <i class="fa-solid fa-house"></i>
          </div>
          <div class="contact-item-detail">
            <h4>Address</h4>
            <p>123 Main Street, City, State 12345</p>
          </div>
        </div>

        <!-- Contact Item 2 -->
        <div class="contact-item">
          <div class="contact-item-icon">
            <i class="fa-solid fa-phone"></i>
          </div>
          <div class="contact-item-detail">
            <h4>Phone</h4>
            <p>(123) 456-7890</p>
          </div>
        </div>

        <!-- Contact Item 3 -->
        <div class="contact-item">
          <div class="contact-item-icon">
            <i class="fa-solid fa-at"></i>
          </div>
          <div class="contact-item-detail">
            <h4>Email</h4>
            <p>example@example.com</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Content -->
@endsection
