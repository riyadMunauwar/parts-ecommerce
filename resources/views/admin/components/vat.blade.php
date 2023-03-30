<div class="p-5 md:p-10 bg-white">
    <x-validation-errors class="mb-4" />

    <form >
        <div>
            <x-label for="vat_rate" value="{{ __('Vat Rate') }}" />
            <x-input wire:model.debounce="vat_rate" step=any id="vat_rate" class="block mt-1 w-full" type="number" />
        </div>

        <div class="flex items-center justify-end mt-4">

            @if($isEditModeOn)
                <x-button wire:click.debounce="updateVatHandeler" type="button" class="ml-4">
                    {{ __('Update') }}
                </x-button>

                <x-button wire:click.debounce="cancelEditMode" type="button" class="ml-4">
                    {{ __('Cancel') }}
                </x-button>

            @else
                <x-button wire:click.debounce="createVatHandeler" type="button" class="ml-4">
                    {{ __('Create') }}
                </x-button>
            @endif
        </div>
    </form>

    <div class="relative overflow-x-auto mt-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Vat Rate
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($vats as $vat)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $vat->vat_rate ?? '' }} %
                        </th>
                        <td class="px-6 py-4">
                            <div class="flex justify-end">
                                <x-button type="button" wire:click.debounce="enableEditMode({{ $vat->id }})" class="py-1 px-2">
                                    {{ __('Edit') }}
                                </x-button>
                                <x-button wire:click.debounce="deleteVat({{ $vat->id }})" type="button" class="ml-4">
                                    {{ __('Delete') }}
                                </x-button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
