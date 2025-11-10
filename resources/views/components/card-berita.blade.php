<a href="berita/{{ $berita->id }}"
    class="w-[480px] h-[200px] flex items-start bg-gradient-to-b from-main/20 to-white hover:bg-main/50">
    <div class="flex-1 p-2 flex items-center justify-center">
        <div class="w-fit h-[180px] bg-transparent rounded-lg">
            <img src="{{ asset(!$berita->gambars->isEmpty() ? route('storage.image', $berita->gambars[0]->url) : 'images/logo-grayscale.png') }}"
                alt="Logo Ilustrasi" class="w-full h-full object-contain" />
        </div>
    </div>

    <div class="flex-1 h-full flex flex-col w-full items-start justify-between p-2 gap-1">
        <div class="w-full flex flex-col gap-1">
            <h5 class="text-lg font-bold tracking-tight text-main line-clamp-1 text-ellipsis">{{ $berita->judul }}</h5>
            <p class="font-normal text-main/66 line-clamp-1 text-ellipsis">Klasifikasi:
                @foreach ($berita->klasifikasis as $index => $klasifikasi)
                    @if ($index == 0)
                        {{ $klasifikasi->masterKlasifikasi->nama }}
                    @else
                        {{ ' | ' . $klasifikasi->masterKlasifikasi->nama }}
                    @endif
                @endforeach
            </p>
            <p class="font-normal text-main/66 line-clamp-2 xl:line-clamp-4 text-ellipsis">{{ $berita->deskripsi }}</p>
        </div>

        <div class="w-full flex justify-end">
            <p class="font-normal text-main/66 truncate">{{ $berita->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
</a>
