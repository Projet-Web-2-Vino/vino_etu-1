<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full p-3  font-bold text-white bg-red-800 rounded-full my-5 focus:outline-none transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
