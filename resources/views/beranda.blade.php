<x-layout>
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
                    <x-search-input id="search-travel" />
                </div>

                <div class="w-full mt-2">
                    <div id="travel-list"
                        class="w-full max-h-[280px] p-4 flex flex-col gap-2 border-2 border-main rounded-xl overflow-auto"
                        @if ($travels->isEmpty()) hidden @endif>
                        {{-- @foreach ($travels as $travel)
                            <x-card-travel :travel="$travel" />
                        @endforeach --}}
                    </div>

                    {{-- <p id="empty-message" class="mt-10 text-main/66 text-center italic"
                        @if (!$travels->isEmpty()) hidden @endif>Data Travel Kosong</p> --}}
                </div>
            </div>
        </section>

        {{-- Seksi tengah --}}
        <section class="w-full mt-10 flex flex-col items-center">
            <h1 class="text-main font-extrabold text-3xl">Informasi</h1>

            <div class="w-full mt-10 grid grid-cols-1 md:grid-cols-2 gap-4 px-10 xl:px-40"
                @if ($informasis->isEmpty()) hidden @endif>
                @foreach ($informasis as $informasi)
                    <div class="w-full flex justify-center">
                        <x-card-info :informasi="$informasi" />
                    </div>
                @endforeach
            </div>
            @if ($informasis->isEmpty())
                <div class="mt-10">
                    <p class="text-main/66 text-center italic">Data Informasi Kosong</p>
                </div>
            @endif
        </section>

        {{-- Seksi bawah --}}
        <section class="w-full mt-10 flex flex-col items-center">
            <section class="w-full mt-10 flex flex-col items-center">
                <h1 class="text-main font-extrabold text-3xl">Berita</h1>

                <div class="w-full mt-10 grid grid-cols-1 md:grid-cols-2 gap-4 px-10 xl:px-40"
                    @if ($beritas->isEmpty()) hidden @endif>
                    @foreach ($beritas as $berita)
                        <div class="w-full flex justify-center">
                            <x-card-berita :berita="$berita" />
                        </div>
                    @endforeach
                </div>
            </section>
        </section>
    </div>
</x-layout>

<script>
    $(document).ready(function() {
        const $search = $('#search-travel');
        const $list = $('#travel-list');
        const $empty = $('#empty-message');

        function fetchTravels(query = '') {
            $.ajax({
                url: "/api/travel/search",
                data: {
                    keyword: query
                },
                beforeSend: function() {
                    $list.html('<p class="text-center text-main/60 italic">Loading...</p>');
                },
                success: function(response) {
                    if (response.count === 0) {
                        $list.attr('hidden');
                        $empty.removeAttr('hidden');
                    } else {
                        $empty.attr('hidden');
                        $list.removeAttr('hidden').html(response.html);
                    }
                },
                error: function() {
                    $empty.text('Terjadi kesalahan, coba lagi.').removeAttr('hidden');
                    $list.attr('hidden');
                }
            });
        }

        // Debounce typing — only search after 300ms pause
        let timeout = null;
        $search.on('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                const query = $(this).val().trim();
                fetchTravels(query);
            }, 300);
        });

        // Fetch initial data
        fetchTravels();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (!sessionStorage.getItem('popupShown')) {
            Swal.fire({
                title: 'Halo!',
                text: 'Kami ingin mendengar saran dan masukan Anda. Yuk isi survei singkat kami!',
                icon: 'info',
                confirmButtonText: 'Isi Survei',
                allowOutsideClick: false,
                allowEscapeKey: false,
                backdrop: true,
                confirmButtonColor: '#2596be',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.open(
                        'https://docs.google.com/forms/d/e/1FAIpQLSeOxdENaS0W5doGxvIF2rzT-DkokHaD0NAKEgfUB7RUbAx2Mw/viewform?usp=dialog',
                        '_blank');
                }
            });

            sessionStorage.setItem('popupShown', true);
        }
    });
</script>
