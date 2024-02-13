@props(['value'])

<label {{ $attributes->merge(['class' => 'block mt-6 mb-2 ml-1 text-xs font-bold text-slate-700 dark:text-white/80']) }}>
    {{ $value ?? $slot }}
</label>
