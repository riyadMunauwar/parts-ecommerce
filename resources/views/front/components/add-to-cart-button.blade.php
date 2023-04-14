<div>
    <div class="flex">
        <div class="w-1/2 flex items-center justify-center">
            <button wire:click.debounce="decrementQty" type="button" class="inline-flex items-center p-1 border border-transparent rounded-sm font-semibold text-xs uppercase tracking-widest primary-bg primary-text secondary-hover-bg secondary-hover-text  focus:outline-none focus:ring-0ransition ease-in-out duration-150">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                    </svg>
                </span>
            </button>

        
            <input wire:model="qty" class="block h-7 px-1 w-full border-gray-300 focus:border-gray-300 focus:ring-gray-300 rounded-sm shadow-sm" type="number" />
        

            <button wire:click.debounce="incrementQty" type="button" class="inline-flex items-center p-1 b border border-transparent rounded-sm font-semibold text-xs uppercase tracking-widest primary-bg primary-text secondary-hover-bg secondary-hover-text  focus:outline-none focus:ring-0 transition ease-in-out duration-150">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </span>
            </button>
        </div>
        <div class="w-1/2 flex justify-end">
            <button wire:click.debounce="addToCart" type="button" class="inline-flex items-center px-2 py-1 b border border-transparent rounded-sm font-semibold text-xs uppercase tracking-widest primary-bg primary-text secondary-hover-bg secondary-hover-text  focus:outline-none focus:ring-0 transition ease-in-out duration-150">
                {{ __('ADD TO CART') }}
            </button>
        </div>
    </div>
    <x-ui.loading-spinner wire:loading.flex wire:target="incrementQty, decrementQty, qty, addToCart" />
</div>