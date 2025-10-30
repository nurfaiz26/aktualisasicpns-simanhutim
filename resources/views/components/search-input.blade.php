<div class="w-full">
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-main" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>

        <input type="search" id="{{ $id ?? '' }}" 
        class="block w-full p-4 ps-10 text-sm text-main font-bold placeholder-main/50 border-2 border-main rounded-full bg-gray-50 focus:ring-main focus:border-main"
            placeholder="Masukkan Kata Kunci..." required />
    </div>
</div>
