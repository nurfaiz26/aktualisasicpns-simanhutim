<a href="{{ $url }}"
    class="flex items-center bg-main/20 border border-gray-200 rounded-lg shadow-sm max-h-[100px] w-full hover:bg-main/50">
    <div class="w-[100px] h-[100px] p-2 flex items-center justify-center bg-main rounded-l-lg">
        <img src="{{ asset('images/logo-grayscale.png') }}" alt="Logo Ilustrasi" class="w-16 h-16" />
    </div>

    <div class="flex flex-col w-full items-start justify-between p-2 gap-1">
        <h5 class="text-lg font-bold tracking-tight text-main line-clamp-1 text-ellipsis">PT Dummy Travelindo</h5>
        <p class="font-normal text-main/66 truncate">PPIU|PIHK|KBIHU</p>
        <div class="w-full flex gap-2">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/star.png') }}" alt="Bintang Rating" class="w-4 h-4" />
                <p class="font-normal text-main/66">4,3</p>
            </div>

            <div class="flex items-center gap-2">
                <img src="{{ asset('images/location-pin.png') }}" alt="Pin Lokasi" class="w-4 h-4" />
                <p class="font-normal text-main/66 truncate">Kota Surabaya</p>
            </div>
        </div>
    </div>
</a>
