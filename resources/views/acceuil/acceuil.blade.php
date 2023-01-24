
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite('resources/css/app.css')
  <title>L'Atelier a Vin</title>

  {{-- Section AlpineJS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.11.1/cdn.js"></script>
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
            <a href="/register"><button class=" w-80 bg-red-800 hover:bg-red-300 text-white font-regular py-2 px-4 rounded">
                Inscrivez-vous
              </button></a>
          </div>
          <div class="col-xs-12 explore">
            <a href="/login"><button class=" w-80 bg-red-800 hover:bg-red-300 text-white font-regular py-2 px-4 rounded">
                Connexion
              </button></a>
          </div>

</body>
</html>
