<div>
    @if($isEditModeOn)
    <x-ui.edit-modal class="max-w-xl">
        <div class="p-5 md:p-10 bg-white rounded-md">
            <x-validation-errors class="mb-4" />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <x-label  for="name" value="{{ __('Name') }}" />
                    <x-input wire:model.debounce="name" id="name" class="block mt-1 w-full" type="text" required />
                </div>

                <div>
                    <x-label for="slug" value="{{ __('Slug') }}" />
                    <x-input wire:model.debounce="slug" id="slug" class="block mt-1 w-full" type="text" required />
                </div>

                <div class="">
                    <x-label for="order" value="{{ __('Rank') }}" />
                    <x-input wire:model.debounce="order" id="order" class="block mt-1 w-full" type="number"/>
                </div>

                <div class="">
                    <x-label for="parent" value="{{ __('Parent Category') }}" />
                    <x-ui.select wire:model.debounce="parentCategoryId" id="parent" class="block mt-1 w-full">
                        <option value="">None</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-ui.select>
                </div>

                <div class="col-span-2">
                    <x-label for="parent" value="{{ __('Icon') }}" />

                    @if (!$newIcon && $oldIcon)
                        <div class="flex items-center justify-center">
                            <img class="w-20 h-20 object-contain block" src="{{ $oldIcon ?? '' }}">
                        </div>
                    @endif

                    @if($newIcon)
                    <div>
                        <div class="flex items-center justify-center">
                            @if ($newIcon)
                                <img class="w-20 h-20 object-contain block" src="{{ $newIcon->temporaryUrl() }}">
                            @endif
                        </div>
                        <div class="flex items-center justify-center mt-2">
                            <button wire:click.debounce="removeIcon" type="button" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest ">Remove</button>
                        </div>
                    </div>
                    @else
                    <div>
                        <div class="flex items-center justify-center">
                            <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-gray-800">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal">Change Icon</span>
                                <input wire:model="newIcon" type='file' class="hidden" />
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

                <div class="col-span-2">
                    <x-label  for="metaTitle" value="{{ __('Meta Title') }}" />
                    <x-input wire:model.debounce="metaTitle" id="metaTitle" class="block mt-1 w-full" type="text" />
                </div>


                <div class="col-span-2">
                    <x-label  for="metaTags" value="{{ __('Meta Tags') }}" />
                    <x-input wire:model.debounce="metaTags" id="metaTags" class="block mt-1 w-full" type="text" />
                </div>


                <div class="col-span-2">
                    <x-label  for="metaDesc" value="{{ __('Meta Description') }}" />
                    <x-ui.textarea wire:model.debounce="metaDescription" id="metaDesc" class="block mt-1 w-full" type="text" />
                </div>


                <div class="block">
                    <label for="isPublished" class="flex items-center">
                        <x-checkbox wire:model.debounce="isPublished" id="isPublished" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Published') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end">
                    <x-button wire:click.debounce="updateCategory" type="button" class="ml-4">
                        {{ __('Update') }}
                    </x-button>
                    <x-button wire:click.debounce="cancelEditMode" type="button" class="ml-4">
                        {{ __('Cancel') }}
                    </x-button>
                </div>
            </div>
            <x-ui.text-loading-spinner wire:loading.flex wire:target="updateCategory, cancelEditMode" />
            <x-ui.text-loading-spinner loadingText="Uploading..." wire:loading.flex wire:target="newIcon" />
        </div>
    </x-ui.edit-modal>
    @endif
</div>
