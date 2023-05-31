<section class="sticky top-0 z-50">
<header x-data="{isSearchOpen: false}" class="hidden md:block relative z-50 main-header-bg main-header-text">
    
    <div class="middle-header-bg middle-header-text py-1 text-gray-900 px-5">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <a class="middle-header-text" href="">{{ config('setting')->middle_header_message_text ?? '' }}</a>
            </div>
    
            <div class="flex gap-3 items-center">
              <a href="{{ route('track-order') }}" class="text-thin middle-header-text uppercase text-xs">Track Order</a>
              
              @guest 
                <a href="{{ route('register') }}" class="text-thin middle-header-text uppercase text-xs">Create Account</a>
                <a href="{{ route('login') }}" class="text-thin middle-header-text uppercase text-xs">Sign In</a>
              @endguest
              
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
    
    
    
                      @php 
                    
                          $role = auth()->user()->getRoleNames()->first();
    
                          $user_profile_route = route('admin-user-profile');
    
                          if(!$role || $role === 'user')
                          {
                              $role = 'user';
                              $user_profile_route = route('user-profile');
                          }
    
                      @endphp
    
                      <x-slot name="content">
                          <!-- Account Management -->
                          <div class="block px-4 py-2 text-xs text-gray-400">
                              {{ __('Manage Account') }}
                          </div>
    
                          

                          @if($role !== 'user')
                            <x-dropdown-link href="{{ route('dashboard') }}">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                          @else 
                            <x-dropdown-link href="">
                                {{ __('My Order') }}
                            </x-dropdown-link>
                          @endif

                          <x-dropdown-link href="{{ $user_profile_route }}">
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
    
            </div>
        </div>
      </div>
    
    
        <nav aria-label="Top" class="container mx-auto px-4 md:px-0 pt-2">
          <div class="py-1">
            <div class="flex h-16 items-center">
              <!-- Logo -->
              <div class="ml-4 flex lg:ml-0">
                <a href="/">
                  <span class="sr-only">Your Company</span>
                  <img class="h-14 w-auto" src="{{ config('setting')->logoUrl() }}" alt="Logo">
                </a>
              </div>
    
                <div class="ml-auto flex items-center">
                  <div class="hidden lg:ml-8 lg:flex">
                    @if(app()->getLocale() === 'en')
                      <a href="{{ route('locale', ['language' => 'es']) }}" class="flex items-center text-gray-700 hover:text-gray-800">
                        <span class="ml-3 block primary-text secondary-hover-text text-sm font-medium">Spanish</span>
                        <span class="sr-only">change language</span>
                      </a>
                    @else
                      <a href="{{ route('locale', ['language' => 'en']) }}" class="flex items-center text-gray-700 hover:text-gray-800">
                        <span class="ml-3 block primary-text secondary-hover-text text-sm font-medium">English</span>
                        <span class="sr-only">change language</span>
                      </a>
                    @endif
                </div>
    
                <!-- Search -->
                <div class="flex lg:ml-6">
                  <a @click="isSearchOpen = !isSearchOpen"class="cursor-pointer p-2 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Search</span>
                    <svg class="primary-text secondary-hover-text  h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                  </a>
                </div>
    
                <!-- Cart -->
                <livewire:front.desktop-cart-button />
              </div>
    
            </div>
          </div>
        </nav>
    
        @php 
          $menus = \App\Models\Menu::with('category')->orderBy('order', 'asc')->get();
        @endphp
    
        <nav class="main-header-bg main-header-text relative">
            <div class="container mx-auto flex">
    
                <a href="{{ route('parent-category') }}" class="group cursor-pointer text-white px-3 py-1 font-bold hover:bg-white hover:text-gray-900 flex items-center">
                    All
                </a>
    
                @foreach($menus ?? [] as $menu)
                  @if($menu->category_id)
                    <a class="group cursor-pointer text-white px-3 py-1 font-bold hover:bg-white hover:text-gray-900 flex items-center">
                        <span>{{ $menu->name ?? '' }}</span>
                        <span class="ml-1">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                          </svg>
                        </span>
    
                        <div class="group-hover:block hidden absolute z-40 top-full left-0 w-full h-96 bg-white text-black shadow p-5">
                            <div class="container mx-auto flex gap-5">
                                @foreach($menu->category->children ?? [] as $child)
                                  <div class="w-1/6 py-4">
                                      <div id="anker" data-link="{{ route('category-product', ['categoryId' => $child->id, 'categorySlug' => $child->slug]) }}" class="text-md top-header-button-text font-medium text-gray-900 uppercase">
                                          {{ $child->name ?? 'None' }}
                                      </div>
    
                                      <div class="mt-3 h-72 overflow-y-auto megamenu-scroll-bar">
                                        @foreach($child->children ?? [] as $grandChild)
                                          <h1 id="anker" data-link="{{ route('category-product', ['categoryId' => $grandChild->id, 'categorySlug' => $grandChild->slug]) }}" class="cursor-pointer text-sm text-gray-600 px-2 py-1 hover:text-orange-600">{{ $grandChild->name ?? '' }}</h1>
                                        @endforeach
                                      </div>
                                  </div>
                                @endforeach
                            </div>
                        </div>
                    </a>
                  @else 
                    <a href="{{ $menu->link ?? '' }}" class="group cursor-pointer text-white px-3 py-1 font-bold hover:bg-white hover:text-gray-900 flex items-center">
                        {{ $menu->name ?? '' }}
                    </a>
                  @endif
                @endforeach
            </div>
        </nav>
    
        <div x-show="isSearchOpen" x-transition class="main-header-bg">
            <div class="max-w-3xl mx-auto px-5 py-5 flex">
                <form action="{{ route('search') }}" method="GET" class="flex items-center flex-grow">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-4 h-4 text-gray-900" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input name="search_query" type="text" id="simple-search" class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full pl-10 p-3" placeholder="Search" required="">
                    </div>
                </form>
    
                <span @click="isSearchOpen = !isSearchOpen" class="w-10 cursor-pointer flex items-center justify-center main-header-text" >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
        </div>
    
    </header>
</section>


@push('scripts')

  <script>

    let ankers = Array.from(document.querySelectorAll('#anker'));

    ankers.forEach(anker => {
      anker.addEventListener('click', (e) => {
        window.location.href=e.target.dataset.link;
      })
    })


  </script>

@endpush