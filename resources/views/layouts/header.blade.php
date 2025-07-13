<header class="fixed top-0 flex justify-center w-full bg-gray-50 text-sm z-20">
    <div class="w-full max-w-[350px]"></div>
    <div class="flex flex-col xs:flex-row justify-between items-center gap-3 px-6 py-3 w-full border-b border-b-gray-200">
        <a href="{{route('home')}}" class="w-fit text-xl font-semibold">ToDoList App</a>
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
