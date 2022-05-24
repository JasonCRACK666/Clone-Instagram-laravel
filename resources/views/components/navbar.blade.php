<nav class="flex justify-evenly items-center w-full h-16 shadow-md sticky top-0 z-10 bg-white">
  {{-- Logo --}}
  <span>
    <img class="w-24" src="{{ asset('images/Instagram-logo-letra.png') }}" alt="logo-letra">
  </span>

  {{-- Links --}}
  <ul class="flex justify-center items-center gap-3">
    <li>
      <a href="/">
        <i class="fa-solid fa-house text-2xl"></i>
      </a>
    </li>
    <li>
      <i class="fa-brands fa-facebook-messenger text-2xl"></i>
    </li>
    <li>
      <a href="/post/create">
        <i class="fa-regular fa-square-plus text-2xl"></i>
      </a>
    </li>
    <li>
      <i class="fa-regular fa-compass text-2xl"></i>
    </li>
    <li>
      <i class="fa-regular fa-heart text-2xl"></i>
    </li>
    <li>
      @auth
        <a href="/{{auth()->user()->username}}">
          <img class="w-8 h-8 rounded-full object-cover" src="{{ asset("storage/".auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
        </a>
      @else
        <a href="/login">
          <img class="w-8 h-8 rounded-full" src="{{ asset('images/avatar-default.png') }}" alt="avatar">
        </a>
      @endauth
    </li>
  </ul>
</nav>