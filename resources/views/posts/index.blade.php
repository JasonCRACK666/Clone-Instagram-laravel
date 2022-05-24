<x-layout>
    <x-card-message></x-card-message>
    <section>
      @unless (count($posts) == 0)
      @foreach ($posts as $post)
        <x-post :post="$post" ></x-post>
      @endforeach
      @else
        <x-card>
          <p class="font-bold p-2 text-xl text-center w-full">NO HAY NINGUN POST PUBLICADO, PUEDE USTES SER EL PRIMERO DE MILLONES EN UN FUTURO</p>
        </x-card>
      @endunless
    </section>

    <section class="w-56 p-3">
      <div class="flex items-center py-1">
        @auth
        <img class="w-10 h-10 object-center object-cover rounded-full" src="{{ asset("storage/".auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
        <a href="/{{auth()->user()->username}}" class="text-lg pl-2">{{ auth()->user()->username }}</a>
        @else
        <img class="w-10 object-cover rounded-full" src="{{ asset('images/avatar-default.png') }}" alt="avatar">
        <a href="" class="text-lg pl-2">Usuario123</a>
        @endauth
      </div>

      <p class="text-gray-400">Sugerencias para ti</p>

      <ul>
        @foreach ($users as $user)
        <x-user-element :user="$user" />
        @endforeach
      </ul>

      <div>
        <ul>
          @auth
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="py-2 block w-full text-center bg-red-100 hover:bg-red-200 mb-1">Logout</button>
            </form>
          </li>
          @else
          <li>
            <a href="/register" class="py-2 block text-center bg-gray-100 hover:bg-gray-200 mb-1">Register</a>
          </li>
          <li>
            <a href="/login" class="py-2 block text-center bg-blue-200 hover:bg-blue-300">Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </section>
</x-layout>