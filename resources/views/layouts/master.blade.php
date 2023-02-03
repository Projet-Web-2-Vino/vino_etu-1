<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>L'Atelier a Vin</title>


  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  {{-- Section AlpineJS --}}
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.11.1/cdn.js"></script>


</head>
<body>
      <div class="w-full bg-red-900 ">
            <div class="text-center py-4">
              <a href="/cellier" class="text-lg font-semibold uppercase  text-white">L'atelier a vin </a>
            </div>
      </div>
</body>
  @yield('content')
</html>
