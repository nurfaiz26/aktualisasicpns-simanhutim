@foreach ($informasis as $informasi)
    <div class="w-full flex items-center justify-center">
        <x-card-info :informasi="$informasi" />
    </div>
@endforeach
