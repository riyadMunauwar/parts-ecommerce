<div class="p-5 md:p-10">
    <x-validation-errors class="mb-4" />

    <form wire:submit.prevent="submitHandeler" class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div>
            <x-label  for="name" value="{{ __('Name') }}" />
            <x-input wire:model.debounce="name" id="name" class="block mt-1 w-full" type="text" required />
        </div>

        <div>
            <x-label for="slug" value="{{ __('Slug') }}" />
            <x-input wire:model.debounce="slug" id="slug" class="block mt-1 w-full" type="text" required />
        </div>

        <div class="">
            <x-label for="order" value="{{ __('Order') }}" />
            <x-input wire:model.debounce="order" id="order" class="block mt-1 w-full" type="number"/>
        </div>

        <div class="">
            <x-label for="parent" value="{{ __('Parent Category') }}" />
            <x-ui.select wire:model.debounce="parentCategoryId" id="parent" class="block mt-1 w-full">

            </x-ui.select>
        </div>

        <div class="col-span-2">
            <x-label for="parent" value="{{ __('Icon') }}" />
            @if($icon)
            <div>
                <div class="flex items-center justify-center">
                    @if ($icon)
                        <img class="w-1/2 block" src="{{ $icon->temporaryUrl() }}">
                    @endif
                </div>
                <div class="flex items-center justify-center mt-2">
                    <button class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest ">Remove</button>
                </div>
            </div>
            @else
            <div>
                <div class="flex items-center justify-center">
                    <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-800">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input wire:model="icon" type='file' class="hidden" />
                    </label>
                </div>
            </div>
            @endif
        </div>

        <div class="col-span-2">
            <x-label for="desc" value="{{ __('Description') }}" />
            <x-ui.textarea wire:model.debounce="description" id="desc" class="block mt-1 w-full">

            </x-ui.textarea>
        </div>

        <div class="block">
            <label for="isPublished" class="flex items-center">
                <x-checkbox wire:model.debounce="isPublished" id="isPublished" name="remember" />
                <span class="ml-2 text-sm text-gray-600">{{ __('Published') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end">
            <x-button class="ml-4">
                {{ __('Create') }}
            </x-button>
        </div>
    </form>
</div>