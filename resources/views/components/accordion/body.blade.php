<div id="{{ $accordionBodyId }}" class="hidden" aria-labelledby="{{ $accordionHeadingId }}">
    <div class="w-full mt-10 grid grid-cols-1 md:grid-cols-2 gap-4">
        {{ $slot }}
    </div>
</div>