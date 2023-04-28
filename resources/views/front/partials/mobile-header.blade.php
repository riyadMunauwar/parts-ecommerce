<header x-data="{isMenuOpen: false, isSearchOpen: false}" class="fixed inset-0 z-50 w-full block border-b h-12 bg-white py-2 md:hidden">
    <div class="mx-3 flex items-center justify-between">

        <div class="flex gap-3 items-center justify-center">
            <livewire:front.mobile-cart-button />

            <span @click="isSearchOpen = !isSearchOpen" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>
        </div>

        <!-- Logo -->
        <div>
            <a href="/">
                <h1 class="text-xl uppercase ont-extrabold text-gray-900 "><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">{{ config('setting')->website_name ?? 'Store' }}</span></h1>
            </a>
        </div>
        
        <div class="flex gap-3 items-center justify-center">            
            <div>
                <span x-cloak @click="isMenuOpen = !isMenuOpen" x-show="!isMenuOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                    </svg>
                </span>

                <span x-cloak @click="isMenuOpen = !isMenuOpen" x-show="isMenuOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        </div>
    </div>

    <div x-show="isSearchOpen" x-transition class="mt-3 bg-white px-5 py-3 flex">
        <form action="{{ route('search') }}" method="GET" class="flex items-center flex-grow">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-4 h-4 " fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input name="search_query" type="text" id="simple-search" class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full pl-10 p-1" placeholder="Search" required="">
            </div>
        </form>

        <span @click="isSearchOpen = !isSearchOpen" class="w-10 cursor-pointer flex items-center justify-center" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </span>
    </div>

    <nav x-show="isMenuOpen" x-cloak x-transition class="fixed inset-0 z-50 overflow-hidden w-4/5 h-full primary-bg primary-text p-3">
        @auth
            <div class="ml-3 relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-dropdown-link>
                        @endif

                        <div class="border-t border-gray-200"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-dropdown-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @endauth

        @php 
            $menus = \App\Models\Menu::with('category')->orderBy('order', 'asc')->get();
        @endphp
          
        <div>
            <ul class="flex flex-col mt-4">
                @guest
                    <li>
                        <a href="{{ route('register') }}" class="flex border-b uppercase items-center py-1 font-medium pr-4 pl-3 primary-text secondary-hover-bg">
                            Create Account
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('login') }}" class="flex border-b uppercase items-center py-1 font-medium pr-4 pl-3 primary-text secondary-hover-bg">
                            Sign In
                        </a>
                    </li>
                @endguest

                <a href="{{ route('parent-category') }}" class="group cursor-pointer border-b border-t text-white px-3 py-1 font-bold hover:bg-white hover:text-gray-900 flex items-center">
                    All
                </a>
        
                @foreach($menus ?? [] as $menu)
                    @if($menu->category_id)
                        <li x-data="{isOpen: false}">
                            <a @click="isOpen = !isOpen" :class="!isOpen ? 'border-b border-gray-100' : ''" class="flex items-center py-1 font-medium pr-4 pl-3 primary-text secondary-hover-bg">
                                <span>{{ $menu->name ?? '' }}</span>

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
                            @foreach($menu->category->children ?? [] as $child)
                                @if($child->hasChildren())
                                    <ul x-show="isOpen" class="flex border-l flex-col ml-5">
                                        <li x-data="{isOpen: false}">
                                            <a @click="isOpen = !isOpen" class="flex items-center py-1 font-medium pr-4 pl-3 primary-text secondar-hover-bg">
                                                <span>{{ $child->name ?? '' }}</span>

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
                                            @foreach($child->children ?? [] as $grandChild)
                                                <ul x-show="isOpen" class="flex flex-col ml-5">
                                                    <li>
                                                        <a href="{{ route('category-product', ['categoryId' => $grandChild->id ,'categorySlug' => $grandChild->slug]) }}" class="border-l flex items-center py-1 font-medium pr-4 pl-3 primary-text secondary-hover-bg">
                                                            <span>{{ $grandChild->name ?? '' }}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </li>
                                    </ul>
                                @else 
                                    <ul x-show="isOpen" class="flex border-l flex-col ml-5">
                                        <li>
                                            <a href="{{ route('category-product', ['categoryId' => $child->id ,'categorySlug' => $child->slug]) }}" class="flex items-center py-1 font-medium pr-4 pl-3 primary-text secondar-hover-bg">
                                                <span>{{ $child->name ?? '' }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        </li>
                    @else 
                        <li>
                            <a href="{{ $menu->link ?? '/' }}" class="flex border-b items-center py-1 font-medium pr-4 pl-3 primary-text secondary-hover-bg">
                                <span>{{ $menu->name ?? '' }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>
</header>
