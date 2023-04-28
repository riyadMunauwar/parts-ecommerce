<section class="bg-white p-5 py-10">
    <div class="container mx-auto">
        <h1 class="mb-4">Shopping Cart</h1>
        <div class="grid grid-cols-1 lg:grid-cols-6 lg:gap-5">
            <div class="col-span-4 mb-5 lg:mb-0">
                   <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="w-full text-xs text-gray-700 uppercase bg-gray-100">
                            <tr class="w-full">
                                <th scope="col" class="lg:px-4 lg:py-3 p-2">Item</th>
                                <th scope="col" class="lg:px-4 lg:py-3 p-2 hidden md:block">Price</th>
                                <th scope="col" class="lg:px-4 lg:py-3 p-2 ">Qty</th>
                                <th scope="col" class="lg:px-4 lg:py-3 p-2 hidden md:block">Subtotal</th>
                                <th scope="col" class="lg:px-4 lg:py-3 p-2">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items ?? [] as $item)
                            <tr class="border-b">
                                <th scope="row" class="p-2 lg:px-4 lg:py-3 font-medium text-gray-900 whitespace-nowrap">
                                    <div class="flex items-center gap-5">
                                        <img class="h-10 w-10 lg:w-20 lg:h-20 rounded-md object-contain" src="{{ $item->options->thumbnail ?? '' }}" alt="">
                                        <span class="hidden md:block">
                                            <span class="block text-sm">{{ $item->name ?? '' }}</span>
                                            <span class="block tracking-wide text-sm">{{ $item->options->sku ?? '' }}</span>
                                        </span>
                                    </div>
                                    <span class="block text-xs md:hidden mt-2">$ {{ $item->price ?? '' }}</span>
                                </th>
                                <td class="lg:px-4 lg:py-3 p-2 hidden md:block">
                                     $ {{ $item->price ?? '' }}
                                </td>
                                <td class="px-4 py-3">
                                    <livewire:front.change-cart-item-button wire:key :rowId="$item->rowId" :qty="$item->qty" :productId="$item->id" />
                                </td>
                                <td class="lg:px-4 lg:py-3 p-2 hidden md:block">
                                    $ {{ $item->qty  * $item->price }}
                                </td>
                                <td class="lg:px-4 lg:py-3 p-2">
                                    <button wire:click.debounce="removeCartItem('{{ $item->rowId }}')" type="button">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(count($items) > 1)
                    <div class="flex justify-end mt-5">
                        <x-button wire:click.debounce="removeAllCartItem" type="button">
                            Remove All
                        </x-button>
                    </div>
                @endif
            </div>

            <div class="col-span-2 rounded-sm p-5 bg-gray-200">
                <h3 class="text-2xl mb-3 font-bold">Summery</h3>

                <h3 class="text-md font-thin">TO RECEIVE PACKAGE BY</h3>

                <div class="py-2 border-t border-b space-y-2">
                    <div class="flex justify-between">
                        <p>Subtotal</p>
                        <p>$ {{ $subTotalPrice }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p>Tax</p>
                        <p>$ {{ $totalVat }}</p>
                    </div>
                    <div class="flex justify-between">
                        <p>Shipping</p>
                        <p>$ {{ $totalShippingCost }}</p>
                    </div>
                    @if($isCouponApplied)
                        <div class="flex justify-between">
                            <p>Coupon Discount</p>
                            <p>$ {{ $couponDiscount ?? 0 }}</p>
                        </div>
                    @endif
                </div>

                <div class="py-4 border-b">
                    <div class="flex justify-between">
                        <h3 class="text-xl mb-3 font-bold">Order Total</h3>
                        <h3 class="text-xl mb-3 font-bold">$ {{ $orderTotalPrice }}</h3>
                    </div>
                </div>


                <div x-data="{ isOpen: false }" class="py-3">
                    <div @click="isOpen = !isOpen" class="cursor-pointer flex justify-between items-center">
                        <h4 class="text-md font-medium">
                            @if(!$isCouponApplied)
                                APPLY COUPON
                            @else 
                                COUPON APPLIED 
                            @endif
                        </h4>
                        @if(!$isCouponApplied)
                            <span x-show="!isOpen">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                            <span x-show="isOpen">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                            </span>
                        @else
                            <div class="flex gap-2">
                                <span wire:click.debounce="removeCoupon" class="text-red-400 hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                
                                <span class="text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </span>
                            </div>
                        @endif
                    </div>
                    @if(!$isCouponApplied)
                        <div x-cloack x-show="isOpen" x-transition class="mt-3">
                            <div class="flex">
                                <input wire:model.debounce="couponCode" class="w-3/4 h-8 focus:border-gray-900 focus:outline-0 focus:ring-0" type="text">
                                <button wire:click.debounce="applyCoupon" class="w-1/4 text-xs bg-gray-900 font-semibold text-white">Apply</button>
                            </div>
                        </div>
                    @endif

                    <div class="space-y-3 mt-5">
                        <x-button class="w-full justify-center">
                            {{ __('Checkout') }}
                        </x-button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <x-ui.loading-spinner wire:loading.flex wire:target="removeCartItem, removeAllCartItem, applyCoupon, removeCoupon" />
</section>