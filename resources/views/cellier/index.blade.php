<h1>Espace cellier</h1>

@if (session()->has('success'))
<span style="color:green">{{ session('success') }}</span>
@endif

@if ($celliers)
<h3>Vos celliers</h3>
@foreach ($celliers as  $info)
    <div>
    </span>  {{$info->nom_cellier}} </span>
     <!-- zone edit cellier-->
     <a href="{{ route('cellier.edit', ['id' => $info->id ]) }}">Éditer</a>
     <!-- zone delete cellier-->
     <form action="{{ route('cellier.supprime', ['id' => $info->id]) }}" method="POST">
         @csrf
         <button>Supprimer</button>
     </form>
    </div>
@endforeach
@endif

<div class="container mx-auto my-12 p-12 bg-gray-100">
    <div class="mb-4 w-full md:w-1/4 border-t-4 border-red-400 rounded-b-lg rounded-t shadow-lg bg-white overflow-hidden">
      <div class="mt-4 mb-8 px-6 py-4">
        <div class="py-4 text-lg text-gray-700 tracking-wide">一级菜单</div>
        <div class="px-4 py-2 border-l-4 border-red-400 bg-red-100 cursor-pointer text-gray-800 flex items-center">
          <i class="fa fa-home"></i>
          <span class="pl-2">系统设置</span>
        </div>
        <div class="px-4 py-2 border-l-4 border-transparent cursor-pointer text-gray-800 flex items-center">
          <i class="fa fa-user"></i>
          <span class="pl-2">用户管理</span>
        </div>
        <div class="py-4 text-lg text-gray-700 tracking-wide">一级菜单</div>
        <div class="px-4 py-2 border-l-4 border-transparent cursor-pointer text-gray-800 flex items-center">
          <i class="fa fa-home"></i>
          <span class="pl-2">系统设置</span>
        </div>
        <div class="px-4 py-2 border-l-4 border-transparent cursor-pointer text-gray-800 flex items-center">
          <i class="fa fa-user"></i>
          <span class="pl-2">用户管理</span>
        </div>
      </div>
    </div>

    <div class="mb-4 w-full md:w-1/4 shadow">
      <ul class="list-reset">
        <li>
          <a href="" class="block p-4 border-r-4 border-purple-400 text-base text-gray-gray-400 font-bold hover:border-purple-500 hover:bg-purple-100">商品管理</a>
        </li>
        <li>
          <a href="" class="block p-4 border-r-4 border-transparent text-base text-gray-gray-400 font-bold hover:border-purple-500 hover:bg-purple-100">系统管理</a>
        </li>
        <li>
          <a href="" class="block p-4 border-r-4 border-transparent text-base text-gray-gray-400 font-bold hover:border-purple-500 hover:bg-purple-100">分类管理</a>
        </li>
        <li>
          <a href="" class="block p-4 border-r-4 border-transparent text-base text-gray-gray-400 font-bold hover:border-purple-500 hover:bg-purple-100">联系我们</a>
        </li>
      </ul>
    </div>
  </div>

<a href='cellier/nouveau'>Ajouter un cellier</a>
