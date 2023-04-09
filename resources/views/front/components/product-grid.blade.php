<div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
  
    <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>
    

    <div class="flex justify-between mt-5">
        <div class="flex gap-2">
            <div>
                <x-label for="sort_by" value="{{ __('Sort By') }}" />
                <x-ui.select  id="sort_by" class="block mt-1 text-xs h-8 w-full">
                    <option value="search_name">Product Name</option>
                    <option value="sale_price">Price</option>
                </x-ui.select>
            </div>
            <div>
                <x-label for="order_by" value="{{ __('Order By') }}" />
                <x-ui.select  id="order_by" class="block mt-1 h-8 text-xs w-full">
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </x-ui.select>
            </div>
        </div>
        <div>
            <x-label for="show" value="{{ __('Show') }}" />
            <x-ui.select  id="show" class="block mt-1 h-8 text-xs w-full">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="40">40</option>
                <option value="50">50</option>
            </x-ui.select>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
      
    @foreach($products as $product)
        <div class="">
            <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-nonelg:h-80">
            <img src="{{ $product->thumbnailUrl() }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
            </div>

            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                    <a href="#">
                        {{ $product->name ?? '' }}
                    </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">Black</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-900">$35</p>
                
                    <del>
                        <p class="text-xs text-gray-500">$35</p>
                    </del>
                </div>
            </div>

            <div class="flex mt-3">
                <div class="w-1/2 flex items-center justify-center">
                    <button type="button" class="inline-flex items-center p-1 border border-transparent rounded-sm font-semibold text-xs uppercase tracking-widest primary-bg primary-text secondary-hover-bg secondary-hover-text  focus:outline-none focus:ring-0ransition ease-in-out duration-150">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                            </svg>
                        </span>
                    </button>

                
                    <input value="10" class="block h-9 w-full border-gray-300 focus:border-gray-300 focus:ring-gray-300 rounded-sm shadow-sm" type="number" />
                
            
                    <button type="button" class="inline-flex items-center p-1 b border border-transparent rounded-sm font-semibold text-xs uppercase tracking-widest primary-bg primary-text secondary-hover-bg secondary-hover-text  focus:outline-none focus:ring-0 transition ease-in-out duration-150">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="w-1/2 flex justify-end">
                    <button type="button" class="inline-flex primary-bg primary-text secondary-hover-bg secondary-hover-text items-center px-4 py-2  border border-transparent rounded-sm font-semibold text-xs uppercase tracking-widest  focus:outline-none focus:ring-0 transition ease-in-out duration-150">
                        {{ __('ADD TO CART') }}
                    </button>
                </div>
            </div>
      </div>
      @endforeach


      <!-- More products... -->
    </div>
  </div>
</div>