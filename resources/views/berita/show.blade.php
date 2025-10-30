<x-layout>
    <div class="w-full flex flex-col items-center space-y-10 px-10 lg:px-40">
        <section class="mt-10 w-full flex flex-col items-center">
            <div class="aspect-[4/3] w-full max-w-xl h-auto bg-transparent">
            <img src="{{ asset(!$berita->gambars->isEmpty() ? route('storage.image', $berita->gambars[0]->url) : 'images/logo-grayscale.png') }}"
                alt="Logo Ilustrasi" class="w-full h-full object-contain" /></div>
        </section>

        <section class="mt-10 w-full max-w-4xl flex flex-col items-center">
            <div class="w-full flex items-end justify-between">
                <div class="flex flex-col">
                    <h1 class="text-2xl font-extrabold text-main">{{ $berita->judul }}</h1>
                    <div class="flex text-main gap-1">
                        <p>Klasifikasi: </p>
                        @foreach ($berita->klasifikasis as $index => $klasifikasi)
                            @if ($index == 0)
                                {{ $klasifikasi->masterKlasifikasi->nama }}
                            @else
                                {{ ' | ' . $klasifikasi->masterKlasifikasi->nama }}
                            @endif
                        @endforeach
                    </div>
                </div>

                <p class="text-main">{{ Carbon\Carbon::parse($berita->created_at)->format('d/m/Y') }}</p>
            </div>

            <div class="mt-10 text-main text-justify">
                <p>{{ $berita->deskripsi }}</p>
            </div>
        </section>
    </div>
</x-layout>
