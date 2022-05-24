@props(['comment'])

<div class="flex justify-between items-center">
  <span class="text-sm leading-4">
    <a href="/{{$comment->user->username}}" class="font-bold hover:underline-offset-1">{{ $comment->user->username }}</a><span> </span>{{ $comment->content }}
  </span>
  @auth
    @if (auth()->id() == $comment->user->id)
      <div class="ml-1 flex gap-1">
      <a class="px-2 py-1 rounded bg-purple-300 text-sm hover:bg-purple-400" href="/posts/comments/{{ $comment->id }}/edit">Editar</a>
      <form action="/posts/comments/{{ $comment->id }}/delete" method="POST">
        @method('DELETE')
        @csrf
        <button class="px-2 py-1 rounded bg-red-300 text-sm hover:bg-red-400" type="submit">Delete</button>
      </form>
      </div>
    @endif
  @endauth
</div>
