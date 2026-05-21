@extends('layouts.portfolio')

@section('title', 'PORTFOLIO | Projects')

@section('content')
  <!-- Projects Content -->
  <div class="project">
    <div class="container">
      <h1>Project List</h1>
      <p>Here are some of my recent projects:</p>
      <div class="project-box">

        @forelse($projects as $project)
          <div class="box">
            <img
              src="{{ $project->image ? asset('images/proyek/' . $project->image) : asset('images/proyek/default.webp') }}"
              alt="{{ $project->title }}"
            />
            <div class="project-desc">
              <h2>{{ $project->title }}</h2>
              <p>{{ $project->description }}</p>
              <div class="project-btn">
                @if($project->demo_url)
                  <a href="{{ $project->demo_url }}" target="_blank">View Project</a>
                @endif
                @if($project->github_url)
                  <a href="{{ $project->github_url }}" target="_blank">Github</a>
                @endif
              </div>
            </div>
          </div>
        @empty
          {{-- Fallback static jika database kosong --}}
          @for($i = 1; $i <= 4; $i++)
            <div class="box">
              <img src="{{ asset('images/proyek/proyek' . $i . '.webp') }}" alt="Project image" />
              <div class="project-desc">
                <h2>Website Project {{ $i }}</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                <div class="project-btn">
                  <a href="#">View Project</a>
                  <a href="#">Github</a>
                </div>
              </div>
            </div>
          @endfor
        @endforelse

      </div>
    </div>
  </div>
  <!-- Projects Content -->
@endsection
