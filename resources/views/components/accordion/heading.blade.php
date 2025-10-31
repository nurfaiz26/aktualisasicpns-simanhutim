<h2 id="{{ $accordionHeadingId }}">
    <button type="button"
        class="flex items-center justify-between w-full p-5 font-medium text-gray-500 gap-3"
        data-accordion-target="#{{ $accordionBodyId }}" aria-expanded="{{ $isOpen }}"
        aria-controls="{{ $accordionBodyId }}">
        <span class="w-full flex items-center gap-2 justify-center">
            <p class="text-main font-bold">{{ $judul }}</p>
            <div class="w-full border border-dashed border-main"></div>
        </span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0 text-main" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5 5 1 1 5" />
        </svg>
    </button>
</h2>
