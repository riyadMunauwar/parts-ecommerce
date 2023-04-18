<div class="p-5 md:p-7 md:rounded-md bg-white">
    <x-validation-errors class="mb-4" />

    <form class="grid grid-cols-1 gap-5">

        <div>
            <x-label  for="name" value="{{ __('Name') }}" />
            <x-input wire:model.debounce="name" id="name" class="block mt-1 w-full" type="text" required />
        </div>

        <div>
            <x-label for="slug" value="{{ __('Slug') }}" />
            <x-input wire:model.debounce="slug" id="slug" class="block mt-1 w-full" type="text" required />
        </div>

        <div>
            <x-label for="order" value="{{ __('Rank') }}" />
            <x-input wire:model.debounce="order" id="order" class="block mt-1 w-full" type="number"/>
        </div>

        <div>
            <x-label for="gallery" value="{{ __('Parent Category') }}" />
            <div class="mt-2 p-4 rounded-md bg-gray-50 overflow-x-auto">
                @foreach($categories as $category)
                    @if($category->hasChildren())
                        <div class="block">
                            <label for="categories" class="flex items-center">
                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $category->id }}" id="categories" />
                                <span class="ml-2 text-sm text-gray-600"> {{ $category->name ?? '' }} </span>
                            </label>
                            <div class="ml-2 border-l pl-2">
                                @foreach($category->children as $child)
                                    @if($child->hasChildren())
                                        <div class="block">
                                            <label for="categories" class="flex items-center">
                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $child->id }}" id="categories" />
                                                <span class="ml-2 text-sm text-gray-600"> {{ $child->name ?? '' }} </span>
                                            </label>
                                            <div class="ml-2 border-l pl-2">
                                                @foreach($child->children as $grandChild)
                                                    @if($grandChild->hasChildren())
                                                        <div class="block">
                                                            <label for="categories" class="flex items-center">
                                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $grandChild->id }}" id="categories" />
                                                                <span class="ml-2 text-sm text-gray-600"> {{ $grandChild->name ?? '' }} </span>
                                                            </label>
                                                            <div class="ml-2 border-l pl-2">
                                                                @foreach($grandChild->children as $grandGrandChild)
                                                                    @if($grandGrandChild->hasChildren())
                                                                        <div class="block">
                                                                            <label for="categories" class="flex items-center">
                                                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $grandGrandChild->id }}" id="categories" />
                                                                                <span class="ml-2 text-sm text-gray-600"> {{ $grandGrandChild->name ?? '' }} </span>
                                                                            </label>
                                                                            <div class="ml-2 border-l pl-2">
                                                                                @foreach($grandGrandChild->children as $grandGrandGrandChildren)
                                                                                    @if($grandGrandGrandChildren->hasChildren())
                                                                                        <div class="block">
                                                                                            <label for="categories" class="flex items-center">
                                                                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $grandGrandGrandChildren->id }}" id="categories" />
                                                                                                <span class="ml-2 text-sm text-gray-600"> {{ $grandGrandGrandChildren->name ?? '' }} </span>
                                                                                            </label>
                                                                                            <div class="ml-2 border-l pl-2">
                                                                                                @foreach($grandGrandGrandChildren->children as $grandGrandGrandGrandChidlren)
                                                                                                    @if($grandGrandGrandGrandChidlren->hasChildren())
                                                                                                            <div class="block">
                                                                                                                <label for="categories" class="flex items-center">
                                                                                                                    <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $grandGrandGrandGrandChidlren->id }}" id="categories" />
                                                                                                                    <span class="ml-2 text-sm text-gray-600"> {{ $grandGrandGrandGrandChidlren->name ?? '' }} </span>
                                                                                                                </label>
                                                                                                                <div class="ml-2 border-l pl-2">
                                                                                                                    @foreach($grandGrandGrandGrandChidlren->children as $lastChild)
                                                                                                                        <div class="block">
                                                                                                                            <label for="categories" class="flex items-center">
                                                                                                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $lastChild->id }}" id="categories" />
                                                                                                                                <span class="ml-2 text-sm text-gray-600"> {{ $lastChild->name ?? '' }} </span>
                                                                                                                            </label>
                                                                                                                        </div>
                                                                                                                    @endforeach
                                                                                                                </div>
                                                                                                            </div>
                                                                                                    @else
                                                                                                        <div class="block">
                                                                                                            <label for="categories" class="flex items-center">
                                                                                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $grandGrandGrandGrandChidlren->id }}" id="categories" />
                                                                                                                <span class="ml-2 text-sm text-gray-600"> {{ $grandGrandGrandGrandChidlren->name ?? '' }} </span>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </div>
                                                                                        </div>
                                                                                    @else 
                                                                                        <div class="block">
                                                                                            <label for="categories" class="flex items-center">
                                                                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $grandGrandGrandChildren->id }}" id="categories" />
                                                                                                <span class="ml-2 text-sm text-gray-600"> {{ $grandGrandGrandChildren->name ?? '' }} </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    @else
                                                                        <div class="block">
                                                                            <label for="categories" class="flex items-center">
                                                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $grandGrandChild->id }}" id="categories" />
                                                                                <span class="ml-2 text-sm text-gray-600"> {{ $grandGrandChild->name ?? '' }} </span>
                                                                            </label>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="block">
                                                            <label for="categories" class="flex items-center">
                                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $grandChild->id }}" id="categories" />
                                                                <span class="ml-2 text-sm text-gray-600"> {{ $grandChild->name ?? '' }} </span>
                                                            </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="block">
                                            <label for="categories" class="flex items-center">
                                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $child->id }}" id="categories" />
                                                <span class="ml-2 text-sm text-gray-600"> {{ $child->name ?? '' }} </span>
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="block">
                            <label for="categories" class="flex items-center">
                                <x-ui.radio name="parent_id" wire:model.debounce="parentCategoryId" value="{{ $category->id }}" id="categories" />
                                <span class="ml-2 text-sm text-gray-600"> {{ $category->name ?? '' }} </span>
                            </label>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div>
            <x-label class="block mb-1" for="parent" value="{{ __('Icon') }}" />
            @if($icon)
            <div>
                <div class="flex items-center justify-center">
                    @if ($icon)
                        <img class="w-1/2 rounded-md block" src="{{ $icon->temporaryUrl() }}">
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
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input wire:model="icon" type='file' class="hidden" />
                    </label>
                </div>
            </div>
            @endif
        </div>

        <div>
            <x-label for="desc" value="{{ __('Description') }}" />
            <x-ui.textarea wire:model.debounce="description" id="desc" class="block mt-1 w-full">

            </x-ui.textarea>
        </div>


        <div>
            <x-label  for="metaTitle" value="{{ __('Meta Title') }}" />
            <x-input wire:model.debounce="metaTitle" id="metaTitle" class="block mt-1 w-full" type="text" />
        </div>


        <div>
            <x-label  for="metaTags" value="{{ __('Meta Tags') }}" />
            <x-input wire:model.debounce="metaTags" id="metaTags" class="block mt-1 w-full" type="text" />
        </div>


        <div>
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
            <x-button wire:click.debounce="submitHandeler" type="button" class="ml-4">
                {{ __('Create') }}
            </x-button>
        </div>
    </form>
    <x-ui.text-loading-spinner loadingText="Uploading..." wire:loading.flex wire:target="icon" />
    <x-ui.loading-spinner wire:loading.flex wire:target="submitHandeler" />
</div>