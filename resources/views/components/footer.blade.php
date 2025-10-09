<footer class="flex w-full px-8 py-12 justify-center md:justify-between items-center bg-main text-white">
    <div class="flex items-center w-[300px] gap-4">
        <img src="{{ asset('images/kemenag.png') }}" alt="Logo Kemenag" class="w-[83px] h-[78px]"/>
        <div class="flex flex-col justify-center">
            <h1 class="text-sm font-bold">Bidang Penyelenggaraan Haji dan Umrah</h1>
            <p class="font-normal text-xs">Kanwil Kementerian Agama Provinsi Jawa Timur</p>
        </div>
    </div>

    <p class="text-xs text-white opacity-50 hidden md:block">{{ '@PHU' }} Jatim 2025</p>

    <div class="w-[300px] hidden md:block">
        <div class="flex flex-col gap-4 items-end justify-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/internet.png') }}" alt="Logo Internet" class="w-[25px] h-[25px]"/>
                <p class="text-md">www.haji.kemenag.go.id</p>
            </div>
            
            <div class="flex gap-2">
                <img src="{{ asset('images/instagram.png') }}" alt="Logo Instagram" class="w-[25px] h-[25px]"/>
                <img src="{{ asset('images/facebook.png') }}" alt="Logo Facebook" class="w-[25px] h-[25px]"/>
                <img src="{{ asset('images/twitter.png') }}" alt="Logo Twitter" class="w-[25px] h-[25px]"/>
                <img src="{{ asset('images/youtube.png') }}" alt="Logo Youtube" class="w-[31px] h-[31px]"/>
                <img src="{{ asset('images/tiktok.png') }}" alt="Logo Tik Tok" class="w-[25px] h-[25px]"/>
                <p class="text-md">Informasi Haji</p>
            </div>
        </div>
    </div>
</footer>
