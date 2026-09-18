@if ($status === 'aman')
    <span {{ $attributes->merge(['class' => 'bg-green-100 text-green-700 px-3 py-1 text-xs font-semibold rounded-full']) }}>
        Aman
    </span>
@elseif ($status === 'menipis')
    <span {{ $attributes->merge(['class' => 'bg-orange-100 text-orange-700 px-3 py-1 text-xs font-semibold rounded-full']) }}>
        Menipis
    </span>
@else
    <span {{ $attributes->merge(['class' => 'bg-red-100 text-red-700 px-3 py-1 text-xs font-semibold rounded-full']) }}>
        Habis
    </span>
@endif