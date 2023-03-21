<header x-data="{isMenuOpen: false, isSearchOpen: false}" class="bg-white py-2 md:hidden">
    <div class="mx-3 flex items-center justify-between">
        <!-- Logo -->
        <div>
            <a href="">
                <img class="h-7 block" src="https://www.bdshop.com/pub/media/logo/stores/1/BDSHOP-LOGO-2022.jpg" alt="">
            </a>
        </div>

        <div class="flex gap-3 items-center justify-center">

            <a href="" class="relative inline-flex justify-center items-center text-sm font-medium text-center">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </span>
                <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">8</div>
            </a>

            <span @click="isSearchOpen = !isSearchOpen" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>
            <span @click="isMenuOpen = !isMenuOpen" x-show="!isMenuOpen" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </span>
            <span @click="isMenuOpen = !isMenuOpen" x-show="isMenuOpen">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
    </div>

    <div x-show="isSearchOpen" x-transition class="mt-3 px-5 py-3 flex">
        <form class="flex items-center flex-grow">
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

        <span @click="isSearchOpen = !isSearchOpen" class="w-10 cursor-pointer flex items-center justify-center" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </span>
    </div>

    <nav x-show="isMenuOpen" x-transition class="fixed inset-0 w-4/5 h-full bg-white p-3">
        <div class="flex justify-between">
            <a href="">
                <img class="h-6 block" src="https://www.bdshop.com/pub/media/logo/stores/1/BDSHOP-LOGO-2022.jpg" alt="">
            </a>

            <span @click="isMenuOpen = !isMenuOpen" x-show="isMenuOpen" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>

        <div>
            <ul class="flex flex-col mt-4">
                <li x-data="{isOpen: false}">
                    <a @click="isOpen = !isOpen" :class="!isOpen ? 'border-b border-gray-100' : ''" class="flex items-center rounded-md py-1 font-medium pr-4 pl-3 text-gray-700 hover:bg-gray-200">
                        <span>Home</span>

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

                    <ul x-show="isOpen" class="flex flex-col ml-5">
                        <li x-data="{isOpen: false}">
                            <a @click="isOpen = !isOpen" :class="!isOpen ? 'border-b border-gray-100' : ''" class="border-l flex items-center py-1 font-medium pr-4 pl-3 text-gray-700 hover:bg-gray-200">
                                <span>Home</span>

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

                            <ul x-show="isOpen" class="flex flex-col ml-5">
                                <li x-data="{isOpen: false}">
                                    <a @click="isOpen = !isOpen" :class="!isOpen ? 'border-b border-gray-100' : ''" class="border-l flex items-center py-1 font-medium pr-4 pl-3 text-gray-700 hover:bg-gray-200">
                                        <span>Home</span>

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
                                </li>
                            </ul>
                        </li>
                    </ul>
                    
                </li>
            </ul>
        </div>
 
    </nav>
</header>