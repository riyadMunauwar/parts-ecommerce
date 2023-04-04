<section class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 md:gap-5">
    <div class="col-span-2">
        <div class="bg-white p-5 md:p-7 md:rounded-md">
            <h1 class="mb-5">General Setting</h1>
            <x-validation-errors class="mb-4" />
            <div class="space-y-3">

                <div>
                    <x-label  for="name" value="{{ __('Website Name') }}" />
                    <x-input wire:model.debounce="website_name" id="name" class="block mt-1 w-full" type="text" />
                </div>

                <div>
                    <x-label  for="email" value="{{ __('Website Email') }}" />
                    <x-input wire:model.debounce="website_email" id="name" class="block mt-1 w-full" type="email"  />
                </div>

                <div>
                    <x-label  for="phone" value="{{ __('Website Conact Phone') }}" />
                    <x-input wire:model.debounce="website_phone" id="phone" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="name" value="{{ __('Meta Title') }}" />
                    <x-input wire:model.debounce="meta_title" id="name" class="block mt-1 w-full" type="text"  />
                </div>

                <div class="">
                    <x-label for="tags" value="{{ __('Meta Tags') }}" />
                    <x-ui.textarea wire:model.debounce="meta_tags" id="tags" class="block mt-1 w-full">

                    </x-ui.textarea>
                </div>


               <div class="">
                    <x-label for="desc" value="{{ __('Meta Description') }}" />
                    <x-ui.textarea wire:model.debounce="meta_description" id="desc" class="block mt-1 w-full">

                    </x-ui.textarea>
                </div>


                <div class="">
                <x-label class="block mb-1" for="parent" value="{{ __('Favicon') }}" />

                @if($old_favicon && !$new_favicon)
                    <div class="flex items-center justify-center mb-3">
                        <img class="h-14 object-contain rounded-md block" src="{{ $old_favicon ?? '' }}">
                    </div>
                @endif

                @if($new_favicon)
                    <div class="">
                        <div class="flex items-center justify-center">
                            @if ($new_favicon)
                                <img class="h-20 object-contain block rounded-md" src="{{ $new_favicon->temporaryUrl() }}">
                            @endif
                        </div>
                        <div class="flex items-center justify-center mt-2">
                            <button wire:click.debounce="removeFavicon" type="button" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest ">Remove</button>
                        </div>
                    </div>
                @else
                    <div>
                        <div class="flex items-center justify-center">
                            <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-800">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Select a Favicon</span>
                                <input wire:model="new_favicon" type='file' class="hidden" />
                            </label>
                        </div>
                    </div>
                @endif
            </div>

                <div class="flex items-center justify-end">
                    <x-button wire:click.debounce="saveSetting" type="button"  class="ml-4">
                        {{ __('Save') }}
                    </x-button>
                </div>

            </div>
        </div>
    </div>
    <div class="col-span-1">
        <div class="bg-white p-5 md:p-7 md:rounded-md">
            <h1 class="mb-5">Turn Off/On Features</h1>

            
        </div>
    </div>

    <x-ui.loading-spinner wire:loading.flex wire:target="confirmDeleteDiscount, enableDiscountEditMode, createDiscount, updateDiscount, cancelDiscountEditMode" />
</section>
