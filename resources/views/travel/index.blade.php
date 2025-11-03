<x-layout>
    <div class="w-full flex flex-col items-center space-y-10">
        <section class="w-full flex flex-col items-center">
            <h1 class="text-2xl text-white font-extrabold">Cari Travel</h1>

            <div class="w-full flex flex-col lg:flex-row justify-center items-center gap-2 mt-10 max-w-2xl px-10">
                <div class="lg:flex-2 w-full">
                    <x-search-input id="search-travel" />
                </div>

                <div class="lg:flex-1 w-full">
                    <x-filter-select id="filter-travel">
                        <option selected>Pilih Klasifikasi</option>
                        @foreach ($klasifikasis as $klasifikasi)
                            <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->nama }}</option>
                        @endforeach
                    </x-filter-select>
                </div>
            </div>

            <div id="travel-list" class="w-full mt-10 grid grid-cols-1 md:grid-cols-2 gap-4 px-10 xl:px-40">
                {{-- <div class="w-full flex justify-center">
                    <x-card-travel url="/travel/1" />
                </div> --}}
            </div>

            {{-- <p id="empty-message" class="mt-10 text-main/66 text-center italic" hidden>Data Travel Kosong</p> --}}
        </section>
    </div>
</x-layout>

<script>
    $(document).ready(function() {
        const $search = $('#search-travel');
        const $filter = $('#filter-travel');
        const $list = $('#travel-list');
        const $empty = $('#empty-message');

        function fetchTravel(query = '', filter = '') {
            $.ajax({
                url: "/api/travel/search",
                data: {
                    keyword: query,
                    filter: filter,
                },
                beforeSend: function() {
                    $list.html('<p class="text-center text-main/60 italic">Loading...</p>');
                },
                success: function(response) {
                    console.log(response);
                    
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
                fetchTravel(query, filter);
            }, 300);
        });

        $filter.on('change', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                const filter = $(this).val().trim();
                const query = $search.val().trim();
                fetchTravel(query, filter);
            }, 300);
        });

        // Fetch initial data
        fetchTravel();
    });
</script>
