<div>
    @if($is_add_stock_modal_show)
        <x-ui.edit-modal class="max-w-2xl">
            <div class="bg-white p-5 md:p-10 rounded-md">
                <h1 class="font-bold text-xl mb-4">Add Stock</h1>

                <h1 class="font-bold text-md mb-4">{{ $product_name ?? '' }}</h1>
                <x-validation-errors class="mb-4" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="">
                        <x-label for="price" value="{{ __('Purchase Price') }}" />
                        <x-input wire:model.debounce="price" id="price" step=any class="block mt-1 h-8 w-full" type="number" />
                    </div>
                    <div class="">
                        <x-label for="quantity" value="{{ __('Quantity') }}" />
                        <x-input wire:model.debounce="qty" id="quantity"  class="block mt-1 h-8 w-full" type="number" />
                    </div>
                    <div class="">
                        <x-label for="total" value="{{ __('Total Purchase Price') }}" />
                        <x-input disabled value="{{$this->total_purchase_price}}" step=any id="total" class="block mt-1 h-8 w-full cursor-not-allowed" type="text" />
                    </div>

                    <div class="col-span-2 flex items-center justify-end">
                        <x-button wire:click.debounce="addStock" type="button" class="ml-4">
                            {{ __('Add') }}
                        </x-button>
                        <x-button wire:click.debounce="cancelAddStock" type="button" class="ml-4">
                            {{ __('Cancel') }}
                        </x-button>
                    </div>

                </div>

            </div>
        </x-ui.edit-modal>
        <x-ui.loading-spinner wire:loading.flex wire:target="addStock, cancelAddStock" />
    @endif
</div>