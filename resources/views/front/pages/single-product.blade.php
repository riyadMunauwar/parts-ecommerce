<x-front.master-layout title="Single Product">
    @include('front.partials.breadcrumbs')

    <section class="py-12 bg-white">
        <div class="container mx-auto max-w-6xl p-5">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-5">

                <div class="col-span-2">
                    <div class="">
                        <img class="block w-full" src="https://waltonbd.com/image/catalog/category-banner/mobile/hm7-block.jpg" alt="">
                    </div>

                </div>

                <div class="col-span-3">
                    <h2 class="text-3xl font-bold dark:text-white">Payments tool for companies</h2>
                    <div class="border-t border-b border-gray-300 py-3 mt-5">
                        <div class="flex justify-between" >
                            <h2 class="text-2xl font-extrabold dark:text-white">$35</h2>
                            <div>
                                <p class="text-sm tracking-wide ">SKU#SKU 2-LG-7024</p>
                                <p class="text-xs tracking-wide flex gap-2 mt-3">
                                    <span class="text-green-400 font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </span>
                                    <span>
                                        In Stock
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h1 class="mb-2">Quantity</h1>
                        <div class="flex items-center justify-strt">
                            <button type="button" class="inline-flex items-center p-1 bg-gray-800 border border-transparent rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                    </svg>
                                </span>
                            </button>


                            <span class="text-2xl px-3">
                                0
                            </span>

                            <button type="button" class="inline-flex items-center p-1 bg-gray-800 border border-transparent rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="mt-5 border-b border-t py-4">
                        <h1 class="mb-5 text-xl">Recommendation Tools</h1>
                        <div>
                            <div class="flex gap-6 max-w-md">
                                <img class="block w-14 h-14 object-cover" src="https://waltonbd.com/image/catalog/category-banner/mobile/hm7-block.jpg" alt="">
                                <div class="flex-grow">
                                    <p class="text-md">Lorem ipsum dolor sit amet. word whele world</p>
                                    <div class="flex justify-between mt-1">
                                        <p>$35</p>
                                        <button type="button" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-start mt-5">
                        <x-button class="">
                            {{ __('ADD TO CART') }}
                        </x-button>
                    </div>
                </div>
            </div>


            <!-- Details -->
            <div>
                <div x-data="{isOpen: false}" :class="isOpen ? 'border px-3' : ''">
                    <div @click="isOpen = !isOpen" class="flex items-center gap-2 py-2 border-b">
                        <span x-show="isOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                            </svg>
                        </span>

                        <span x-show="! isOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </span>

                        <h1  class="cursor-pointer">Compatibility</h1>
                    </div>
                    <div x-show="isOpen" x-transition class="p-6">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, est!</p>
                    </div>
                </div>

                <div x-data="{isOpen: false}" :class="isOpen ? 'border px-3' : ''">
                    <div  @click="isOpen = !isOpen" class="flex items-center gap-2 py-2 border-b">
                        <span x-show="isOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                            </svg>
                        </span>

                        <span x-show="! isOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </span>

                        <h1  class="cursor-pointer">Features</h1>
                    </div>
                    <div x-show="isOpen" x-transition class="p-6">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, est!</p>
                    </div>
                </div>

                <div x-data="{isOpen: false}" :class="isOpen ? 'border px-3' : ''">
                    <div @click="isOpen = !isOpen"  class="flex items-center gap-2 py-2 border-b">
                        <span x-show="isOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                            </svg>
                        </span>

                        <span x-show="! isOpen">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </span>

                        <h1 class="cursor-pointer">Product Description</h1>
                    </div>
                    <div x-show="isOpen" x-transition class="p-6">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, est!</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

</x-front.master-layout>
