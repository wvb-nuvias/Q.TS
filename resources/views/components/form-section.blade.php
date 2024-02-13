@props(['submit'])

<form wire:submit="{{ $submit }}">
    <div class="flex-auto pt-4">
        <div class="flex flex-wrap -mx-3">
            <div class="w-6/12 max-w-full px-3 flex-0">

            </div>
            <div class="w-6/12 max-w-full px-3 flex-0">
            {{ $form }}
            </div>
        </div>
    </div>

    @if (isset($actions))
    <div class="flex flex-wrap justify-end pt-3">
        {{ $actions }}
    </div>
    @endif
</form>
