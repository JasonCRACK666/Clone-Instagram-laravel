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
  <x-card-message />
  {{-- Navbar --}}
  <x-navbar></x-navbar>

  {{-- Content --}}
  <main class="flex justify-center gap-2 pt-4 relative">
    {{-- EL CHILDREN --}}
    {{ $slot }}
  </main>
</body>
</html>