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
  <x-card>
    <header>
      <h1 class="font-bold text-center text-4xl py-2">Register</h1>
    </header>

    <form action="/register" method="POST" class="py-2 px-4 w-full" enctype="multipart/form-data">
      @csrf
      <div class="mb-2 block">
        <label class="font-semibold" for="avatar">Avatar</label>
        <input 
          class="w-full py-1 px-2 outline-none shadow-md"
          type="file"
          id="avatar"
          name="avatar"
          value="{{ old('avatar') }}"
        >
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
          value="{{ old('name') }}"
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
          value="{{ old('lastname') }}"
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
          value="{{ old('username') }}"
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
          value="{{ old('email') }}"
        >
        @error('email')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-2 block">
        <label class="font-semibold" for="password">Password</label>
        <input
          class="w-full py-1 px-2 outline-none shadow-md"
          type="password"
          id="password"
          name="password"
          value="{{ old('password') }}"
        >
        @error('password')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <div class="mb-2 block">
        <label class="font-semibold" for="password2">Password confirm</label>
        <input
          class="w-full py-1 px-2 outline-none shadow-md"
          type="password"
          id="password2"
          name="password_confirmation"
          value="{{ old('password') }}"
        >
        @error('password_confirmation')
          <span class="text-red-400">{{ $message }}</span>
        @enderror
      </div>
      <input
        type="submit"
        class="block text-center bg-slate-200 rounded w-full py-2 cursor-pointer hover:bg-slate-300 transition-all"
        value="Registrarse"
      >
    </form>
    <footer class="py-1 px-4">
      <p class="text-blue-500">Ya estas registrado? Puedes loguearte <a href="/login" class="font-bold hover:underline hover:text-blue-600">Aqui</a></p>
    </footer>
  </x-card>
</div>
</body>
</html>