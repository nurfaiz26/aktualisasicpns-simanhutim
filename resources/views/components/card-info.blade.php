<a href="/informasi/{{ $informasi->id }}"
    class="max-w-[480px] flex items-center bg-main/20 border border-gray-200 rounded-lg shadow-sm max-h-[100px] w-full hover:bg-main/50">
    <div class="w-[100px] h-[100px] p-2 flex items-center justify-center bg-main rounded-l-lg">
        <img src="{{asset(!$informasi->gambars->isEmpty() ? route('storage.image', $informasi->gambars[0]->url) : 'images/logo-grayscale.png') }}" alt="Logo Ilustrasi" class="w-16 h-16" />
    </div>

    <div class="flex flex-col w-full items-start justify-between p-2 gap-1">
        <h5 class="text-lg font-bold tracking-tight text-main line-clamp-1 text-ellipsis">{{ $informasi->judul }}</h5>
        <p class="font-normal text-main/66 overflow-clip">Klasifikasi: 
             @foreach ($informasi->klasifikasis as $index => $klasifikasi)
                @if ($index == 0)
                    {{ $klasifikasi->masterKlasifikasi->nama }}
                @else
                    {{ ' | ' . $klasifikasi->masterKlasifikasi->nama }}
                @endif
            @endforeach
        </p>
    </div>
</a>
