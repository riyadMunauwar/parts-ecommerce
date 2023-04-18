<div class="rounded-md p-5 md:p-7 bg-white py-4">

    <div class="flex gap-2">
        <div class="block">
            <label for="locale" class="flex items-center">
                <x-ui.radio wire:model="locale" value="en" id="locale" name="locale" />
                <span class="ml-2 text-sm text-gray-600">{{ __('English') }}</span>
            </label>
        </div>
        <div class="block">
            <label for="locale" class="flex items-center">
                <x-ui.radio wire:model="locale" value="es" id="locale" name="locale" />
                <span class="ml-2 text-sm text-gray-600">{{ __('Spanish') }}</span>
            </label>
        </div>
    </div>

    <div class="border p-5 rounded-md mt-7">
        <h1 class="mb-4">Top Header</h1>
        <div class="space-y-4">
            <div>
                <div class="flex gap-1">
                    <x-label  for="" value="{{ __('Top Header Message Text') }}" />
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                </div>
                <x-input wire:model.debounce="top_header_message_text" id="" class="block mt-1 w-full" type="text" required />
            </div>
            <div>
                <div class="flex gap-1">
                    <x-label  for="" value="{{ __('Top Header Button Text') }}" />
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                </div>
                <x-input wire:model.debounce="top_header_button_text" id="" class="block mt-1 w-full" type="text" required />
            </div>
            <div>
                <x-label  for="" value="{{ __('Top Header Button Link') }}" />
                <x-input wire:model.debounce="top_header_button_link" id="" class="block mt-1 w-full" type="text" required />
            </div>
        </div>
    </div>


    <div class="mt-5 border p-5 rounded-md">
        <h1 class="mb-4">Middle Header</h1>
        <div class="space-y-4">
            <div>
                <div class="flex gap-1">
                    <x-label  for="" value="{{ __('Middle Header Message Text') }}" />
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                </div>
                <x-input wire:model.debounce="middle_header_message_text" id="" class="block mt-1 w-full" type="text" required />
            </div>
            <div>
                <x-label  for="" value="{{ __('Middle Header Message Text Link') }}" />
                <x-input wire:model.debounce="middle_header_message_text_link" id="" class="block mt-1 w-full" type="text" required />
            </div>
        </div>
    </div>


    <div class="mt-5 border p-5 rounded-md">
        <h1 class="mb-4">Main Header</h1>
        <div class="space-y-4">
            <div>
                <div class="flex gap-1">
                    <x-label  for="" value="{{ __('Main Header Message Text') }}" />
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                </div>
                <x-input wire:model.debounce="main_header_message_text" id="" class="block mt-1 w-full" type="text" required />
            </div>
            <div>
                <x-label  for="" value="{{ __('Main Header Message Text Link') }}" />
                <x-input wire:model.debounce="main_header_message_text_link" id="" class="block mt-1 w-full" type="text" required />
            </div>
            <div class="">
                <x-label class="block mb-1" for="parent" value="{{ __('Logo') }}" />

                @if($old_logo && !$new_logo)
                    <div class="flex items-center justify-center mb-3">
                        <img class="h-20 object-contain rounded-md block" src="{{ $old_logo ?? '' }}">
                    </div>
                @endif

                @if($new_logo)
                    <div class="">
                        <div class="flex items-center justify-center">
                            @if ($new_logo)
                                <img class="h-20 object-contain block rounded-md" src="{{ $new_logo->temporaryUrl() }}">
                            @endif
                        </div>
                        <div class="flex items-center justify-center mt-2">
                            <button wire:click.debounce="removeLogo" type="button" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest ">Remove</button>
                        </div>
                    </div>
                @else
                    <div>
                        <div class="flex items-center justify-center">
                            <label class="w-full flex flex-col items-center px-4 py-3 bg-white text-blue rounded-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-800">
                                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Select a logo</span>
                                <input wire:model="new_logo" type='file' class="hidden" />
                            </label>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="flex items-center justify-end mt-5">

        <x-button wire:click.debounce="saveSetting" type="button"  class="ml-4">
            {{ __('Save') }}
        </x-button>
    
    </div>

    <x-ui.text-loading-spinner loadingText="Uploading..." wire:loading.flex wire:target="new_logo" />
    <x-ui.loading-spinner wire:loading.flex wire:target="saveSetting, removeLogo" />
</div>