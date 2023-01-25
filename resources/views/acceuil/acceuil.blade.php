
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

 
  <title>L'Atelier a Vin</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

 

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Section AlpineJS --}}
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.11.1/cdn.js"></script>
</head>
<body>


        <div>
          <div>
            <div class="item active background a"></div>
          </div>
        </div>

        <div class="covertext">
          <div class="col-lg-10" style="float:none; margin:0 auto;">
            <h1 class="title">L'ATELIER À VIN</h1>

          </div>
          <div class="col-xs-12 explore">

            
            <a href="register">
              <button class=" appbtn w-80 bg-red-800 hover:bg-red-300 text-white font-regular py-2 px-4 rounded">

                Inscrivez-vous
              </button></a>
          </div>
          <div class="col-xs-12 explore">

            <a href="/login"><button class="appbtn w-80 bg-red-800 hover:bg-red-300 text-white font-regular py-2 px-4 rounded">
                Connexion
              </button></a>
          </div>

            
          </div>
          <div class=" py-12 col-xs-12 explore">
            <!--
            <button class="w-80 bg-transparent hover:bg-red-300 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded">
                EXPLORER LES CELLIERS
              </button>
            -->
        </div>




</body>
</html>
