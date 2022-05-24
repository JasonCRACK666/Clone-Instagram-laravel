<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Instagram</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/b9630e9243.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="h-screen flex justify-center items-center">
  <x-card-message />
  <x-card>
    <header class="flex items-center justify-around">
      <a href="/{{ $user->username }}" class="p-2 bg-gray-200 hover:bg-gray-300">Back</a>
      <h1 class="font-bold text-center text-4xl py-2">Editar Perfil</h1>
      <span></span>
    </header>

    <form action="/users/{{ $user->id }}" method="POST" class="py-2 px-4 w-full" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-2 block">
        <label class="font-semibold" for="avatar">Avatar</label>
        <input 
          class="w-full py-1 px-2 outline-none shadow-md"
          type="file"
          id="avatar"
          name="avatar"
        >
        <img src="{{ asset('storage/'.$user->avatar) }}" alt="{{ $user->username }}" class="w-40">
        @error('avatar')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>

      <div class="mb-2 block">
        <label class="font-semibold" for="name">Name</label>
        <input
          class="w-full py-1 px-2 outline-none shadow-md"
          type="text"
          id="name"
          name="name"
          value="{{ $user->name }}"
        >
        @error('name')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-2 block">
        <label class="font-semibold" for="lastname">LastName</label>
        <input
          class="w-full py-1 px-2 outline-none shadow-md"
          type="text"
          id="lastname"
          name="lastname"
          value="{{ $user->lastname }}"
        >
        @error('lastname')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-2 block">
        <label class="font-semibold" for="username">Username</label>
        <input
          class="w-full py-1 px-2 outline-none shadow-md"
          type="text" 
          id="username"
          name="username"
          value="{{ $user->username }}"
        >
        @error('username')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-2 block">
        <label class="font-semibold" for="email">Email</label>
        <input
          class="w-full py-1 px-2 outline-none shadow-md"
          type="email"
          id="email"
          name="email"
          value="{{ $user->email }}"
        >
        @error('email')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <input
        type="submit"
        class="block text-center bg-slate-200 rounded w-full py-2 cursor-pointer hover:bg-slate-300 transition-all"
        value="Aplicar cambios"
      >
    </form>
  </x-card>
</div>
</body>
</html>