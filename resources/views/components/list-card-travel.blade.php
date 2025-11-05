@foreach ($listTravels as $travel)
    <div class="w-full flex justify-center">
        <x-card-travel :travel="$travel" />
    </div>
@endforeach

{{-- @if ($keyword != null || $filter != null)
    {{ $listTravels->links() }}
@endif --}}
