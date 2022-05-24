<x-layout>
  <x-card>
      <div class="p-3 w-full flex justify-between items-center">
        <div class="flex gap-2 items-center">
          <img class="w-10 h-10 object-cover rounded-full" src="{{ asset('storage/'.$post->user->avatar) }}" alt="{{ $post->user->username }}">
          <a href="/{{ $post->user->username }}" class="text-lg">{{ $post->user->username }}</a>
        </div>
        <div>
        @if ($post->user->id == auth()->id())
        <a href="/posts/{{$post->id}}/edit" class="px-2 py-1 rounded bg-yellow-200 transition-all hover:bg-yellow-300">Editar</a>
        @endif
        <a href="/" class="px-2 py-1 rounded bg-gray-200 hover:bg-gray-300 hover:underline">Back</a>
        </div>
      </div>

    <img class="w-full" src="{{ asset('storage/'.$post->image) }}" alt="image">

    <div class="w-full p-3">
      <ul class="flex gap-1 items-center text-blue-400 text-sm">
        <x-post-hashtags :hashtags="$post->hashtags" />
      </ul>
      <p class="text-md py-2">
        {{ $post->content }}
      </p>
      <div class="mb-2">
        <p class="mb-1 font-bold text-gray-600">Comentarios {{ count($post->comments) }}</p>

        <form class="mb-2 flex justify-between" action="/posts/{{ $post->id }}/comments/create" method="POST">
          @csrf
          <input
            class="outline-none w-[78%] px-2 py-1 border-b-4 border-gray-300 focus:border-gray-400"
            placeholder="Escriba un comentario"
            type="text"
            name="content"
          >
          <button type="submit" class="px-2 py-1 text-white rounded bg-blue-300 hover:bg-blue-400">Comentar</button>
          @error('content')
            <span>{{ $message }}</span>
          @enderror
        </form>

        <div class="flex flex-col">
          @unless (count($post->comments) == 0)
          @foreach ($post->comments as $comment)
            <x-comment :comment="$comment" />
          @endforeach
          @else
          <span class="text-center text-xl font-bold text-red-500">Sin comentarios</span>
          @endunless
        </div>
      </div>
    </div>
  </x-card>
</x-layout>
