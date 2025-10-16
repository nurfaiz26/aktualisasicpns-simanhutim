<x-layout>
    <div class="w-full flex flex-col items-center space-y-10">
        <section class="w-full flex flex-col items-center">
            <h1 class="text-2xl text-white font-extrabold">Cari Berita</h1>

            <div class="w-full flex flex-col lg:flex-row justify-center items-center gap-2 mt-10 max-w-2xl px-10">
                <div class="lg:flex-2 w-full">
                    <x-search-input onInput="handleSearchInput()" />
                </div>

                <div class="lg:flex-1 w-full">
                    <x-filter-select onChange="handleSearchInput()" />
                </div>
            </div>

            <div class="w-full mt-10 grid grid-cols-1 md:grid-cols-2 gap-4 px-10 xl:px-40">
                <div class="w-full flex justify-center">
                    <x-card-travel url="/travel/1" />
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel url="/travel/1" />
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel url="/travel/1" />
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel url="/travel/1" />
                </div>
            </div>
        </section>
    </div>
</x-layout>

<script>
    function handleSearchInput()
    {
        console.log('faiz');
    }
</script>
