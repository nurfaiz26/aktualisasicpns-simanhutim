<!-- Main modal -->
<div id="{{ $modalId }}" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm border-2 border-red-400">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-extrabold text-red-400">
                    Lapor Travel
                </h3>
                <button type="button"
                    class="end-2.5 text-red-400 bg-transparent hover:bg-red-400 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="{{ $modalId }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4" action="#">
                    <div>
                        <label for="bukti" class="block mb-2 text-sm font-medium text-red-400">Keterangan
                            Laporan</label>

                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-red-500 bg-gray-50 rounded-lg border border-red-500 focus:ring-red-500 focus:border-red-50 placeholder:text-red-400"
                            placeholder="Masukkan keterangan laporan"></textarea>
                    </div>
                    <div>
                        <label for="bukti" class="block mb-2 text-sm font-medium text-red-400">Bukti Laporan</label>
                        <input type="text" name="bukti" id="bukti" placeholder="Link Bukti Laporan"
                            class="bg-gray-50 border border-red-500 text-red-400 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 placeholder:text-red-400"
                            required />
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Kirim
                        Laporan</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
