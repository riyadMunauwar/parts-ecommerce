<section class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 md:gap-5">
    <div class="col-span-2">
        <div class="bg-white p-5 md:p-7 md:rounded-md">
            <h1 class="mb-5">General Setting</h1>

            <div class="flex justify-between items-center">
                <div class="flex gap-2 mb-5">
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

                <div>
                    @if($shippo_pickup_address_object_id)
                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Pickup Address Validated</span>
                    @else 
                        <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Pickup Address Not Validated</span>
                    @endif
                </div>
            </div>


            <x-validation-errors class="mb-4" />
            
            <div class="space-y-3">

                <div>
                    <x-label  for="company_name" value="{{ __('Company Name') }}" />
                    <x-input wire:model.debounce="company_name" id="company_name" class="block mt-1 w-full" type="text" />
                </div>

                <div>
                    <x-label  for="company_owner_name" value="{{ __('Company Owner Name') }}" />
                    <x-input wire:model.debounce="company_owner_name" id="company_owner_name" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="street_no" value="{{ __('Street No') }}" />
                    <x-input wire:model.debounce="street_no" id="street_no" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="street_1" value="{{ __('Street 1') }}" />
                    <x-input wire:model.debounce="street_1" id="street_1" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="street_2" value="{{ __('Street 2') }}" />
                    <x-input wire:model.debounce="street_2" id="street_2" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="street_3" value="{{ __('Street 3') }}" />
                    <x-input wire:model.debounce="street_3" id="street_3" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="city" value="{{ __('City') }}" />
                    <x-input wire:model.debounce="city" id="city" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="state" value="{{ __('State') }}" />
                    <x-input wire:model.debounce="state" id="state" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="zip" value="{{ __('Zip') }}" />
                    <x-input wire:model.debounce="zip" id="zip" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="country" value="{{ __('Country') }}" />
                    <x-input wire:model.debounce="country" id="country" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <x-label  for="email" value="{{ __('Email') }}" />
                    <x-input wire:model.debounce="email" id="email" class="block mt-1 w-full" type="email"  />
                </div>

                <div>
                    <x-label  for="phone" value="{{ __('Phone') }}" />
                    <x-input wire:model.debounce="phone" id="phone" class="block mt-1 w-full" type="text"  />
                </div>

                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Meta Title') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="meta_title" id="name" class="block mt-1 w-full" type="text"  />
                </div>

                <div class="">
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Meta Tags') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-ui.textarea wire:model.debounce="meta_tags" id="tags" class="block mt-1 w-full">

                    </x-ui.textarea>
                </div>


               <div class="">
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Meta Description') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
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

    <x-ui.loading-spinner wire:loading.flex wire:target="saveSetting" />
</section>
