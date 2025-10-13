<a href="{{ $url }}"
    class="w-[480px] h-[200px] flex items-start bg-gradient-to-b from-main/20 to-white hover:bg-main/50">
    <div class="flex-1 p-2 flex items-center justify-center">
        <div class="w-[240px] h-[180px] bg-gray-200 rounded-lg">
            {{-- <img src="{{ asset('images/logo-grayscale.png') }}" alt="Logo Ilustrasi" class="w-[240px] h-[180px]" /> --}}
        </div>
    </div>

    <div class="flex-1 h-full flex flex-col w-full items-start justify-between p-2 gap-1">
        <div class="w-full flex flex-col gap-1">
            <h5 class="text-lg font-bold tracking-tight text-main line-clamp-1 text-ellipsis">Judul Berita</h5>
            <p class="font-normal text-main/66 line-clamp-1 text-ellipsis">Klasifikasi: PPIU|Umrah</p>
            <p class="font-normal text-main/66 line-clamp-2 xl:line-clamp-4 text-ellipsis">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe debitis laudantium voluptatibus quas, at reiciendis. Facere, temporibus. Commodi, vel id?</p>
        </div>

        <div class="w-full flex justify-end">
            <p class="font-normal text-main/66 truncate">7/10/25</p>
        </div>
    </div>
</a>
