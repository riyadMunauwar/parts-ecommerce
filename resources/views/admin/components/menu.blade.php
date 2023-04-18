<section class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 md:gap-5">
    <div>
        <div class="bg-white p-5 md:p-7 md:rounded-md">
            <div class="flex justify-between flex-col md:flex-row">
                <h1 class="mb-3">
                    @if($isEditModeOn)
                        Update Menu
                    @else 
                        Add Menu
                    @endif
                </h1>

                <div class="flex gap-2 mb-4">
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
            </div>


            <x-validation-errors class="mb-4" />

            <div class="space-y-4">
                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Menu Name') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="name" id="name" class="block mt-1 w-full" type="text" required />
                </div>

                <div>
                    <x-label  for="order" value="{{ __('Showing Order') }}" />
                    <x-input wire:model.debounce="order" id="order" class="block mt-1 w-full" type="text" />
                </div>

                <div class="block">
                    <label for="useLink" class="flex items-center">
                        <x-checkbox wire:model.debounce="useLink" id="useLink" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Use link') }}</span>
                    </label>
                </div>

                @if(!$useLink)
                    <div>
                        <x-label for="cat_it" value="{{ __('Category ID') }}" />
                        <x-ui.select wire:model.debounce="categoryId" id="cat_it" class="block mt-1 w-full">
                            <option value="">Select</option>
                            @foreach($categories ?? [] as $category)
                                <option value="{{ $category->id }}">{{ $category->name ?? '' }}</option>
                            @endforeach
                        </x-ui.select>
                    </div>
                @else 
                <div>
                    <x-label  for="link" value="{{ __('Menu Link') }}" />
                    <x-input wire:model.debounce="link" id="link" class="block mt-1 w-full" type="text" required />
                </div>

                @endif

                <div class="flex items-center justify-end">
                    @if($isEditModeOn)
                        <x-button wire:click.debounce="updateMenu" type="button"  class="ml-4">
                            {{ __('Update') }}
                        </x-button>

                        <x-button wire:click.debounce="cancelMenuEditMode" type="button"  class="ml-1">
                            {{ __('Cancel') }}
                        </x-button>
                    @else
                        <x-button wire:click.debounce="createMenu" type="button" class="ml-4">
                            {{ __('Create') }}
                        </x-button>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div class="col-span-2">
        <div class="bg-white p-5 md:p-7 md:rounded-md">
            <h1 class="mb-5">Menu list</h1>

            <div class="overflow-x-auto">
                <table class="wrap w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Menu</th>
                            <th scope="col" class="px-4 py-3">Menu Link</th>
                            <th scope="col" class="px-4 py-3">Showing Order</th>
                            <th scope="col" class="px-4 py-3">Link Category</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus ?? [] as $menu)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $menu->name ?? '' }}
                            </th>
                            <th scope="row" class="px-4 py-3 text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $menu->link ?? '' }}
                            </th>
                            <th scope="row" class="px-4 py-3 text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $menu->order ?? '' }}
                            </th>
                            <th scope="row" class="px-4 py-3 text-gray-900 whitespace-nowrap dark:text-white">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $menu->category->name ?? 'None' }}</span>
                            </th>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button wire:click.debounce="enableMenuEditMode({{ $menu->id }})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click.debounce="confirmDeleteMenu({{ $menu->id }})" class="ml-1 text-red-400" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-ui.loading-spinner  wire:loading.flex wire:target="createMenu, confirmDeleteMenu, enableMenuEditMode, updateMenu, cancelMenuEditMode" />
</section>
