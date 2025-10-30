@foreach ($beritas as $berita)
    <div class="w-full flex items-center justify-center">
        <x-card-berita :berita="$berita" />
    </div>
@endforeach
