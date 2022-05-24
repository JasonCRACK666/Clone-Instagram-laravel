
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Instagram</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://kit.fontawesome.com/b9630e9243.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="flex justify-center items-center h-screen">
  <x-card-message />
  <x-card>
    <header class="px-4 pt-2">
      <h1 class="font-bold text-center text-3xl">Editar Post</h1>
    </header>
    <form action="/posts/{{$post->id}}" method="POST" class="px-4 py-2" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="mb-2">
        <label class="font-semibold" for="image">Image</label>
        <input
          class="block"
          type="file"
          name="image"
          id="image"
        >
        <img class="w-40" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->updated_at }}">
        @error('image')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-2">
        <label
          class="font-semibold"
          for="hashtags">Hashtags<span class="text-gray-500">, pero se deben de separar por ","</span></label>
        <input
          class="block w-full py-1 px-2 border-2 border-gray-300 outline-none rounded"
          placeholder='Ponga los #hashtags de su post'
          type="text"
          name="hashtags"
          id="hashtags"
          value="{{ $post->hashtags }}"
        >
        @error('hashtags')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-2">
        <label class="font-semibold" for="content">Content</label>
        <textarea
          class="block resize-none px-2 py-1 w-full outline-none border-2 border-gray-300 rounded"
          name="content"
          placeholder="Ponga la descripción o comentario de su Post"
          id="content"
          rows="6"
        >{{ $post->content }}</textarea>
        @error('content')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div>
        <button
          type="submit"
          class="px-2 py-1 text-lg bg-blue-400 hover:bg-blue-500 transition-all text-white"
        >Aplicar cambios</button>
        <a
          href="/posts/{{$post->id}}"
          class="bg-gray-200 transition-all text-lg hover:bg-gray-300 hover:underline py-1 px-2"
        >Back</a>
      </div>
    </form>
  </x-card>
</div>
</body>
</html>