<section class="bg-white p-5 py-10">
    <div class="container mx-auto">
        <h1 class="mb-4">Checkout</h1>

        <div class="grid grid-cols-1 lg:grid-cols-6 lg:gap-5">
            <div class="col-span-4 mb-5 lg:mb-0">

                <h1 class="bg-black text-white py-2 px-4 text-center text-lg font-semibold mb-5 rounded-sm">Shipping Address</h1>

                <x-validation-errors class="mb-4" />

                @if(count($addressValidationErrors) > 0)
                    <div class="spacey-y-2">
                        @foreach($addressValidationErrors ?? [] as $addressError)
                            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Danger</span>
                                <div>
                                    <span class="font-medium">{{ $addressError['code'] ?? 'Error' }}</span>
                                    <ul class="mt-1.5 ml-4 list-disc list-inside">
                                        <li>{{ $addressError['text'] ?? '' }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <x-label for="email" value="{{ __('Email *') }}" />
                        <x-input wire:model.debounce="email" id="email" class="block h-8 mt-1 w-full" type="email" />
                    </div>

                    <div>
                        <x-label for="phone" value="{{ __('Phone *') }}" />
                        <x-input wire:model.debounce="phone" id="phone" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="first_name" value="{{ __('First Name *') }}" />
                        <x-input wire:model.debounce="first_name" id="first_name" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="last_name" value="{{ __('Last Name *') }}" />
                        <x-input wire:model.debounce="last_name" id="last_name" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="street_1" value="{{ __('Street line 1 *') }}" />
                        <x-input wire:model.debounce="street_1" id="street_1" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="street_2" value="{{ __('Street line 2') }}" />
                        <x-input wire:model.debounce="street_2" id="street_2" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="city" value="{{ __('City *') }}" />
                        <x-input wire:model.debounce="city" id="city" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="zip" value="{{ __('Zip Code *') }}" />
                        <x-input wire:model.debounce="zip" id="zip" class="block h-8 mt-1 w-full" type="text" />
                    </div>


                    <div>
                        <x-label for="state" value="{{ __('State *') }}" />
                        <x-ui.select wire:model.debounce="state" id="state" class="block mt-1 h-9 w-full">
                            <option value="">Select a State</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </x-ui.select>
                    </div>

                    <div>
                        <x-label for="role" value="{{ __('Country *') }}" />
                        <x-ui.select wire:model.debounce="country" id="country" class="block mt-1 h-9 w-full">
                            <option value="">Select a country</option>
                            <option value="US">United States</option>
                        </x-ui.select>
                    </div>

                    <div class="col-span-2">
                        <div class="flex gap-1">
                            <x-label  for="order_note" value="{{ __('Order Note') }}" />
                        </div>
                        <x-ui.textarea wire:model.debounce="order_note" id="order_note" class="block mt-1 w-full"></x-ui.textarea>
                    </div>

                </div>

                @if($isAddressValidated)
                    <div class="mt-10">
                        <h1 class="bg-black text-white py-2 px-4 text-center text-lg font-semibold mb-5 rounded-sm">Shipping Method</h1>

                        <div class="space-y-3">
                            @foreach($shippingRates as $rate)
                                <div class="flex items-center gap-5 pl-4 border border-gray-200 rounded">
                                    <input wire:model.debounce="selectedShippingRate" id="rates-{{$rate['object_id']}}" type="radio" value="{{ $rate['object_id'] }}" name="shipping_rate" class="w-4 h-4 text-gray-900 bg-gray-100 border-gray-300 focus:ring-gray-900 focus:ring-2">
                                    <label for="rates-{{$rate['object_id']}}" class="cursor-pointer w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        <div class="flex justify-between items-center px-4 text-gray-700">
                                            <h2>
                                                <img class="block h-10 object-contain" src="{{ $rate['provider_image_200'] }}" alt="">
                                            </h2>
                                            <h2 class="whitespace-nowrap">$ {{ $rate['amount'] }}</h2>
                                            <h2 class="whitespace-nowrap">{{ $rate['provider'] }}</h2>
                                            <h2 class="w-1/4">{{ $rate['duration_terms'] }}</h2>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif


                <div class="flex justify-end mt-5">
                    <x-button wire:click.debounce="goToCart" type="button">
                        Back to cart
                    </x-button>
                    @if(!$isAddressValidated)
                        <x-button wire:click.debounce="validateAddress" type="button" class="ml-4">
                            Next
                        </x-button>
                    @endif
                </div>

            </div>

            <div class="col-span-2">
                <div class="rounded-sm p-5 bg-gray-200">
                    <h3 class="text-2xl mb-3 font-bold">Summery</h3>

                    <h3 class="text-md font-thin">Total Items ({{ $items }})</h3>

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

                        @if($isAddressValidated)
                            <div class="space-y-3 mt-5">
                                <x-button wire:click.debounce="nextStepForPayment" type="button" class="w-full justify-center">
                                    {{ __('Pay') }}
                                </x-button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <x-ui.loading-spinner wire:loading.flex wire:target="validateAddress, applyCoupon, removeCoupon, nextStepForPayment" />
</section>

@push('modals')
    <livewire:front.register-user />
    <livewire:front.square-payment-method />
@endpush