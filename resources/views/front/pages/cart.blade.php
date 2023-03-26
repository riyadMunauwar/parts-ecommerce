<x-front.master-layout title="Cart">

    <section class="bg-white py-10">
        <div class="container max-w-6xl mx-5 md:mx-auto">
            <h1 class="mb-4">Shopping Cart</h1>
            <div class="grid grid-cols-1 md:grid-cols-6 gap-5">

                <div class="col-span-4">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Item
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Qty
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Subtotal
                                    </th>
                                    <th>

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                        <div class="flex items-center gap-5">
                                            <img class="w-20 h-20 object-contain" src="https://dtt1c9id3txwq.cloudfront.net/website/storrea_pos/storrea-pos-gadgets.png" alt="">
                                            <span>
                                                <span class="block text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit.</span>
                                                <span class="block tracking-wide text-sm">SKU-2a5</span>
                                            </span>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4">
                                        Silver
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center">
                                            <button type="button" class="inline-flex items-center p-1 bg-gray-800 border border-transparent rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                <span class="text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                                    </svg>
                                                </span>
                                            </button>


                                            <span class="text-xl px-3">
                                                0
                                            </span>

                                            <button type="button" class="inline-flex items-center p-1 bg-gray-800 border border-transparent rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                <span class="text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        $2999
                                    </td>
                                    <td class="px-6 py-4">
                                        <button>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="flex justify-end mt-5">
                        <x-button>
                            Remove All
                        </x-button>
                    </div>
                </div>

                <div class="col-span-2 rounded-sm p-5 bg-gray-200">
                    <h3 class="text-2xl mb-3 font-bold dark:text-white">Summery</h3>

                    <h3 class="text-md font-thin dark:text-white uppercase">TO RECEIVE PACKAGE BY</h3>

                    <div class="py-2 border-t border-b space-y-2">
                        <div class="flex justify-between">
                            <p>Subtotal</p>
                            <p>$35</p>
                        </div>
                        <div class="flex justify-between">
                            <p>Tax</p>
                            <p>$35</p>
                        </div>
                        <div class="flex justify-between">
                            <p>Shipping</p>
                            <p>$35</p>
                        </div>
                    </div>

                    <div class="py-4 border-b">
                        <div class="flex justify-between">
                            <h3 class="text-xl mb-3 font-bold dark:text-white">Order Total</h3>
                            <h3 class="text-xl mb-3 font-bold dark:text-white">$105</h3>
                        </div>
                    </div>


                    <div x-data="{ isOpen: false }" class="py-3">
                        <div @click="isOpen = !isOpen" class="cursor-pointer flex justify-between items-center">
                            <h4 class="text-md font-medium dark:text-white">APPLY COUPON</h4>
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
                        </div>

                        <div x-show="isOpen" x-transition class="mt-3">
                            <form action="" class="flex">
                                <input class="w-3/4 h-8 focus:border-gray-900 focus:outline-0 focus:ring-0" type="text">
                                <button class="w-1/4 text-xs bg-gray-900 font-semibold text-white">Apply</button>
                            </form>
                        </div>

                        <div class="space-y-3 mt-5">
                            <x-button class="w-full justify-center">
                                {{ __('Checkout') }}
                            </x-button>

                            <x-button class="w-full justify-center">
                                {{ __('Paypal') }}
                            </x-button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</x-front.master-layout>
