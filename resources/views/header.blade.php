<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
    <div>
      <img style="width:100px;height:45px ;object-fit:fill" src="images/logo.png" alt="" srcset="">
    </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="C" href="{{url('notice-home')}}">Latest Notice</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="C" href="{{url('contact')}}">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="C" href="{{'about-us'}}">About us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="C" href="{{url('gallary')}}">Gallary</a>
        </li>
        <li class="nav-item">
          @if (Route::has('login'))
          @auth
          <a class="nav-link" aria-current="page" href="{{ url('home') }}">My
            Dashboard</a>
          @else
          <a class="nav-link" aria-current="page" href="{{ route('login') }}">Log-in</a>
          {{-- @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700
            dark:text-gray-500 underline">Register</a>
          @endif --}}
          @endauth
          @endif

        </li>

      </ul>
    </div>
  </div>
</nav>