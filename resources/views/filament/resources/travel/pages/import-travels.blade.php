<x-filament-panels::page>
    {{-- Page content --}}
    <div class="space-y-4">
        <p>
            Silakan unggah file CSV yang berisi data travel. Pastikan baris pertama file CSV adalah header kolom
            yang sesuai dengan standar.
        </p>

        <form wire:submit.prevent="import" style="margin-top: 20px;">
            {{-- Merender form yang kita definisikan di class --}}
            {{ $this->form }}

            <div class="mt-4" style="margin-top: 20px; display:flex">
                <div style="margin-right: 20px">
                    <x-filament::button type="submit">
                        Mulai Impor
                    </x-filament::button>
                </div>

                {{-- Tombol Cancel --}}
                <x-filament::button color="gray" tag="a" href="{{ static::getResource()::getUrl('index') }}">
                    Cancel
                </x-filament::button>
            </div>
        </form>
    </div>
</x-filament-panels::page>
