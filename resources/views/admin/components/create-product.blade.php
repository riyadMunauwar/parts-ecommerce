<div class="">
    <div class="grid grid-cols-1 md:grid-cols-6 md:gap-5">
        <div class="col-span-4">
            <div class="bg-white p-5 md:p-10">
                <h1 class="font-bold text-xl mb-4">Add Product</h1>
                <x-validation-errors class="mb-4" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="col-span-2">
                        <x-label  for="name" value="{{ __('Name') }}" />
                        <x-input wire:model.debounce="name" id="name" class="block mt-1 w-full" type="text" required />
                    </div>

                    <div class="col-span-2 mt-2 md:mt-0">
                        <x-label for="slug" value="{{ __('Slug') }}" />
                        <x-input wire:model.debounce="slug" id="slug" class="block mt-1 w-full" type="text" required />
                    </div>

                    <div class="mt-2">
                        <x-label for="salePrice" value="{{ __('Sale Price') }}" />
                        <x-input wire:model.debounce="salePrice" id="salePrice" class="block mt-1 w-full" type="number"/>
                    </div>

                    <div class="mt-2">
                        <x-label for="regularPrice" value="{{ __('Regular Price') }}" />
                        <x-input wire:model.debounce="regularPrice" id="regularPrice" class="block mt-1 w-full" type="number"/>
                    </div>

                    
                    <div class="mt-2">
                        <x-label for="slug" value="{{ __('Sku') }}" />
                        <x-input wire:model.debounce="sku" id="slug" class="block mt-1 w-full" type="text" required />
                    </div>

                    <div class="mt-2">
                        <x-label for="vat" value="{{ __('Vat') }}" />
                        <x-ui.select wire:model.debounce="vatId" id="vat" class="block mt-1 w-full">

                        </x-ui.select>
                    </div>

                    <div class="col-span-2 grid grid-cols-3 gap-5 mt-2">
                        <div>
                            <x-label  for="height" value="{{ __('Height') }}" />
                            <x-input wire:model.debounce="height" id="height" class="block mt-1 w-full" type="text" required />
                        </div>
                        <div>
                            <x-label  for="wdith" value="{{ __('Width') }}" />
                            <x-input wire:model.debounce="wdith" id="wdith" class="block mt-1 w-full" type="text" required />
                        </div>
                        <div>
                            <x-label  for="length" value="{{ __('Legth') }}" />
                            <x-input wire:model.debounce="length" id="length" class="block mt-1 w-full" type="text" required />
                        </div>
                    </div>

                    <div class="col-span-2 grid grid-cols-3 gap-5 mt-2">
                        <div>
                            <x-label  for="color" value="{{ __('Color') }}" />
                            <x-input wire:model.debounce="color" id="color" class="block mt-1 w-full" type="text" required />
                        </div>

                        <div>
                            <x-label  for="colorCode" value="{{ __('Color Code') }}" />
                            <x-input wire:model.debounce="colorCode" id="colorCode" class="block mt-1 w-full" type="text" required />
                        </div>

                        <div>
                            <x-label  for="color" value="{{ __('Weight') }}" />
                            <x-input wire:model.debounce="color" id="color" class="block mt-1 w-full" type="text" required />
                        </div>
                    </div>

                    <div class="col-span-2 mt-2">
                        <x-label  for="compatibility" value="{{ __('Compatibility') }}" />
                        <textarea id="editor"></textarea>
                    </div>

                    <div class="col-span-2 mt-2">
                        <x-label  for="features" value="{{ __('Features') }}" />
                        <textarea id="editor"></textarea>
                    </div>

                    <div class="col-span-2 mt-2">
                        <x-label  for="description" value="{{ __('Description') }}" />
                        <textarea id="editor"></textarea>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-span-2">
            <div class="bg-white p-5 md:p-10 grid grid-cols-1 gap-5">
                <div class="space-y-2">
                    <div class="block">
                        <label for="isPublished" class="flex items-center">
                            <x-checkbox wire:model.debounce="isPublished" id="isPublished" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Published') }}</span>
                        </label>
                    </div>
                    <div class="block">
                        <label for="premium" class="flex items-center">
                            <x-checkbox wire:model.debounce="isPremium" id="premium" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Premium') }}</span>
                        </label>
                    </div>
                    <div class="block">
                        <label for="featured" class="flex items-center">
                            <x-checkbox wire:model.debounce="isFeatured" id="featured" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Featured') }}</span>
                        </label>
                    </div>
                </div>

                <div class="mt-2">
                    <x-label for="gallery" value="{{ __('Category') }}" />
                    <div class="mt-2">
                        <div class="block">
                            <label for="featured" class="flex items-center">
                                <x-checkbox wire:model.debounce="categoriesId" multiple name="categories[]" id="featured" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Category') }}</span>
                            </label>
                        </div>
                        <div class="block">
                            <label for="featured" class="flex items-center">
                                <x-checkbox wire:model.debounce="categoriesId" multiple name="categories[]" id="featured" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Category') }}</span>
                            </label>
                        </div>
                        <div class="block">
                            <label for="featured" class="flex items-center">
                                <x-checkbox wire:model.debounce="categoriesId" multiple name="categories[]" id="featured" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Category') }}</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-2">
                        <x-label for="gallery" value="{{ __('Thumbnail') }}" />
                        @if($thumbnail)
                        <div class="mt-3">
                            <div class="flex items-center justify-center">
                                @if ($thumbnail)
                                    <img class="w-full block" src="{{ $thumbnail->temporaryUrl() }}">
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
                                    <input wire:model="thumbnail" type='file' class="hidden" />
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="mt-2">
                        <x-label for="gallery" value="{{ __('Gallery') }}" />
                        @if($gallery)
                        <div class="mt-3">
                            <div class="grid grid-cols-4 gap-5">
                                @if ($gallery)
                                    @foreach($gallery as $image)
                                        <img class="block w-20 h-20 rounded-md object-cover" src="{{ $image->temporaryUrl() }}">
                                    @endforeach
                                @endif
                            </div>
                            <div class="flex items-center justify-center mt-3">
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
                                    <input wire:model="gallery" type='file' class="hidden" multiple />
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-end">
                        <x-button class="ml-4">
                            {{ __('Create') }}
                        </x-button>
                    </div>
                </div>
            </div>
    </div>
    <x-ui.loading-spinner wire:loading.flex />
</div>


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>

    <script>
        $(function() {
            'use strict';

            //Tinymce editor
            if ($("#editor").length) {
                tinymce.init({
                selector: '#editor',
                min_height: 350,
                default_text_color: 'red',
                plugins: [
                    'advlist', 'autoresize', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'pagebreak',
                    'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
                image_advtab: true,
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                    },
                    {
                    title: 'Test template 2',
                    content: 'Test 2'
                    }
                ],
                content_css: []
                });
            }

            });
    </script>
@endpush
