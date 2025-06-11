<header class="fixed top-0 flex justify-center px-6 py-3 mb-6 w-full bg-gray-100 text-sm shadow-bottom z-10">
    <div class="flex justify-between items-center gap-x-3 w-full lg:max-w-[1000px]">
        <a
            href="{{ route('home') }}"
            class="p-1 hover:bg-indigo-700 border hover:border-indigo-700 text-indigo-600 hover:text-white transition-colors duration-150 text-sm leading-normal rounded-sm"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="1.3rem"
                height="1.3rem"
            >
                <path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z"></path>
            </svg>
        </a>
        <h1 class="w-fit text-xl font-semibold">ToDoList App</h1>
        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                @auth
                    @if (Route::has('logout'))
                        <x-global.button type="ghost" size="sm" link="{{ route('logout') }}">
                            Cerrar Sesión
                        </x-global.button>
                    @endif
                @else
                    <x-global.button type="ghost" size="sm" link="{{ route('login') }}">
                        Iniciar sesión
                    </x-global.button>
                @endauth
            </nav>
        @endif
    </div>


</header>
