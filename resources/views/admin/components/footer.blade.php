<section>

    <div class="flex gap-2 p-5 bg-white md:rounded-md md:mb-4">
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

    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-5">
        <!-- Column 1 -->
        <div class="bg-white p-5 md:p-7 md:rounded-md">

            <h1 class="mb-4">Column 1</h1>

            <x-validation-errors class="mb-4" />

            <div>
                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Column Title') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="footerSectionOneName" id="columnTitle" class="block h-10 mt-1 w-full" type="text" required />
                </div>
                <div class="flex justify-end mt-3">
                    <button type="button" wire:click.debounce="updateColumnTitle('column_one')" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                </div>
            </div>

            <div class="mt-5">
                <p class="font-semibold text-gray-800 dark:text-white">{{ $footerSectionOneName ?? 'Column One Title' }}</p>

                <div class="flex flex-col items-start mt-5 space-y-2">
                    @foreach($footerSectionOneItems as $itemOne)
                        <div class="flex w-full justify-between">
                            <a href="{{ $itemOne->menu_item_link }}" target="_blank" class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">{{ $itemOne->menu_item_name }}</a>
                            <div>
                                <button wire:click.debounce="enableEditMode('column_one', {{$itemOne->id}})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click.debounce="confirmMenuItemDelete({{$itemOne->id}})" class="ml-1 text-red-400" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-5 p-5 border rounded-md">
                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Menu Item Text') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="footerSectionOneItemName" id="item" class="block h-8 mt-1 w-full" type="text" required />
                </div>
                <div class="mt-4">
                    <x-label  for="item_link" class="text-xs" value="{{ __('Menu Item Link') }}" />
                    <x-input wire:model.debounce="footerSectionOneItemLink" id="item_link" class="block h-8 mt-1 w-full" type="text" required />
                </div>
                <div class="mt-5 flex justify-end">
                    @if($isColumnOneEditModeOn)
                        <button type="button" wire:click.debounce="columnOneUpdateItem" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                        <button type="button" wire:click.debounce="cancelEditMode('column_one')" class="ml-3 inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Cancel</button>
                    @else 
                        <button type="button" wire:click.debounce="columnOneAddItem" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Column 2 -->
        <div class="bg-white p-5 md:p-7 md:rounded-md">

            <h1 class="mb-4">Column 2</h1>

            <x-validation-errors class="mb-4" />

            <div>
                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Column Title') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="footerSectionTwoName" id="columnTitle" class="block h-10 mt-1 w-full" type="text" required />
                </div>
                <div class="flex justify-end mt-3">
                    <button type="button" wire:click.debounce="updateColumnTitle('column_two')" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                </div>
            </div>

            <div class="mt-5">
                <p class="font-semibold text-gray-800 dark:text-white">{{ $footerSectionTwoName ?? 'Column Two Title' }}</p>

                <div class="flex flex-col items-start mt-5 space-y-2">
                    @foreach($footerSectionTwoItems as $itemOne)
                        <div class="flex w-full justify-between">
                            <a href="{{ $itemOne->menu_item_link }}" target="_blank" class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">{{ $itemOne->menu_item_name }}</a>
                            <div>
                                <button wire:click.debounce="enableEditMode('column_two', {{$itemOne->id}})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click.debounce="confirmMenuItemDelete({{$itemOne->id}})" class="ml-1 text-red-400" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-5 p-5 border rounded-md">
                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Menu Item Text') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="footerSectionTwoItemName" id="item" class="block h-8 mt-1 w-full" type="text" required />
                </div>
                <div class="mt-4">
                    <x-label  for="item_link" class="text-xs" value="{{ __('Menu Item Link') }}" />
                    <x-input wire:model.debounce="footerSectionTwoItemLink" id="item_link" class="block h-8 mt-1 w-full" type="text" required />
                </div>
                <div class="mt-5 flex justify-end">
                    @if($isColumnTwoEditModeOn)
                        <button type="button" wire:click.debounce="columnTwoUpdateItem" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                        <button type="button" wire:click.debounce="cancelEditMode('column_two')" class="ml-3 inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Cancel</button>
                    @else 
                        <button type="button" wire:click.debounce="columnTwoAddItem" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                    @endif
                </div>
            </div>
        </div>
        <!-- Column 3 -->
        <div class="bg-white p-5 md:p-7 md:rounded-md">
            <h1 class="mb-4">Column 3</h1>

            <x-validation-errors class="mb-4" />

            <div>
                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Column Title') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="footerSectionThreeName" id="columnTitle" class="block h-10 mt-1 w-full" type="text" required />
                </div>
                <div class="flex justify-end mt-3">
                    <button type="button" wire:click.debounce="updateColumnTitle('column_three')" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                </div>
            </div>

            <div class="mt-5">
                <p class="font-semibold text-gray-800 dark:text-white">{{ $footerSectionThreeName ?? 'Column Three Title' }}</p>

                <div class="flex flex-col items-start mt-5 space-y-2">
                    @foreach($footerSectionThreeItems as $itemOne)
                        <div class="flex w-full justify-between">
                            <a href="{{ $itemOne->menu_item_link }}" target="_blank" class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">{{ $itemOne->menu_item_name }}</a>
                            <div>
                                <button wire:click.debounce="enableEditMode('column_three', {{$itemOne->id}})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click.debounce="confirmMenuItemDelete({{$itemOne->id}})" class="ml-1 text-red-400" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-5 p-5 border rounded-md">
                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Menu Item Text') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="footerSectionThreeItemName" id="item" class="block h-8 mt-1 w-full" type="text" required />
                </div>
                <div class="mt-4">
                    <x-label  for="item_link" class="text-xs" value="{{ __('Menu Item Link') }}" />
                    <x-input wire:model.debounce="footerSectionThreeItemLink" id="item_link" class="block h-8 mt-1 w-full" type="text" required />
                </div>
                <div class="mt-5 flex justify-end">
                    @if($isColumnThreeEditModeOn)
                        <button type="button" wire:click.debounce="columnThreeUpdateItem" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                        <button type="button" wire:click.debounce="cancelEditMode('column_three')" class="ml-3 inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Cancel</button>
                    @else 
                        <button type="button" wire:click.debounce="columnThreeAddItem" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                    @endif
                </div>
            </div>
        </div>

        <!-- Column 4 -->
        <div class="bg-white p-5 md:p-7 md:rounded-md">
            <h1 class="mb-4">Column 4</h1>

            <x-validation-errors class="mb-4" />

            <div>
                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Column Title') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="footerSectionFourName" id="columnTitle" class="block h-10 mt-1 w-full" type="text" required />
                </div>
                <div class="flex justify-end mt-3">
                    <button type="button" wire:click.debounce="updateColumnTitle('column_four')" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                </div>
            </div>

            <div class="mt-5">
                <p class="font-semibold text-gray-800 dark:text-white">{{ $footerSectionFourName ?? 'Column Four Title' }}</p>

                <div class="flex flex-col items-start mt-5 space-y-2">
                    @foreach($footerSectionFourItems as $itemOne)
                        <div class="flex w-full justify-between">
                            <a href="{{ $itemOne->menu_item_link }}" target="_blank" class="text-gray-600 transition-colors duration-300 dark:text-gray-300 dark:hover:text-blue-400 hover:underline hover:text-blue-500">{{ $itemOne->menu_item_name }}</a>
                            <div>
                                <button wire:click.debounce="enableEditMode('column_four', {{$itemOne->id}})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click.debounce="confirmMenuItemDelete({{$itemOne->id}})" class="ml-1 text-red-400" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-5 p-5 border rounded-md">
                <div>
                    <div class="flex gap-1">
                        <x-label  for="" value="{{ __('Menu Item Text') }}" />
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $locale ?? '' }}</span>
                    </div>
                    <x-input wire:model.debounce="footerSectionFourItemName" id="item" class="block h-8 mt-1 w-full" type="text" required />
                </div>
                <div class="mt-4">
                    <x-label  for="item_link" class="text-xs" value="{{ __('Menu Item Link') }}" />
                    <x-input wire:model.debounce="footerSectionFourItemLink" id="item_link" class="block h-8 mt-1 w-full" type="text" required />
                </div>
                <div class="mt-5 flex justify-end">
                    @if($isColumnFourEditModeOn)
                        <button type="button" wire:click.debounce="columnFourUpdateItem" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Update</button>
                        <button type="button" wire:click.debounce="cancelEditMode('column_four')" class="ml-3 inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Cancel</button>
                    @else 
                        <button type="button" wire:click.debounce="columnFourAddItem" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-ui.loading-spinner  wire:loading.flex wire:target="columnOneAddItem,columnTwoAddItem,columnThreeAddItem,columnFourAddItem, columnOneUpdateItem, columnTwoUpdateItem, columnThreeUpdateItem, columnFourUpdateItem, cancelEditMode, updateColumnTitle" />
</section>