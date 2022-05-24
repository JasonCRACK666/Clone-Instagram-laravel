<x-layout>
  <div class="max-w-md w-full">
    <div class="flex gap-2 border p-4 justify-between mb-4">
      <div class="text-center">
        <img class="w-44 h-40 object-cover rounded-xl" src="{{ asset('storage/'.$user->avatar) }}" alt="{{ $user->username }}">
        <h2 class="text-xl font-bold">{{ $user->username }}</h2>
      </div>
      <ul>
        <li>
          <strong>Name:</strong> {{ $user->name }}
        </li>
        <li>
          <strong>Last name:</strong> {{ $user->lastname }}
        </li>
        <li>
          <strong>Email:</strong> {{ $user->email }}
        </li>
        @auth
        @if ($user->id == auth()->id())
        <li class="mt-2">
          <a href="/users/{{ $user->id }}/edit" class="px-2 py-1 rounded bg-purple-200 hover:bg-purple-300 block w-full text-center">
            Editar Perfil
          </a>
        </li>
        <li class="mt-2">
          <form action="/users/{{ $user->id }}/delete" method="POST">
            @method('DELETE')
            @csrf
            <button class="px-2 py-1 rounded bg-red-200 hover:bg-red-300 block w-full text-center">Delete & Close Session</button>
          </form>
        </li>
        @endif
        @endauth
      </ul>
    </div>
    <div class="flex flex-col justify-center w-full">
      @unless (count($user->posts) == 0)
        @foreach ($user->posts as $post)
          <x-post :post="$post" />
        @endforeach
      @else
      <p class="text-xl text-center font-bold">No se ha encontrado ningun Post publicado por el usuario :(</p>
      @endunless
    </div>
  </div>
</x-layout>