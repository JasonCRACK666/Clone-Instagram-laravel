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
      <h1 class="font-bold text-center text-4xl py-2">Login</h1>
    </header>
    <form action="/login" method="POST" class="px-4 py-2 w-full">
      @csrf
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
      <input
        type="submit"
        class="block text-center bg-slate-200 rounded w-full py-2 cursor-pointer hover:bg-slate-300 transition-all"
        value="Login"
      >
    </form>
    <footer class="py-2 pl-4 text-blue-400">
      <p>No estas registrado? Puedes registrarte <a href="/register" class="font-bold hover:text-blue-600 hover:underline">Aqui</a></p>
    </footer>
  </x-card>
</div>
</body>
</html>