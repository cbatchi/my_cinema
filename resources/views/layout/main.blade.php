<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyCinema App</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <livewire:styles>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>

</head>
<body class="font-sans bg-gray-900 text-white">

  <nav class="border-b border-gray-800">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
      <ul class="flex flex-col md:flex-row items-center font-semibold">
        <li>
          <a href="/">
            <i class="fa fa-film text-4xl" aria-hidden="true"></i>
            <span class="px-4 text-2xl">MyCinema</span>
          </a>
        </li>
        <li class="md:ml-16 mt-3 md:mt-0">
          <a href="" class="hover:text-gray-300">Movies</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
          <a href="#" class="hover:text-gray-300">TV Shows</a>
        </li>
        <li class="md:ml-6 mt-3 md:mt-0">
          <a href="#" class="hover:text-gray-300">Actors</a>
        </li>
      </ul>
      <div class="flex flex-col md:flex-row items-center">

        <livewire:search-dropdown />{{-- Insert search dropdown component --}}

        <div class="md:ml-4 mt-3 md:mt-0">
          <a href="#">
            <img class="rounded-full w-8 h-8" src="https://images.unsplash.com/photo-1561726677-e72bf9c6af30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" alt="Avatar">
          </a>
        </div>
      </div>
    </div>
  </nav>

  @yield('content')
  <livewire:scripts>
</body>
</html>