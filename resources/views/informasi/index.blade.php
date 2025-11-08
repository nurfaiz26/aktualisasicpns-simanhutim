<x-layout>
    <div class="w-full flex flex-col items-center space-y-10 px-10 lg:px-40">
        <section class="w-full flex flex-col items-center">
            <h1 class="text-2xl text-white font-extrabold">Cari Informasi</h1>

            <div class="w-full flex flex-col lg:flex-row justify-center items-center gap-2 mt-10 max-w-2xl px-10">
                <div class="lg:flex-2 w-full">
                    <x-search-input id="search-informasi" />
                </div>
            </div>

            <div id="informasi-accordion" class="mt-10 w-full">
                <x-accordion.layout>
                    @foreach ($mKlasifikasis as $index => $mKlasifikasi)
                        @if (!$mKlasifikasi->informasi->isEmpty())
                            <x-accordion.heading judul="{{ $mKlasifikasi['master_klasifikasi'] }}"
                                accordionHeadingId="accordion-heading-{{ $index }}"
                                accordionBodyId="accordion-body-{{ $index }}"
                                isOpen="{{ $index == 0 ? 'true' : 'false' }}" />
                            <x-accordion.body accordionHeadingId="accordion-heading-{{ $index }}"
                                accordionBodyId="accordion-body-{{ $index }}">
                                @foreach ($mKlasifikasi['klasifikasis'] as $klasifikasi)
                                    <div class="w-full flex justify-center">
                                        @if ($klasifikasi->informasi)
                                            <x-card-info :informasi="$klasifikasi->informasi" />
                                        @endif
                                    </div>
                                @endforeach
                            </x-accordion.body>
                        @endif
                    @endforeach
                </x-accordion.layout>
            </div>

            <div id="informasi-list" class="w-full mt-10 grid grid-cols-1 md:grid-cols-2 gap-4" hidden>
                {{-- @foreach ($informasis as $informasi)
                    <div class="w-full flex justify-center">
                        <x-card-info :informasi="$informasi" />
                    </div>
                @endforeach --}}
            </div>
            {{-- @if ($informasis->isEmpty()) --}}
            {{-- <div id="empty-message" class="mt-10" hidden>
                    <p class="text-main/66 text-center italic">Data Informasi Kosong</p>
                </div> --}}
            {{-- @endif --}}
        </section>
    </div>
</x-layout>

<script>
    $(document).ready(function() {
        const $search = $('#search-informasi');
        const $list = $('#informasi-list');
        const $accordion = $('#informasi-accordion');
        const $empty = $('#empty-message');

        function fetchInformasi(query = '') {
            $.ajax({
                url: "/api/informasi/search",
                data: {
                    keyword: query,
                },
                beforeSend: function() {
                    $list.html('<p class="text-center text-main/60 italic">Loading...</p>');
                },
                success: function(response) {
                    if (response.count == 0) {
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
                if (query == '') {
                    $accordion.removeClass('hidden');
                    $list.addClass('hidden');
                    $empty.addClass('hidden');
                } else {
                    $accordion.addClass('hidden');
                    $list.removeClass('hidden');
                    $empty.removeClass('hidden');
                    fetchInformasi(query);
                }
            }, 300);
        });

        // Fetch initial data
        // fetchInformasi();
    });
</script>
