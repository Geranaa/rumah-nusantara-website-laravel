<nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('index') }}"class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="/assets/rn.png" class="h-8 md:h-20" alt="Flowbite Logo" />
        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" id="garistiga" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex list-none flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('index') }}"
                        class="block py-2 px-3 text-white rounded-sm md:bg-transparent md:hover:text-blue-700 md:p-0 dark:hover:bg-blue-700 md:dark:hover:text-blue-500 md:dark:bg-transparent"
                        aria-current="page">Beranda</a>
                </li>

                </li>
                <li>
                    <div
                        class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-blue-700 dark:hover:text-white md:dark:hover:bg-transparent">
                        Properti
                        Lainnya (Coming Soon)</div>
                </li>
                <li>
                    <a href="{{ route('berita') }}"
                        class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-blue-700 dark:hover:text-white md:dark:hover:bg-transparent">Berita</a>
                </li>
                <li>
                    <a href="{{ route('kontak') }}"
                        class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-blue-700 dark:hover:text-white md:dark:hover:bg-transparent">Kontak
                        dan Bantuan</a>
                </li>
                @auth
                    <li>
                        <div class="relative inline-block">
                            <button id="dropdown-button" class="px-4 py-2 bg-gray-200 rounded-md">
                                {{ auth()->user()->name }} ▼
                            </button>

                            <div id="dropdown-menu" class="absolute hidden bg-white rounded-md shadow-md mt-2 w-48 right-0">
                                <a href="{{ route('rumah_daftar') }}"
                                    class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                    Dashboard
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                    @endauth
            </ul>
        </div>
    </div>

    <script type="module" src="{{ Vite::asset('resources/js/navbar.js') }}"></script>
</nav>
