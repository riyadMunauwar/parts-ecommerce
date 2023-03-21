<header class="hidden md:block">
    <!-- Shipping Info Header -->
    <div class="container mx-auto">

    </div>

    <!-- Header -->
    <div class="bg-white py-3">
        <div class="container mx-auto">
            <nav class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex-1">
                    <img class="h-8" src="https://www.bdshop.com/pub/media/logo/stores/1/BDSHOP-LOGO-2022.jpg" alt="">
                </div>

                <!-- Search Form -->
                <div class="flex-grow">
                    <form>   
                        <div class="flex">
                            <input type="search" id="default-search" class="w-4/5 h-10 border-1 focus:border-0 focus:ring-gray-800 shadow-sm" placeholder="Search Mockups, Logos..." required>
                            <button type="submit" class="w-1/5 bg-black text-white">Search</button>
                        </div>
                    </form>
                </div>

                <!-- Right Menu -->
                <div class="flex-1 flex gap-5 justify-end items-center">
                    <div class="px-2 border-l">
                        <h1>Call Us</h1>
                        <h1 class="text-xl font-semibold">01794263387</h1>
                    </div>
                    <a href="" class="relative inline-flex items-center text-sm font-medium text-center">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                        </span>
                        <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">8</div>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Menu Header -->
    <div class="bg-gray-900 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex">
                <a href="" class="group flex items-center gap-1 text-md py-1 px-2 ">
                    <span>Home</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </a>
            </div>
            <div class="flex">
                <a href="" class="text-xs uppercase py-1 px-2 ">
                    Create An Account
                </a>
                <a href="" class="text-xs uppercase py-1 px-2 ">
                    Sign In
                </a>
            </div>
        </div>
    </div>

    <!-- Mega Menu -->
    <div class="container mx-auto h-[28rem] bg-white p-6">
        <div class="max-w-sm mb-8">
            <form class="flex items-center">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-4 h-4 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full pl-10 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                </div>
            </form>
        </div>
        <div class="grid md:grid-cols-5 lg:grid-cols-6">
            <div class="overflow-y-auto h-64 megamenu-scroll-bar">
                <h5 class="flex items-center mb-2 text-md font-bold dark:text-gray-700">
                    Heading
                </h5>
                
                <div class="flex flex-col">
                    <a href="" class="text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                    <a href="" class="text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                    <a href="" class="text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                    <div x-data="{isOpen: false}">

                        <a @click="isOpen = !isOpen" class="text-xs cursor-pointer hover:bg-gray-200 px-2 py-1 flex items-center">
                            <span class="text-sm">Heading</span>

                            <span x-show="isOpen" class="ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                </svg>
                            </span>

                            <span x-show="!isOpen" class="ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </span>
                        </a>

                        <div  x-show="isOpen" class="flex flex-col ml-3">
                            <a href="" class="border-l text-xs hover:bg-gray-200 px-2 py-1">children</a>
                            <a href="" class="border-l text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                            <a href="" class="border-l text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                            <a href="" class="border-l text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                            <a href="" class="border-l text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                            <a href="" class="border-l text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                            <a href="" class="border-l text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                        </div>
                    </div>
                    <a href="" class="text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                    <a href="" class="text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                    <a href="" class="text-xs hover:bg-gray-200 px-2 py-1">Home</a>
                </div>
                
            </div>
        </div>
    </div>
</header>