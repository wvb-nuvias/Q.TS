<x-dialog-modal wire:model.live="showImportModal">
    <x-slot name="title">
        @if($mode=='phase1')
            <div class="text-md">Select import type - {{$destination}}</div>
        @elseif($mode=='phase2')
            <div class="text-md">Select or create import mapping - {{$destination}}</div>
        @elseif($mode=='phase3')
            <div class="text-md">Save, test and execute - {{$destination}}</div>
        @elseif($mode=='phase4')
            <div class="text-md">Set re-occurence? - {{$destination}}</div>
        @endif
    </x-slot>
    <x-slot name="content">
        <div class="flex-auto space-y-3 ">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full max-w-full px-3 flex-0">
                    <x-label for="SavedImports" value="{{ __(' Saved Imports') }}" />
                    <x-input id="SavedImports" type="text" class="block w-full mt-1" wire:model="" autocomplete="" />
                    <x-input-error for="SavedImports" class="mt-2" />
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-6/12 max-w-full px-3 flex-0">
                    @livewire('components.box.box', ['user' => $user,'items' => $sources])
                </div>
                <div class="w-6/12 max-w-full px-3 flex-0">
                    <x-label for="Destinations" value="{{ __(' Destinations') }}" />
                    <div id="Destinations" class="h-60 border rounded-md bg-white dark:opacity-40">

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="flex space-x-3">
        @if($mode=='phase1')
        <x-theme.button wire="switchmode('phase2')">Next</x-theme.button>
        <x-theme.button wire="cancelImportModal()">Cancel</x-theme.button>
        @elseif($mode=='phase2')
        <x-theme.button wire="switchmode('phase1')">Previous</x-theme.button>
        <x-theme.button wire="switchmode('phase3')">Next</x-theme.button>
        <x-theme.button wire="cancelImportModal()">Cancel</x-theme.button>
        @elseif($mode=='phase3')
        <x-theme.button wire="switchmode('phase2')">Previous</x-theme.button>
        <x-theme.button wire="switchmode('phase4')">Next</x-theme.button>
        <x-theme.button wire="test()">Test</x-theme.button>
        <x-theme.button wire="save()">Save</x-theme.button>
        <x-theme.button wire="cancelImportModal()">Cancel</x-theme.button>

        @elseif($mode=='phase4')
        <x-theme.button wire="switchmode('phase3')">Previous</x-theme.button>
        <x-theme.button wire="save()">Save</x-theme.button>
        <x-theme.button wire="cancelImportModal()">Cancel</x-theme.button>
        @endif
        </div>
    </x-slot>
</x-dialog-modal>
