<div>
    @if($is_add_discount_modal_show)
        <x-ui.edit-modal class="max-w-xl">
            <div class="bg-white p-5 md:p-10 rounded-md">
                <h1 class="font-bold text-xl mb-4">Add Discount</h1>

                <h1 class="font-bold text-md mb-4">{{ $customer->email ?? '' }}</h1>
                <x-validation-errors class="mb-4" />

                <div class="grid grid-cols-1 gap-5">

                    <div class="block">
                        <label for="is_custom" class="flex items-center">
                            <x-checkbox wire:model.debounce="is_custom" id="is_custom" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Custom') }}</span>
                        </label>
                    </div>

                    @if($is_custom)
                        <div class="">
                            <x-label for="price" value="{{ __('Amount/Rate') }}" />
                            <x-input wire:model.debounce="amount" id="price" step=any class="block mt-1 h-8 w-full" type="number" />
                        </div>
                        <div class="">
                            <x-label for="type" value="{{ __('Type') }}" />
                            <x-ui.select wire:model.debounce="type" id="type" class="block mt-1 w-full">
                                <option value="percentage">Percentage</option>
                                <option value="fixed">Fixed</option>
                            </x-ui.select>
                        </div>
                    @else 
                        <div class="">
                            <x-label for="type" value="{{ __('Discount') }}" />
                            <x-ui.select wire:model.debounce="discount_id" id="type" class="block mt-1 w-full">
                                <option value="">Select</option>
                                @foreach($discounts as $discount)
                                    <option value="{{ $discount->id }}">{{ $discount->amount }} @if($discount->type === 'fixed') $ @else % @endif</option>
                                @endforeach
                            </x-ui.select>
                        </div>
                    @endif

                    <div class="flex items-center justify-start">
                        <x-button wire:click.debounce="removeCurrentDiscount" type="button" class="h-8 bg-indigo-400">
                            {{ __('Remove Current Discount') }}
                        </x-button>
                    </div>

                    <div class="flex items-center justify-end">
                        <x-button wire:click.debounce="addDiscount" type="button" class="ml-4">
                            {{ __('Add') }}
                        </x-button>
                        <x-button wire:click.debounce="cancelAddDiscount" type="button" class="ml-4">
                            {{ __('Cancel') }}
                        </x-button>
                    </div>

                </div>
                
            </div>
        </x-ui.edit-modal>
        <x-ui.loading-spinner wire:loading.flex wire:target="removeCurrentDiscount, addDiscount, cancelAddDiscount" />
    @endif
</div>