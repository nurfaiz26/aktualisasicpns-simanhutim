<x-layout>
    <div class="w-full flex flex-col items-center space-y-10">
        <section class="mt-10 w-full flex flex-col items-center">
            <h1 class="text-2xl text-white font-extrabold">Berita Terkini</h1>

            <div class="mt-10 w-full overflow-auto py-4 pb-4 ps-10 xl:ps-40">
                <div class="flex items-center gap-8">
                    @foreach ($beritas as $index => $berita)
                        <div class="w-[480px]">
                            <x-card-berita :berita="$berita" />
                        </div>

                        @if ($index == 4)
                            <div class="w-10 h-1 bg-amber-950"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        <section class="w-full flex flex-col items-center">
            <h1 class="text-2xl text-main font-extrabold">Cari Berita</h1>

            <div class="w-full flex flex-col lg:flex-row justify-center items-center gap-2 mt-10 max-w-2xl px-10">
                <div class="lg:flex-2 w-full">
                    <x-search-input id="search-berita" />
                </div>

                <div class="lg:flex-1 w-full">
                    <x-filter-select id="filter-berita">
                        <option value="" selected>Pilih Klasifikasi</option>
                        @foreach ($klasifikasis as $klasifikasi)
                            <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->nama }}</option>
                        @endforeach
                    </x-filter-select>
                </div>
            </div>

            <div id="berita-list" class="w-full mt-10 grid grid-cols-1 md:grid-cols-2 gap-4 px-10 xl:px-40"
                @if ($beritas->isEmpty()) hidden @endif>

                {{-- @foreach ($beritas as $berita)
                    <div class="w-full flex items-center justify-center">
                        <div class="w-[480px]">
                            <x-card-berita :berita="$berita" />
                        </div>
                    </div>
                @endforeach --}}
            </div>

            {{-- <p id="empty-message" class="mt-10 text-main/66 text-center italic" hidden>Data Berita Kosong</p> --}}
        </section>
    </div>
</x-layout>

<script>
    $(document).ready(function() {
        const $search = $('#search-berita');
        const $filter = $('#filter-berita');
        const $list = $('#berita-list');
        const $empty = $('#empty-message');

        function fetchBerita(query = '', filter = '') {
            $.ajax({
                url: "/api/berita/search",
                data: {
                    keyword: query,
                    filter: filter,
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
                const filter = $filter.val().trim();
                fetchBerita(query, filter);
            }, 300);
        });

        $filter.on('change', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                const filter = $(this).val().trim();
                const query = $search.val().trim();
                fetchBerita(query, filter);
            }, 300);
        });

        // Fetch initial data
        fetchBerita();
    });
</script>
