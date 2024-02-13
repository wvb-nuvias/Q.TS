@if (!isset($color))
    @php
    $color="gray";
    @endphp
@endif

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block px-6 py-3 mb-0 text-xs font-bold text-right text-white uppercase align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer opacity-50 hover:opacity-85 active:opacity-100 dark:bg-gradient-to-tl dark:from-'.$color.'-300 dark:to-'.$color.'-500 bg-gradient-to-tl from-'.$color.'-600 to-'.$color.'-800 leading-pro tracking-tight-rem bg-150 bg-x-25']) }}>
    {{ $slot }}
</button>
