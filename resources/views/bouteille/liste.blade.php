@extends('layouts.master')
@section('content')



 <!-- Scripts Modal et Ajout Quantiter Bouteille-->
 {{-- @vite(['resources/js/listeBouteille.js']) --}}

    <div class='container mb-30 max-w-full'>
    {{-- Section header --}}
        <article class="zoneRouge mb-5 rounded-md bg-gradient-to-r from-red-900 via-red-800 to-red-600 p-5 sm:py-8">
        <h1 class="titreZoneRouge  text-6xl font-bold text-white ">
            Vos bouteilles
        </h1>
            <p class="text-sm font-normal text-white">Bienvenue dans votre cellier : {{$cellier->nom_cellier}}</p>
            <p class="mt-1 text-sm font-normal text-white">Nombre de bouteilles : {{count($bouteilles) }}</p>
        </article>







        <!-- Feedback success -->
        @if (session()->has('success'))
        <div class="text-emerald-600 text-center font-semibold my-10">{{ session('success') }}</div>
        @endif

        <!-- Feedback success -->
        @if ($msg)
        <div class="text-emerald-600 text-center font-semibold my-10">{{ $msg }}</div>
        @endif



        @if (count($bouteilles) == 0)
        <h3 class="titreSecondaire font-semibold">Bienvenue!</h3>
        <p class="mb-2">Veuillez ajouter votre première bouteille</p>


        {{-- Section créé bouteille --}}
        <a class="block text-center w-full max-w-sm border border-gray-200 rounded-lg shadow" href="{{ route('bouteille.nouveau', ['id' => $cellier->id]) }}">
            <svg class="mx-auto my-10" height="150px" width="150px"  viewBox="0 0 50 50"><rect fill="none" height="50" width="50"/><line fill="none" stroke="#bfbfbf" stroke-miterlimit="10" stroke-width="2" x1="9" x2="41" y1="25" y2="25"/><line fill="none" stroke="#bfbfbf" stroke-miterlimit="10" stroke-width="2" x1="25" x2="25" y1="9" y2="41"/></svg>
                <h5 class="mb-1 text-l font-medium text-gray-900 uppercase">Ajouter une bouteille</h5>
        </a>
        @else


        {{-- Section filtre --}}
        <div class="mb-3 flex justify-center space-x-2">
            {{--Par type--}}
            <button class="text-white bg-slate-700 font-medium rounded text-sm p-2 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown-type">Type<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
            <!-- Dropdown menu -->
            <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown-type">

                <ul class="py-1" aria-labelledby="dropdown-type">
                    <li>
                        <a href="{{ route('bouteille.liste', ['id' => $cellier->id,'type' => 1] ) }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Rouge</a>
                    </li>
                    <li>
                        <a href="{{ route('bouteille.liste', ['id' => $cellier->id,'type' => 2] ) }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Blanc</a>
                    </li>
                    <li>
                        <a href="{{ route('bouteille.liste', ['id' => $cellier->id,'type' => 3] ) }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Rosé</a>
                    </li>
                </ul>
            </div>

            {{--Par pays--}}
            <button class="text-white bg-slate-700 font-medium rounded text-sm p-2 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown-pays">Provenance<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
            <!-- Dropdown menu -->
            <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown-pays">
                <ul class="py-1" aria-labelledby="dropdown-pays">
                    @foreach ($pays as $data)
                    <li>
                        <a href="{{ route('bouteille.liste', ['id' => $cellier->id,'pays' => $data->pays] ) }}" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">{{$data->pays}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>


        {{--Par préférence--}}
        <button class="text-white bg-slate-700 font-medium rounded text-sm p-2 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown-note">Note<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
        <!-- Dropdown menu -->
        <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown-note">

            <ul class="py-1" aria-labelledby="dropdown-note">
                <li>
                    <a href="{{ route('bouteille.liste', ['id' => $cellier->id,'note' => 1] ) }}" class="flex text-sm hover:bg-gray-100 text-gray-700  px-4 py-2">1<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg></a>
                </li>
                <li>
                    <a href="{{ route('bouteille.liste', ['id' => $cellier->id,'note' => 2] ) }}" class="flex text-sm hover:bg-gray-100 text-gray-700  px-4 py-2">2<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg></a>
                </li>
                <li>
                    <a href="{{ route('bouteille.liste', ['id' => $cellier->id,'note' => 3] ) }}" class="flex text-sm hover:bg-gray-100 text-gray-700  px-4 py-2">3<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg></a>
                </li>
                <li>
                    <a href="{{ route('bouteille.liste', ['id' => $cellier->id,'note' => 4] ) }}" class="flex text-sm hover:bg-gray-100 text-gray-700  px-4 py-2">4<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg></a>
                </li>
                <li>
                    <a href="{{ route('bouteille.liste', ['id' => $cellier->id,'note' => 5] ) }}" class="flex text-sm hover:bg-gray-100 text-gray-700  px-4 py-2">5<svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg></a>
                </li>
            </ul>
        </div>
        {{-- <a class="ml-3 text-white bg-neutral-600 font-medium rounded text-lg px-3 py-2 text-center inline-flex items-center" href="{{ route('bouteille.liste', ['id' => $cellier->id] ) }}"><i class="fa-solid fa-xmark"></i></a> --}}
    </div>

    <div id="star-rating_container" class="bg-grey-light">
        <h3>Filtrer par les notes</h3>
        <span class="rounded bg-slate-400" w-5 h-5 ><a href="{{ route('bouteille.liste', ['id' => $cellier->id,'note' => 1] ) }}" class="flex text-sm hover:bg-gray-100 text-gray-700  px-4 py-2">1<i class="fa-solid fa-star"></i></a></span>

    </div>


     <div class="flex justify-center  space-x-2">


        <div class="relative w-16 h-16">
            {{-- <img class="rounded border border-gray-100 shadow-sm" src="https://randomuser.me/api/portraits/women/81.jpg" alt="user image" /> --}}

                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26.9 25.65" style="enable-background:new 0 0 26.9 25.65" xml:space="preserve"><style type="text/css">.st0{clip-path:url(#SVGID_2_);} .st1{fill:#FFD401;}</style><g><g><defs><path id="SVGID_1_" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0 l-6.6,5.76l1.95,8.54c0.09,0.38-0.15,0.75-0.53,0.84c-0.19,0.04-0.39,0-0.54-0.1l-7.5-4.48l-7.52,4.5 c-0.33,0.2-0.76,0.09-0.96-0.24c-0.1-0.16-0.12-0.35-0.08-0.52h0l1.95-8.54l-6.6-5.76c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_" style="overflow:visible"/></clipPath><g class="st0"><defs><rect id="SVGID_3_" x="-0.08" y="-0.1" width="27.01" height="25.85"/></defs><clipPath id="SVGID_4_"><use xlink:href="#SVGID_3_" style="overflow:visible"/></clipPath><g style="clip-path:url(#SVGID_4_)"><image style="overflow:visible" width="64" height="57" xlink:href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEAlgCWAAD/7AARRHVja3kAAQAEAAAAHgAA/+4AIUFkb2JlAGTAAAAAAQMA EAMCAwYAAAJIAAACsAAAA4b/2wCEABALCwsMCxAMDBAXDw0PFxsUEBAUGx8XFxcXFx8eFxoaGhoX Hh4jJSclIx4vLzMzLy9AQEBAQEBAQEBAQEBAQEABEQ8PERMRFRISFRQRFBEUGhQWFhQaJhoaHBoa JjAjHh4eHiMwKy4nJycuKzU1MDA1NUBAP0BAQEBAQEBAQEBAQP/CABEIADwAQwMBIgACEQEDEQH/ xACiAAADAQEBAQAAAAAAAAAAAAAABAUCAQMGAQACAwEAAAAAAAAAAAAAAAAAAwQFBgIQAAIABQME AwAAAAAAAAAAAAARAQIDBAUTJBUSIzMlMhQ0EQABAQYGAQUAAAAAAAAAAAABABAgEXGhMrECEkJy AzEhUSITFBIAAgADBAgHAQAAAAAAAAAAAQIAEAMhMaEiUXGBkbHRMtIRYRJykjNzQv/aAAwDAQAC EQMRAAAA+68SfRyaBPIrKBPAoektl3NMDQREp1Cbmp+jJAbruANsptSOKwGsrkJlKXnLHRkgu0ZA 00m2/iyBqqudKto0FikOkNyQ6Ak51h66IGkrP//aAAgBAgABBQC/v7ijccreHK3hbZG6nrmUhu0I s4bkycN2hFnDcmRkljc6chpyFrJLC4P/2gAIAQMAAQUApUpJpNCmaFMnoyQlLeHbQirDtltDtIRW h2y2mjCl1ROqJVmjpn//2gAIAQEAAQUAr14UIcjIcjIcjIcjIcjIcjIUbyWtOZH4MYxjGWH6DJfB jGMYzH/oMp42MYxjMdHcmV8bGMYxmNjujL+NjGMYzGR3RmPExjGMZi/1l/8AV6PUnqT1J6k9SepL L6Guf//aAAgBAgIGPwBqdNgFAX+QbxHWPiI6x8RFNGcFXcA5RcZPqXhOj+iyfUvCdH9FkxNRFsWw +rR5Ax9tPc/bH209z9sUiKiHOtgDdsv/2gAIAQMCBj8ABIti7GLsYJAuEhtm3tMhtm/tMhlJvu8O cdDYc46Gw5w+VhlOjnL/2gAIAQEBBj8ABIJiYeisKsKsKsKsKsK0DKQYRizJMviRZkmcHxIsyTOD 4kWdczg+JFnXyOD44lnXyOD44lmT9MdMfjp91vqt9Vvqt9Vvqt9UPz6vsgfPiDP/2Q==" transform="matrix(0.48 0 0 -0.48 -1.1399 26.7469)"/></g></g></g><path class="st1" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0l-1.18,1.03 c-3.21,1.11-7.42,1.78-12.03,1.78c-4.61,0-8.83-0.67-12.03-1.78l-1.18-1.03c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></g></svg>
                <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded z-2">1</div>

          {{-- <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded bg-green-400 z-2"><i class="fa-solid fa-star"></i></div> --}}
        </div>
        <div class="relative w-16 h-16">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26.9 25.65" style="enable-background:new 0 0 26.9 25.65" xml:space="preserve"><style type="text/css">.st0{clip-path:url(#SVGID_2_);} .st1{fill:#FFD401;}</style><g><g><defs><path id="SVGID_1_" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0 l-6.6,5.76l1.95,8.54c0.09,0.38-0.15,0.75-0.53,0.84c-0.19,0.04-0.39,0-0.54-0.1l-7.5-4.48l-7.52,4.5 c-0.33,0.2-0.76,0.09-0.96-0.24c-0.1-0.16-0.12-0.35-0.08-0.52h0l1.95-8.54l-6.6-5.76c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_" style="overflow:visible"/></clipPath><g class="st0"><defs><rect id="SVGID_3_" x="-0.08" y="-0.1" width="27.01" height="25.85"/></defs><clipPath id="SVGID_4_"><use xlink:href="#SVGID_3_" style="overflow:visible"/></clipPath><g style="clip-path:url(#SVGID_4_)"><image style="overflow:visible" width="64" height="57" xlink:href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEAlgCWAAD/7AARRHVja3kAAQAEAAAAHgAA/+4AIUFkb2JlAGTAAAAAAQMA EAMCAwYAAAJIAAACsAAAA4b/2wCEABALCwsMCxAMDBAXDw0PFxsUEBAUGx8XFxcXFx8eFxoaGhoX Hh4jJSclIx4vLzMzLy9AQEBAQEBAQEBAQEBAQEABEQ8PERMRFRISFRQRFBEUGhQWFhQaJhoaHBoa JjAjHh4eHiMwKy4nJycuKzU1MDA1NUBAP0BAQEBAQEBAQEBAQP/CABEIADwAQwMBIgACEQEDEQH/ xACiAAADAQEBAQAAAAAAAAAAAAAABAUCAQMGAQACAwEAAAAAAAAAAAAAAAAAAwQFBgIQAAIABQME AwAAAAAAAAAAAAARAQIDBAUTJBUSIzMlMhQ0EQABAQYGAQUAAAAAAAAAAAABABAgEXGhMrECEkJy AzEhUSITFBIAAgADBAgHAQAAAAAAAAAAAQIAEAMhMaEiUXGBkbHRMtIRYRJykjNzQv/aAAwDAQAC EQMRAAAA+68SfRyaBPIrKBPAoektl3NMDQREp1Cbmp+jJAbruANsptSOKwGsrkJlKXnLHRkgu0ZA 00m2/iyBqqudKto0FikOkNyQ6Ak51h66IGkrP//aAAgBAgABBQC/v7ijccreHK3hbZG6nrmUhu0I s4bkycN2hFnDcmRkljc6chpyFrJLC4P/2gAIAQMAAQUApUpJpNCmaFMnoyQlLeHbQirDtltDtIRW h2y2mjCl1ROqJVmjpn//2gAIAQEAAQUAr14UIcjIcjIcjIcjIcjIcjIUbyWtOZH4MYxjGWH6DJfB jGMYzH/oMp42MYxjMdHcmV8bGMYxmNjujL+NjGMYzGR3RmPExjGMZi/1l/8AV6PUnqT1J6k9SepL L6Guf//aAAgBAgIGPwBqdNgFAX+QbxHWPiI6x8RFNGcFXcA5RcZPqXhOj+iyfUvCdH9FkxNRFsWw +rR5Ax9tPc/bH209z9sUiKiHOtgDdsv/2gAIAQMCBj8ABIti7GLsYJAuEhtm3tMhtm/tMhlJvu8O cdDYc46Gw5w+VhlOjnL/2gAIAQEBBj8ABIJiYeisKsKsKsKsKsK0DKQYRizJMviRZkmcHxIsyTOD 4kWdczg+JFnXyOD44lnXyOD44lmT9MdMfjp91vqt9Vvqt9Vvqt9UPz6vsgfPiDP/2Q==" transform="matrix(0.48 0 0 -0.48 -1.1399 26.7469)"/></g></g></g><path class="st1" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0l-1.18,1.03 c-3.21,1.11-7.42,1.78-12.03,1.78c-4.61,0-8.83-0.67-12.03-1.78l-1.18-1.03c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></g></svg>
          <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded z-2">2</div>
        </div>
        <div class="relative w-16 h-16">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26.9 25.65" style="enable-background:new 0 0 26.9 25.65" xml:space="preserve"><style type="text/css">.st0{clip-path:url(#SVGID_2_);} .st1{fill:#FFD401;}</style><g><g><defs><path id="SVGID_1_" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0 l-6.6,5.76l1.95,8.54c0.09,0.38-0.15,0.75-0.53,0.84c-0.19,0.04-0.39,0-0.54-0.1l-7.5-4.48l-7.52,4.5 c-0.33,0.2-0.76,0.09-0.96-0.24c-0.1-0.16-0.12-0.35-0.08-0.52h0l1.95-8.54l-6.6-5.76c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_" style="overflow:visible"/></clipPath><g class="st0"><defs><rect id="SVGID_3_" x="-0.08" y="-0.1" width="27.01" height="25.85"/></defs><clipPath id="SVGID_4_"><use xlink:href="#SVGID_3_" style="overflow:visible"/></clipPath><g style="clip-path:url(#SVGID_4_)"><image style="overflow:visible" width="64" height="57" xlink:href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEAlgCWAAD/7AARRHVja3kAAQAEAAAAHgAA/+4AIUFkb2JlAGTAAAAAAQMA EAMCAwYAAAJIAAACsAAAA4b/2wCEABALCwsMCxAMDBAXDw0PFxsUEBAUGx8XFxcXFx8eFxoaGhoX Hh4jJSclIx4vLzMzLy9AQEBAQEBAQEBAQEBAQEABEQ8PERMRFRISFRQRFBEUGhQWFhQaJhoaHBoa JjAjHh4eHiMwKy4nJycuKzU1MDA1NUBAP0BAQEBAQEBAQEBAQP/CABEIADwAQwMBIgACEQEDEQH/ xACiAAADAQEBAQAAAAAAAAAAAAAABAUCAQMGAQACAwEAAAAAAAAAAAAAAAAAAwQFBgIQAAIABQME AwAAAAAAAAAAAAARAQIDBAUTJBUSIzMlMhQ0EQABAQYGAQUAAAAAAAAAAAABABAgEXGhMrECEkJy AzEhUSITFBIAAgADBAgHAQAAAAAAAAAAAQIAEAMhMaEiUXGBkbHRMtIRYRJykjNzQv/aAAwDAQAC EQMRAAAA+68SfRyaBPIrKBPAoektl3NMDQREp1Cbmp+jJAbruANsptSOKwGsrkJlKXnLHRkgu0ZA 00m2/iyBqqudKto0FikOkNyQ6Ak51h66IGkrP//aAAgBAgABBQC/v7ijccreHK3hbZG6nrmUhu0I s4bkycN2hFnDcmRkljc6chpyFrJLC4P/2gAIAQMAAQUApUpJpNCmaFMnoyQlLeHbQirDtltDtIRW h2y2mjCl1ROqJVmjpn//2gAIAQEAAQUAr14UIcjIcjIcjIcjIcjIcjIUbyWtOZH4MYxjGWH6DJfB jGMYzH/oMp42MYxjMdHcmV8bGMYxmNjujL+NjGMYzGR3RmPExjGMZi/1l/8AV6PUnqT1J6k9SepL L6Guf//aAAgBAgIGPwBqdNgFAX+QbxHWPiI6x8RFNGcFXcA5RcZPqXhOj+iyfUvCdH9FkxNRFsWw +rR5Ax9tPc/bH209z9sUiKiHOtgDdsv/2gAIAQMCBj8ABIti7GLsYJAuEhtm3tMhtm/tMhlJvu8O cdDYc46Gw5w+VhlOjnL/2gAIAQEBBj8ABIJiYeisKsKsKsKsKsK0DKQYRizJMviRZkmcHxIsyTOD 4kWdczg+JFnXyOD44lnXyOD44lmT9MdMfjp91vqt9Vvqt9Vvqt9UPz6vsgfPiDP/2Q==" transform="matrix(0.48 0 0 -0.48 -1.1399 26.7469)"/></g></g></g><path class="st1" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0l-1.18,1.03 c-3.21,1.11-7.42,1.78-12.03,1.78c-4.61,0-8.83-0.67-12.03-1.78l-1.18-1.03c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></g></svg>
          <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded z-2">3</div>
        </div>
        <div class="relative w-16 h-16">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26.9 25.65" style="enable-background:new 0 0 26.9 25.65" xml:space="preserve"><style type="text/css">.st0{clip-path:url(#SVGID_2_);} .st1{fill:#FFD401;}</style><g><g><defs><path id="SVGID_1_" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0 l-6.6,5.76l1.95,8.54c0.09,0.38-0.15,0.75-0.53,0.84c-0.19,0.04-0.39,0-0.54-0.1l-7.5-4.48l-7.52,4.5 c-0.33,0.2-0.76,0.09-0.96-0.24c-0.1-0.16-0.12-0.35-0.08-0.52h0l1.95-8.54l-6.6-5.76c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_" style="overflow:visible"/></clipPath><g class="st0"><defs><rect id="SVGID_3_" x="-0.08" y="-0.1" width="27.01" height="25.85"/></defs><clipPath id="SVGID_4_"><use xlink:href="#SVGID_3_" style="overflow:visible"/></clipPath><g style="clip-path:url(#SVGID_4_)"><image style="overflow:visible" width="64" height="57" xlink:href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEAlgCWAAD/7AARRHVja3kAAQAEAAAAHgAA/+4AIUFkb2JlAGTAAAAAAQMA EAMCAwYAAAJIAAACsAAAA4b/2wCEABALCwsMCxAMDBAXDw0PFxsUEBAUGx8XFxcXFx8eFxoaGhoX Hh4jJSclIx4vLzMzLy9AQEBAQEBAQEBAQEBAQEABEQ8PERMRFRISFRQRFBEUGhQWFhQaJhoaHBoa JjAjHh4eHiMwKy4nJycuKzU1MDA1NUBAP0BAQEBAQEBAQEBAQP/CABEIADwAQwMBIgACEQEDEQH/ xACiAAADAQEBAQAAAAAAAAAAAAAABAUCAQMGAQACAwEAAAAAAAAAAAAAAAAAAwQFBgIQAAIABQME AwAAAAAAAAAAAAARAQIDBAUTJBUSIzMlMhQ0EQABAQYGAQUAAAAAAAAAAAABABAgEXGhMrECEkJy AzEhUSITFBIAAgADBAgHAQAAAAAAAAAAAQIAEAMhMaEiUXGBkbHRMtIRYRJykjNzQv/aAAwDAQAC EQMRAAAA+68SfRyaBPIrKBPAoektl3NMDQREp1Cbmp+jJAbruANsptSOKwGsrkJlKXnLHRkgu0ZA 00m2/iyBqqudKto0FikOkNyQ6Ak51h66IGkrP//aAAgBAgABBQC/v7ijccreHK3hbZG6nrmUhu0I s4bkycN2hFnDcmRkljc6chpyFrJLC4P/2gAIAQMAAQUApUpJpNCmaFMnoyQlLeHbQirDtltDtIRW h2y2mjCl1ROqJVmjpn//2gAIAQEAAQUAr14UIcjIcjIcjIcjIcjIcjIUbyWtOZH4MYxjGWH6DJfB jGMYzH/oMp42MYxjMdHcmV8bGMYxmNjujL+NjGMYzGR3RmPExjGMZi/1l/8AV6PUnqT1J6k9SepL L6Guf//aAAgBAgIGPwBqdNgFAX+QbxHWPiI6x8RFNGcFXcA5RcZPqXhOj+iyfUvCdH9FkxNRFsWw +rR5Ax9tPc/bH209z9sUiKiHOtgDdsv/2gAIAQMCBj8ABIti7GLsYJAuEhtm3tMhtm/tMhlJvu8O cdDYc46Gw5w+VhlOjnL/2gAIAQEBBj8ABIJiYeisKsKsKsKsKsK0DKQYRizJMviRZkmcHxIsyTOD 4kWdczg+JFnXyOD44lnXyOD44lmT9MdMfjp91vqt9Vvqt9Vvqt9UPz6vsgfPiDP/2Q==" transform="matrix(0.48 0 0 -0.48 -1.1399 26.7469)"/></g></g></g><path class="st1" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0l-1.18,1.03 c-3.21,1.11-7.42,1.78-12.03,1.78c-4.61,0-8.83-0.67-12.03-1.78l-1.18-1.03c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></g></svg>
          <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded z-2">4</div>
        </div>
        <div class="relative w-16 h-16">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 26.9 25.65" style="enable-background:new 0 0 26.9 25.65" xml:space="preserve"><style type="text/css">.st0{clip-path:url(#SVGID_2_);} .st1{fill:#FFD401;}</style><g><g><defs><path id="SVGID_1_" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0 l-6.6,5.76l1.95,8.54c0.09,0.38-0.15,0.75-0.53,0.84c-0.19,0.04-0.39,0-0.54-0.1l-7.5-4.48l-7.52,4.5 c-0.33,0.2-0.76,0.09-0.96-0.24c-0.1-0.16-0.12-0.35-0.08-0.52h0l1.95-8.54l-6.6-5.76c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_" style="overflow:visible"/></clipPath><g class="st0"><defs><rect id="SVGID_3_" x="-0.08" y="-0.1" width="27.01" height="25.85"/></defs><clipPath id="SVGID_4_"><use xlink:href="#SVGID_3_" style="overflow:visible"/></clipPath><g style="clip-path:url(#SVGID_4_)"><image style="overflow:visible" width="64" height="57" xlink:href="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgEAlgCWAAD/7AARRHVja3kAAQAEAAAAHgAA/+4AIUFkb2JlAGTAAAAAAQMA EAMCAwYAAAJIAAACsAAAA4b/2wCEABALCwsMCxAMDBAXDw0PFxsUEBAUGx8XFxcXFx8eFxoaGhoX Hh4jJSclIx4vLzMzLy9AQEBAQEBAQEBAQEBAQEABEQ8PERMRFRISFRQRFBEUGhQWFhQaJhoaHBoa JjAjHh4eHiMwKy4nJycuKzU1MDA1NUBAP0BAQEBAQEBAQEBAQP/CABEIADwAQwMBIgACEQEDEQH/ xACiAAADAQEBAQAAAAAAAAAAAAAABAUCAQMGAQACAwEAAAAAAAAAAAAAAAAAAwQFBgIQAAIABQME AwAAAAAAAAAAAAARAQIDBAUTJBUSIzMlMhQ0EQABAQYGAQUAAAAAAAAAAAABABAgEXGhMrECEkJy AzEhUSITFBIAAgADBAgHAQAAAAAAAAAAAQIAEAMhMaEiUXGBkbHRMtIRYRJykjNzQv/aAAwDAQAC EQMRAAAA+68SfRyaBPIrKBPAoektl3NMDQREp1Cbmp+jJAbruANsptSOKwGsrkJlKXnLHRkgu0ZA 00m2/iyBqqudKto0FikOkNyQ6Ak51h66IGkrP//aAAgBAgABBQC/v7ijccreHK3hbZG6nrmUhu0I s4bkycN2hFnDcmRkljc6chpyFrJLC4P/2gAIAQMAAQUApUpJpNCmaFMnoyQlLeHbQirDtltDtIRW h2y2mjCl1ROqJVmjpn//2gAIAQEAAQUAr14UIcjIcjIcjIcjIcjIcjIUbyWtOZH4MYxjGWH6DJfB jGMYzH/oMp42MYxjMdHcmV8bGMYxmNjujL+NjGMYzGR3RmPExjGMZi/1l/8AV6PUnqT1J6k9SepL L6Guf//aAAgBAgIGPwBqdNgFAX+QbxHWPiI6x8RFNGcFXcA5RcZPqXhOj+iyfUvCdH9FkxNRFsWw +rR5Ax9tPc/bH209z9sUiKiHOtgDdsv/2gAIAQMCBj8ABIti7GLsYJAuEhtm3tMhtm/tMhlJvu8O cdDYc46Gw5w+VhlOjnL/2gAIAQEBBj8ABIJiYeisKsKsKsKsKsK0DKQYRizJMviRZkmcHxIsyTOD 4kWdczg+JFnXyOD44lnXyOD44lmT9MdMfjp91vqt9Vvqt9Vvqt9UPz6vsgfPiDP/2Q==" transform="matrix(0.48 0 0 -0.48 -1.1399 26.7469)"/></g></g></g><path class="st1" d="M14.1,0.43l3.44,8.05l8.72,0.78c0.39,0.03,0.67,0.37,0.64,0.76c-0.02,0.19-0.1,0.35-0.24,0.47l0,0l-1.18,1.03 c-3.21,1.11-7.42,1.78-12.03,1.78c-4.61,0-8.83-0.67-12.03-1.78l-1.18-1.03c-0.29-0.25-0.32-0.7-0.07-0.99 C0.3,9.35,0.48,9.28,0.66,9.27l8.7-0.78l3.44-8.06c0.15-0.36,0.56-0.52,0.92-0.37C13.9,0.13,14.03,0.27,14.1,0.43L14.1,0.43 L14.1,0.43z"/></g></svg>
          <div class="absolute top-0 right-0 h-4 w-4 my-1 border-2 border-white rounded z-2">5</div>
        </div>

        </div>



    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    {{-- FIN Section filtre --}}

    @endif



    {{-- Section Carte Bouteille  --}}
    <div class="flexPerso">
    @foreach ($bouteilles as  $info)
      <div class="vinoCarte m-2 bg-white shadow  border rounded-lg">



        {{-- Section Action  --}}
        <div class="flex justify-between relative rounded-3xl  p-3 text-right">

            <!-- logo SAQ-->
            <span class="inline-block mr-2">
                <a href="{{$info->url_saq}}"><img class="logoSAQ" src="https://upload.wikimedia.org/wikipedia/fr/thumb/8/84/SAQ_Logo.svg/1200px-SAQ_Logo.svg.png" alt=""></a>
            </span>


              <!-- zone edit bouteille-->
              <div class="flex justify-items-end">
              <span class="inline-block text-xl text-gray-700 mr-2">
                  <a href="{{ route('bouteille.edit', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id  ]) }}">
                  <i class="far fa-edit"></i></a>
              </span>
              <!-- zone delete bouteille-->
              <span class="inline-block text-xl  text-gray-700">
                  <form action="{{ route('bouteille.supprime', ['idVin' => $info->vino__bouteille_id, 'idCellier' => $info->vino__cellier_id ]) }}" method="POST">
                      @csrf
                      <button data-modal="modal-{{ $info->vino__bouteille_id }}" class="delete">
                        <i class="fa-sharp fa-solid fa-trash  space-y-2"></i></button>
                  </form>
              </span>
          </div>
        </div>
        {{-- FIN Section Action  --}}

        {{-- Section img  --}}
        <div class='zoneImg '>
                @switch($info->type)
                @case(1)
                    <img src="https://www.saq.com/media/catalog/product/1/5/15085107-1_1661793344.png">
                @break
                @case(2)
                    <img  src="https://www.saq.com/media/catalog/product/1/2/12728904-1_1649076332.png">
                @break
                @case(3)
                    <img src="https://www.saq.com/media/catalog/product/2/1/219840-1_1632166239.png">
                @break
            @endswitch
        </div>
        {{-- FIN Section img  --}}

        <div class="p-4 grow flex flex-col">



          <div class="flex items-center justify-between">
            {{-- Section pour inserer le nom de la bouteille --}}
            <h1 class="text-gray-600 font-medium">{{$info->nom}}</h1>


            {{-- Click pour Info description sur la bouteille ALPINEJS--}}
            <div class="mt-4">
            <div x-data="{showContextMenu:false}">
                {{-- ContextMenu False / Modale ferme quand on click away --}}
                <div class=" relative" @click.away="showContextMenu=false">
                    <button class=" h-10 w-10 leading-10 text-center text-gray-800 text-xl  rounded-lg  font-semibold outline-none" @click="showContextMenu=true" " >
                        <i class="fa-solid fa-circle-info"></i>
                    </button>
                  <div class="z-50 absolute mt-12 bottom-0 right-0 min-w-full w-25 " style="display:none;" x-show="showContextMenu" >
                    <div class="description z-50 p-5 bg-white overflow-auto rounded-lg shadow-md w-full relative py-2 border border-gray-300 text-gray-800 text-2xl">

                        <p class="text-xs"><small><strong>Pays </strong>{{ $info->pays}}</small></p>
                        <p class="flex  text-xs"><small><strong>Prix: </strong>{{ $info->prix_saq}}$</small></p>
                        <p class="flex  text-xs"><small><strong>Code Saq: </strong>{{ $info->code_saq}}</small></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            {{-- FIN Click pour Info description sur la bouteille ALPINEJS--}}


            {{-- Section Autre --}}


          </div>

          <div class="py-1 text-m font- justify-start">
            {{-- Section pour inserer TYPE, PAYS, VOLUME --}}
            <small>
                {{-- TODo traiter type --}}
                @switch($info->type)
                    @case(1)
                        Vin Rouge
                        @break
                    @case(2)
                        Vin Blanc
                        @break
                    @case(3)
                        Vin Rosé
                        @break
                @endswitch
                | {{$info->format}} | {{$info->pays}}
            </small>
        </div>

        {{-- Section millesime--}}
        @if ($info->millesime)
        <div class="options py-1 flex mt-3 pr-3 space-x-2  text-sm font-medium justify-start items-baseline">
            <p>Millesime</p>
            <span class="inline-block bg-gray-200 text-slate rounded-lg p-1   text-sm font-semibold  ">{{ $info->millesime }}</span>
        </div>
    @endif

 {{-- Section AJOUTER au BOIRE --}}
        <div class="grow flex flex-col justify-end justify-items-stretch content-end">

           @csrf
           <div class="options py-2  text-sm" data-id="{{$info->vino__cellier_id}}" data-id-vin="{{$info->vino__bouteille_id}}">
               <p class="font-semibold">Quantité </p>
                   <div class="flex py-3" >
                    <button data-id="{{ $info->vino__cellier_id }}" data-id-vin="{{ $info->vino__bouteille_id }}" data-action="plus" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'>
                        <i class="fa-solid fa-plus"></i></button>
                    <p class="p-2 quantite">{{ $info->quantite }}</p>
                    <button data-id="{{ $info->vino__cellier_id }}" data-id-vin="{{ $info->vino__bouteille_id }}" data-action="moins" class='btnModif  bg-gray-200 rounded px-3 py-1 text-md font-semibold text-gray-700'>
                        <i class="fa-solid fa-minus"></i></button>
                   </div>

           </div>

             {{-- Section pour inserer les notes --}}


        <div class="feedback">
          <div class="note" data-id="{{ $info->vino__cellier_id }}" data-id-vin="{{ $info->vino__bouteille_id }}">

            <input type="radio" name="note-{{$info->vino__bouteille_id}}" id="note-{{$info->vino__bouteille_id}}-5" value="5" @if($info->note == "5") checked @endif>
            <label for="note-{{$info->vino__bouteille_id}}-5"></label>

            <input type="radio" name="note-{{$info->vino__bouteille_id}}" id="note-{{$info->vino__bouteille_id}}-4" value="4" @if($info->note == "4") checked @endif>
            <label for="note-{{$info->vino__bouteille_id}}-4"></label>

            <input type="radio" name="note-{{$info->vino__bouteille_id}}" id="note-{{$info->vino__bouteille_id}}-3" value="3" @if($info->note == "3") checked @endif>
            <label for="note-{{$info->vino__bouteille_id}}-3"></label>

            <input type="radio" name="note-{{$info->vino__bouteille_id}}" id="note-{{$info->vino__bouteille_id}}-2" value="2" @if($info->note == "2") checked @endif>
            <label for="note-{{$info->vino__bouteille_id}}-2"></label>

            <input type="radio" name="note-{{$info->vino__bouteille_id}}" id="note-{{$info->vino__bouteille_id}}-1" value="1" @if($info->note == "1") checked @endif>
            <label for="note-{{$info->vino__bouteille_id}}-1"></label>

          </div>
        </div>

    </div>





        </div>

    {{-- Section Fin Carte Bouteil  --}}

</div>






    <!-- Modal -->
    <div class="modalBouteille modal" id="modal-{{ $info->vino__bouteille_id }}">
        <div class="modal-bg modal-exit"></div>
        <div class="modal-container">
            <button data-action="no-supprimer" class="modal-close modal-exit"><i class="fa fa-window-close"
                    aria-hidden="true"></i></button>
            <div><i class="block text-amber-600 mx-auto fa-solid fa-triangle-exclamation text-5xl"></i>
            </div>
            <h1 class="text-2xl font-bold">Voulez-vous supprimer</h1>
            <h2 class="font-semibold uppercase text-2xl text-amber-800">{{ $info->nom }}</h2>

            <p class="mb-3">
                @if ($info->quantite != 0)
                    @if ($info->quantite == 1)
                        {{ $info->quantite }} bouteille sera supprimée
                    @else
                        {{ $info->quantite }} bouteilles seront supprimées
                    @endif
                @endif
            </p>
            <div class="flex justify-end space-x-1">
                <button class="bg-red-900 text-white font-bold py-2 px-4 rounded modal-exit"
                    data-action="supprimer" class="modal-exit">Supprimer</button>
                <button class="bg-slate-900 text-white font-bold py-2 px-4 rounded modal-exit"
                    data-action="no-supprimer" class="modal-exit">Non</button>


            </div>
        </div>
    </div> <!-- Modal Fin -->
  @endforeach
</div>
    {{-- Section pour le navbar du bas --}}
    @include('layouts.bottomNav')
@endsection
