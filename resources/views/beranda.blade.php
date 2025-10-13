<x-layout>
    <div class="flex flex-col justify-between gap-10 w-full h-full">
        <div class="w-full flex flex-col items-center space-y-10">
            {{-- Seksi atas --}}
            <section class="w-full grid grid-cols-1 md:grid-cols-2">
                <div class="w-full hidden md:flex justify-center">
                    <img src="{{ asset('images/ilustrasi-beranda.png') }}" alt="Logo Ilustrasi" class="w-auto h-auto" />
                </div>

                <div class="w-full mt-10 px-10 xl:px-40 flex flex-col justify-start items-center gap-10">
                    <div class="w-full">
                        <h1 class="text-xl md:text-2xl lg:text-3xl font-extrabold text-white text-center">Cari Informasi
                            KBIHU/PPIU/PIHK di Jawa Timur</h1>
                    </div>

                    <div class="w-full mt-2">
                        <x-search-input onInput="handleSearchInput()" />
                    </div>

                    <div class="w-full mt-2">
                        <div
                            class="w-full max-h-[280px] p-4 flex flex-col gap-2 border-2 border-main rounded-xl overflow-auto">
                            <x-card-travel url="#" />
                            <x-card-travel url="#" />
                            <x-card-travel url="#" />
                            <x-card-travel url="#" />
                            <x-card-travel url="#" />
                        </div>
                    </div>
                </div>
            </section>

            {{-- Seksi tengah --}}
            <section class="w-full mt-10 flex flex-col items-center">
                <h1 class="text-main font-extrabold text-3xl">Informasi</h1>

                <div class="w-full mt-10 grid grid-cols-1 md:grid-cols-2 gap-4 px-10 xl:px-40">
                    <div class="w-full flex justify-center">
                        <x-card-info url="#" />
                    </div>
                    <div class="w-full flex justify-center">
                        <x-card-info url="#" />
                    </div>
                    <div class="w-full flex justify-center">
                        <x-card-info url="#" />
                    </div>
                    <div class="w-full flex justify-center">
                        <x-card-info url="#" />
                    </div>
                </div>
            </section>

            {{-- Seksi bawah --}}
            <section class="w-full mt-10 flex flex-col items-center">
                <section class="w-full mt-10 flex flex-col items-center">
                    <h1 class="text-main font-extrabold text-3xl">Berita</h1>

                    <div class="w-full mt-10 grid grid-cols-1 md:grid-cols-2 gap-4 px-10 xl:px-40">
                        <div class="w-full flex justify-center">
                            <x-card-berita url="#" />
                        </div>
                        <div class="w-full flex justify-center">
                            <x-card-berita url="#" />
                        </div>
                        <div class="w-full flex justify-center">
                            <x-card-berita url="#" />
                        </div>
                        <div class="w-full flex justify-center">
                            <x-card-berita url="#" />
                        </div>
                    </div>
                </section>
            </section>
        </div>

        <x-footer />
    </div>
</x-layout>

<script>
    function handleSearchInput() {
        console.log('faiz');

    }
</script>
