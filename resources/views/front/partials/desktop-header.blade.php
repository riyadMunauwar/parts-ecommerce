<header x-data="{isSearchOpen: false}" class="hidden md:block relative z-50 bg-black text-white">
    
  <div class="bg-white py-1 text-gray-900 px-5">
    <div class="container mx-auto flex justify-between">
        <div>

        </div>
        <div class="space-x-3">
          <a href="" class="text-thin uppercase text-xs">Track Order</a>
          <a href="{{ route('register') }}" class="text-thin uppercase text-xs">Create Account</a>
          <a href="{{ route('login') }}" class="text-thin uppercase text-xs">Sign In</a>
        </div>
    </div>
  </div>


    <nav aria-label="Top" class="container mx-auto px-4 md:px-0 pt-2">
      <div class="py-1">
        <div class="flex h-16 items-center">
          <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
          <button type="button" class="rounded-md bg-white p-2 text-gray-400 lg:hidden">
            <span class="sr-only">Open menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>

          <!-- Logo -->
          <div class="ml-4 flex lg:ml-0">
            <a href="#">
              <span class="sr-only">Your Company</span>
              <img class="h-14 w-auto" src="{{ asset('assets/logo/logo-white.png') }}" alt="Logo">
            </a>
          </div>



            <div class="ml-auto flex items-center">
              <div class="hidden lg:ml-8 lg:flex">
                <a href="#" class="flex items-center text-gray-700 hover:text-gray-800">
                  <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt="" class="block h-auto w-5 flex-shrink-0">
                  <span class="ml-3 block text-white text-sm font-medium">Spanish</span>
                  <span class="sr-only">, change language</span>
                </a>
            </div>

            <!-- Search -->
            <div class="flex lg:ml-6">
              <a @click="isSearchOpen = !isSearchOpen"class="cursor-pointer p-2 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Search</span>
                <svg class="text-white h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
              </a>
            </div>

            <!-- Cart -->
            <div class="ml-4 flow-root lg:ml-6">
              <a href="#" class="group -m-2 flex items-center p-2">
                <svg class="h-6 w-6 flex-shrink-0 text-white group-hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <span class="ml-2 text-sm font-medium text-white group-hover:text-gray-800">0</span>
                <span class="sr-only">items in cart, view bag</span>
              </a>
            </div>
          </div>

        </div>
      </div>
    </nav>

    @php 
      $menus = \App\Models\Menu::all();
    @endphp

    <nav class="bg-black relative">
        <div class="container mx-auto flex">

          @foreach($menus ?? [] as $menu)
            <a class="group cursor-pointer text-white px-2 py-1 font-bold hover:bg-white hover:text-gray-900 flex items-center">
                <span>{{ $menu->name ?? '' }}</span>
                <span class="ml-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                  </svg>
                </span>

                <div class="group-hover:block hidden absolute z-40 top-full left-0 w-full h-96 bg-white text-black shadow p-5">
                    <div class="container mx-auto flex gap-5">
                        <div class="w-1/6 py-4">
                          <div class="text-xs font-medium text-gray-900 uppercase">
                              Hello world
                          </div>

                          <div class="mt-3 space-y-1 h-72 overflow-y-auto megamenu-scroll-bar">
                            <h1 id="anker" data-link="{{ route('caurosel') }}" class="cursor-pointer text-xs hover:text-orange-600">Iphone 6</h1>
                          </div>
                          
                        </div>
                    </div>
                </div>
            </a>
          @endforeach
        </div>
    </nav>

    <div x-show="isSearchOpen" x-transition class="bg-black">
        <div class="max-w-3xl mx-auto px-5 py-5 flex">
            <form class="flex items-center flex-grow">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-900" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full pl-10 p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                </div>
            </form>

            <span @click="isSearchOpen = !isSearchOpen" class="w-10 cursor-pointer flex items-center justify-center text-white" >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
    </div>

</header>


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