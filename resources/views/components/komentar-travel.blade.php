<div class="w-full flex flex-col gap-2 items-start">
    <div class="flex flex-col md:flex-row w-full justify-between">
        <p class="font-bold text-main">{{ $komentar->author_name }}</p>
        <div class="flex gap-2 items-center">
            <p class="text-main">{{ Carbon\Carbon::parse($komentar->created_at)->format('d/m/Y') }}</p>

            <div class="flex gap-1 items-center text-main">
                <svg class="w-6 h-6 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                </svg>

                <p>{{ $komentar->rating }}</p>
            </div>

        </div>
    </div>
    <p class="text-main line-clamp-3"><p>{!! nl2br(e($komentar->text)) !!}</p>
</div>
