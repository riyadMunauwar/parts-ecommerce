<section class="bg-white p-5 py-10">
    <div class="container mx-auto">
        <h1 class="mb-4">Checkout</h1>
        <div class="grid grid-cols-1 lg:grid-cols-6 lg:gap-5">
            <div class="col-span-4 mb-5 lg:mb-0">

                <h1 class="bg-black text-white py-2 px-4 text-center text-lg font-semibold mb-5 rounded-sm">Shipping Address</h1>

                <x-validation-errors class="mb-4" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input wire:model.debounce="email" id="email" class="block h-8 mt-1 w-full" type="email" />
                    </div>

                    <div>
                        <x-label for="phone" value="{{ __('Phone') }}" />
                        <x-input wire:model.debounce="phone" id="phone" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="first_name" value="{{ __('First Name') }}" />
                        <x-input wire:model.debounce="first_name" id="first_name" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="last_name" value="{{ __('Last Name') }}" />
                        <x-input wire:model.debounce="last_name" id="last_name" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="street_no" value="{{ __('Street No') }}" />
                        <x-input wire:model.debounce="street_no" id="street_no" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="street_1" value="{{ __('Street line 1') }}" />
                        <x-input wire:model.debounce="street_1" id="street_1" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="street_2" value="{{ __('Street line 2') }}" />
                        <x-input wire:model.debounce="street_2" id="street_2" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="city" value="{{ __('City') }}" />
                        <x-input wire:model.debounce="city" id="city" class="block h-8 mt-1 w-full" type="text" />
                    </div>

                    <div>
                        <x-label for="state" value="{{ __('State') }}" />
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
                        <x-label for="zip" value="{{ __('Zip Code') }}" />
                        <x-input wire:model.debounce="zip" id="zip" class="block h-8 mt-1 w-full" type="text" />
                    </div>


                    <div>
                        <x-label for="role" value="{{ __('Country') }}" />
                        <x-ui.select wire:model.debounce="country" id="country" class="block mt-1 h-9 w-full">
                            <option value="">Select a country</option>
                            <option value="US">United States</option>
                        </x-ui.select>
                    </div>

                </div>
                     
                <div class="flex justify-end mt-5">
                    <x-button wire:click.debounce="goToCart" type="button">
                        Go to cart
                    </x-button>
                </div>

            </div>

            <div class="col-span-2 rounded-sm p-5 bg-gray-200">
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

                    <div class="space-y-3 mt-5">
                        <x-button class="w-full justify-center">
                            {{ __('Paypal') }}
                        </x-button>
                        <x-button class="w-full justify-center">
                            {{ __('Stripe') }}
                        </x-button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <x-ui.loading-spinner wire:loading.flex wire:target="removeCartItem, removeAllCartItem, applyCoupon, removeCoupon" />
</section>