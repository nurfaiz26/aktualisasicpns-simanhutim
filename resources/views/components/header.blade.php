<nav class="w-full px-4 md:px-10 py-4 flex items-center justify-between text-white font-bold">
    <div class="w-full flex flex-wrap items-center justify-between">
        <a href="/">
            <div class="flex w-fit gap-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Simanhutim"
                    class="w-[34px] sm:w-[56px] md:w-[68px] h-auto" />
                <div class="flex flex-col max-w-[200px] justify-center">
                    <h1 class="text-sm md:text-xl">SIMANHUTIM</h1>
                    <p class="font-normal text-xs hidden md:block">Sarana Informasi dan Manajemen Data KBIHU Jatim</p>
                </div>
            </div>
        </a>

        {{-- <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse items-center"> --}}
            {{-- <a href="#"> --}}
                {{-- <div class="flex gap-2 w-fit items-center"> --}}
                    {{-- <img src="{{ asset('images/user.png') }}" alt="Logo User" class="w-[32px] h-auto"/> --}}
                    {{-- <svg class="w-6 h-6 text-red-600" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                            clip-rule="evenodd" />
                    </svg> --}}

                    {{-- <p class="hidden xl:block">Login/Registrasi</p> --}}
                    {{-- <p class="hidden xl:block">Hi, Nama </p> --}}
                    {{-- <p class="hidden xl:block text-red-200">Laporan</p> --}}
                {{-- </div> --}}
            {{-- </a> --}}
            {{-- <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden group hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5 text-white group-hover:text-main" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button> --}}
        {{-- </div> --}}

        <button data-collapse-toggle="navbar-sticky" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden group hover:bg-white focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-sticky" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5 text-white group-hover:text-main" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col space-y-2 p-4 md:p-0 mt-4 font-medium border text-white bg-main md:bg-transparent border-main rounded-lg space-x-2 lg:space-x-4 xl:space-x-12 md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="/" class="md:bg-transparent text-white" aria-current="page">Beranda</a>
                </li>
                <li>
                    <a href="/berita" class="hover:bg-gray-100 md:hover:bg-transparent">Berita</a>
                </li>
                <li>
                    <a href="/travel" class="hover:bg-gray-100 md:hover:bg-transparent">Travel</a>
                </li>
                <li>
                    <a href="/informasi" class="hover:bg-gray-100 md:hover:bg-transparent">Info</a>
                </li>
                <li>
                    <a href="/tentang" class="hover:bg-gray-100 md:hover:bg-transparent">Tentang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
