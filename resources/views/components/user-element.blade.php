@props(['user'])

<li class="py-2">
  <a href="/{{ $user->username }}" class="flex gap-2 items-center">
    <img class="w-10 h-10 object-cover rounded-full" src="{{ asset('storage/'.$user->avatar) }}" alt="{{ $user->username }}">
    <span>{{ $user->username }}</span>
  </a>
</li>