@include('components.modal-lapor-travel', ['modalId' => 'modal-lapor'])

<x-layout>
    <div class="w-full flex flex-col items-center px-10 lg:px-40">
        <section class="mt-10 w-full grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="w-full flex justify-center lg:justify-end">
                <div class="bg-gray-400 aspect-[4/3] w-full h-auto max-w-md"></div>
            </div>

            <div class="w-full flex flex-col items-center lg:items-start gap-2 lg:text-white">
                <h1 class="text-2xl font-extrabold text-main">Nama Travel</h1>
                <div class="flex gap-1 text-main">
                    <p>Klasifikasi:</p>
                    <p>PPIU</p>
                    <p>PIHK</p>
                </div>
                <div class="flex gap-1 items-center text-main">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>Kota Surabaya</p>
                </div>
                <div class="flex gap-1 items-center text-main">
                    <svg class="w-6 h-6 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                    </svg>

                    <p>4,6</p>
                </div>

                <button data-modal-target="modal-lapor" data-modal-toggle="modal-lapor">
                    <svg class="w-6 h-6 text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v5a1 1 0 1 0 2 0V8Zm-1 7a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </section>

        <section class="mt-10 w-full">
            <div class="w-full mt-10 grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">No Telepon</p>
                            <p class="text-main">081122334455</p>
                        </div>
                    </x-card-travel-info>
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">Direktur</p>
                            <p class="text-main">Nama Direktur</p>
                        </div>
                    </x-card-travel-info>
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">Email</p>
                            <p class="text-main">email@email.com</p>
                        </div>
                    </x-card-travel-info>
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">Status</p>
                            <p class="text-main">AKTIF</p>
                        </div>
                    </x-card-travel-info>
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">No SK</p>
                            <p class="text-main">NOMOR 123 TAHUN 1999</p>
                        </div>
                    </x-card-travel-info>
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">Tgl SK</p>
                            <p class="text-main">31 Desember 1999</p>
                        </div>
                    </x-card-travel-info>
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">No SK</p>
                            <p class="text-main">NOMOR 123 TAHUN 1999</p>
                        </div>
                    </x-card-travel-info>
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">Tgl SK</p>
                            <p class="text-main">31 Desember 1999</p>
                        </div>
                    </x-card-travel-info>
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">Nilai Akreditasi</p>
                            <p class="text-main">B</p>
                        </div>
                    </x-card-travel-info>
                </div>
                <div class="w-full flex justify-center">
                    <x-card-travel-info>
                        <div class="w-full flex gap-2 items-center">
                            <p class="font-bold text-main">Tgl Akreditasi</p>
                            <p class="text-main">31/12/1999 s/d 31/12/2019</p>
                        </div>
                    </x-card-travel-info>
                </div>
            </div>

            <div class="mt-10 w-full flex justify-center">
                <x-card-travel-info>
                    <div class="w-full flex gap-2 items-center">
                        <p class="font-bold text-main">Alamat</p>
                        <p class="text-main line-clamp-3">Jl. Nama Jalan Travel, Nama Kelurahan, Nama Kecamatan, Nama
                            Kota, Nama Provinsi, Kode Pos</p>
                    </div>
                </x-card-travel-info>
            </div>
        </section>

        <section class="mt-10 w-full flex flex-col justify-start">
            <div class="w-full flex gap-2">
                <h1 class="font-extrabold text-main text-2xl">Komentar Google</h1>

                <div class="border border-main h-1"></div>
            </div>

            <div class="mt-10 w-full flex justify-center">
                <x-card-travel-info>
                    <div class="w-full flex flex-col gap-2 items-start">
                        <div class="flex flex-col md:flex-row w-full justify-between">
                            <p class="font-bold text-main">Nama Komentator</p>
                            <div class="flex gap-2 items-center">
                                <div class="flex gap-1 items-center text-main">
                                    <svg class="w-6 h-6 text-yellow-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                    </svg>

                                    <p>4,6</p>
                                </div>

                                <p class="text-main">7/10/2025</p>
                            </div>
                        </div>
                        <p class="text-main line-clamp-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia officiis dicta sint atque saepe excepturi necessitatibus praesentium nulla aspernatur fugiat.</p>
                    </div>
                </x-card-travel-info>
            </div>
        </section>
    </div>
</x-layout>
