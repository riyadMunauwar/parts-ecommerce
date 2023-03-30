<section class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 md:gap-5">
    <div>
        <div class="bg-white p-5">
            <h1 class="mb-5">Add Discount</h1>
            <x-validation-errors class="mb-4" />
            <div class=" space-y-3">
                <div>
                    <x-label  for="name" value="{{ __('Name') }}" />
                    <x-input wire:model.debounce="name" id="name" class="block mt-1 w-full" type="text" required />
                </div>

                <div class="">
                    <x-label for="type" value="{{ __('Type') }}" />
                    <x-ui.select wire:model.debounce="type" id="type" class="block mt-1 w-full">
                        <option value="percentage">Percentage</option>
                        <option value="fixed">Fixed</option>
                    </x-ui.select>
                </div>

                <div class="">
                    <x-label for="amount" value="{{ __('Amount') }}" />
                    <x-input wire:model.debounce="amount" id="amount" class="block mt-1 w-full" type="number"/>
                </div>

                <div class="">
                    <x-label for="desc" value="{{ __('Description') }}" />
                    <x-ui.textarea wire:model.debounce="description" id="desc" class="block mt-1 w-full">

                    </x-ui.textarea>
                </div>


                <div class="flex items-center justify-end">
                    @if($isEditModeOn)
                        <x-button wire:click.debounce="updateDiscount" type="button"  class="ml-4">
                            {{ __('Update') }}
                        </x-button>

                        <x-button wire:click.debounce="cancelDiscountEditMode" type="button"  class="ml-1">
                            {{ __('Cancel') }}
                        </x-button>
                    @else
                        <x-button wire:click.debounce="createDiscount" type="button" class="ml-4">
                            {{ __('Create') }}
                        </x-button>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <div class="col-span-2">
        <div class="bg-white p-5">
            <h1 class="mb-5">Discount list</h1>

            <div class="overflow-x-auto">
                <table class="wrap w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Type</th>
                            <th scope="col" class="px-4 py-3">Amount</th>
                            <th scope="col" class="px-4 py-3">Description</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discounts ?? [] as $discount)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $discount->name ?? '' }}</th>
                            <td class="px-4 py-3">
                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $discount->type ?? '' }}</span>
                            </td>
                            <td class="px-4 py-3">
                                {{ $discount->amount ?? '' }}
                            </td>
                            <td class="px-4 py-3"><span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ \Illuminate\Support\Str::limit($discount->description ?? 'None', 35, $end='...') }}</span></td>
                            <td class="px-4 py-3 flex items-center justify-end">
                                <button wire:click.debounce="enableDiscountEditMode({{ $discount->id }})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </button>
                                <button wire:click.debounce="confirmDeleteDiscount({{ $discount->id }})" class="ml-1 text-red-400" type="button">
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
</section>
