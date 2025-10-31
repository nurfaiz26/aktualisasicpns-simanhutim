<x-layout>
    <div class="w-full flex flex-col items-center space-y-10 px-10 lg:px-40">
        <section class="mt-10 w-full flex flex-col items-center">
            <div class="aspect-[4/3] w-full max-w-xl h-auto bg-transparent">
                <img src="{{ asset(!$informasi->gambars->isEmpty() ? route('storage.image', $informasi->gambars[0]->url) : 'images/logo-grayscale.png') }}"
                    alt="Logo Ilustrasi" class="w-full h-full object-contain" />
            </div>
        </section>

        <section class="mt-10 w-full max-w-4xl flex flex-col items-start">
            <h1 class="text-2xl font-extrabold text-main">{{ $informasi->judul }}</h1>
            <div class="flex text-main gap-1">
                <p>Klasifikasi: </p>
                @foreach ($informasi->klasifikasis as $index => $klasifikasi)
                    @if ($index == 0)
                        {{ $klasifikasi->masterKlasifikasi->nama }}
                    @else
                        {{ ' | ' . $klasifikasi->masterKlasifikasi->nama }}
                    @endif
                @endforeach
            </div>

            <div class="mt-10 text-main text-justify">
                <p>{{ $informasi->deskripsi }}</p>
            </div>
        </section>
    </div>
</x-layout>
