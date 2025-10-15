<x-layout>
    <div class="w-full flex flex-col items-center space-y-10 px-10 lg:px-40">
        <section class="w-full flex flex-col items-center">
            <h1 class="text-2xl text-white font-extrabold">Cari Informasi</h1>

            <div class="w-full flex flex-col lg:flex-row justify-center items-center gap-2 mt-10 max-w-2xl px-10">
                <div class="lg:flex-2 w-full">
                    <x-search-input onInput="handleSearchInput()" />
                </div>
            </div>

            <div class="mt-10 w-full">
                <x-accordion.layout>
                    <x-accordion.heading accordionHeadingId="accordion-heading-1" accordionBodyId="accordion-body-1" isOpen="true" />
                    <x-accordion.body accordionHeadingId="accordion-heading-1" accordionBodyId="accordion-body-1">
                        <div class="w-full flex justify-center">
                            <x-card-info url="/informasi/1" />
                        </div>
                        
                        <div class="w-full flex justify-center">
                            <x-card-info url="/informasi/1" />
                        </div>

                        <div class="w-full flex justify-center">
                            <x-card-info url="/informasi/1" />
                        </div>
                        
                        <div class="w-full flex justify-center">
                            <x-card-info url="/informasi/1" />
                        </div>
                    </x-accordion.body>
                    <x-accordion.heading accordionHeadingId="accordion-heading-2" accordionBodyId="accordion-body-2" isOpen="false" />
                    <x-accordion.body accordionHeadingId="accordion-heading-2" accordionBodyId="accordion-body-2">
                        <div class="w-full flex justify-center">
                            <x-card-info url="/informasi/1" />
                        </div>
                        
                        <div class="w-full flex justify-center">
                            <x-card-info url="/informasi/1" />
                        </div>

                        <div class="w-full flex justify-center">
                            <x-card-info url="/informasi/1" />
                        </div>
                        
                        <div class="w-full flex justify-center">
                            <x-card-info url="/informasi/1" />
                        </div>
                    </x-accordion.body>
                </x-accordion.layout>
            </div>
        </section>
    </div>
</x-layout>

<script>
    function handleSearchInput() {
        console.log('faiz');
    }
</script>
