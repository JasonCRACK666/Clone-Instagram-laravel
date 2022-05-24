@props(['post'])

<x-card>
  <div class="p-3 w-full flex items-center justify-between">
    <div class="flex items-center gap-2">
      <img class="w-10 h-10 object-cover rounded-full" src="{{ asset('storage/'.$post->user->avatar) }}" alt="{{ $post->user->username }}">
      <a href="/{{ $post->user->username }}" class="text-lg">{{ $post->user->username }}</a>
    </div>
    @auth
    @if ($post->user->id == auth()->id())
    <div class="flex">
      <a href="/posts/{{ $post->id }}/edit" class="px-2 py-1 rounded bg-yellow-200 transition-all hover:bg-yellow-300">Editar</a>
      <form action="/posts/{{ $post->id }}/delete" method="POST" >
        @method('DELETE')
        @csrf
        <button class="ml-1 px-2 py-1 rounded bg-red-200 transition-all hover:bg-red-300">Delete</button>
      </form>
    </div>
    @endif
    @endauth
  </div>

  <a href="/posts/{{ $post->id }}">
    <img class="w-full" src="{{ asset('storage/'.$post->image) }}" alt="image">
  </a>

  <div class="w-full p-3">
    <ul class="flex gap-1 items-center text-blue-400 text-sm">
      <x-post-hashtags :hashtags="$post->hashtags" />
    </ul>
    <p class="text-md py-2">
      {{ $post->content }}
    </p>
    <div class="mb-1">
      <p class="mb-1 font-bold text-gray-600">Comentarios {{count($post->comments)}}</p>
      {{-- Aqui van los 2 primeros comentarios que tengan el Post --}}
      <div class="flex flex-col">
        @unless (count($post->comments) == 0)
          @foreach ($post->comments as $comment)
            <x-comment :comment="$comment" />
          @endforeach
        @else
          <span>Sin comentarios, pero puedes escribir uno <a class="font-bold hover:underline hover:text-blue-400 transition-all" href="/posts/{{ $post->id }}">Aqui</a></span>
        @endunless
      </div>
    </div>
  </div>
</x-card>