<div>
    <section class="hidden md:block">
        <div class="container mx-auto">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Home
                        </a>
                    </li>
                    @if($category->parent)
                        @foreach($category->parents ?? [] as $parent)
                            <li>
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ route('category-product', ['categoryId' => $parent->id, 'categorySlug' => $parent->slug]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">{{ $parent->name ?? '' }}</a>
                                </div>
                            </li>
                        @endforeach
                        <li>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ route('category-product', ['categoryId' => $category->id, 'categorySlug' => $category->slug]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">{{ $category->name ?? '' }}</a>
                            </div>
                        </li>
                    @else 
                        <li>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ route('category-product', ['categoryId' => $category->id, 'categorySlug' => $category->slug]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">{{ $category->name ?? '' }}</a>
                            </div>
                        </li>
                    @endif
                </ol>
            </nav>
        </div>
    </section>
    
    @if($has_children)
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6  lg:max-w-7xl lg:px-8">
            
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">{{ $category->name ?? '' }}</h2>
                

                <div class="mt-6 grid grid-cols-3 gap-x-6 gap-y-10 sm:grid-cols-4 lg:grid-cols-8 xl:gap-x-8">
                
                    @foreach($children as $child)
                        <div>
                            <a href="{{ route('category-product', ['categoryId' => $child->id, 'categorySlug' => $child->slug]) }}">
                                <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-nonelg:h-80">
                                    <img src="{{ $child->icon }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>
                            </a>


                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="{{ route('category-product', ['categoryId' => $child->id, 'categorySlug' => $child->slug]) }}">
                                            {{ $child->name ?? '' }}
                                        </a>
                                    </h3>
                                </div>

                            </div>

        
                        </div>
                    @endforeach
                </div>

                <div class="py-4">
                    {{ $products->links() }}
                </div>
            </div>
            <x-ui.loading-spinner wire:loading.flex wire:target="order_by, sort_by, show" />
        </div>
    @else
        <div class="bg-white">
            <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6  lg:max-w-7xl lg:px-8">
            
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">{{ $category->name ?? '' }}</h2>
                

                <div class="flex justify-between mt-5">
                    <div class="flex gap-2">
                        <div>
                            <x-label for="sort_by" value="{{ __('Sort By') }}" />
                            <x-ui.select wire:model="sort_by"  id="sort_by" class="block mt-1 text-xs h-8 w-full">
                                <option value="search_name">Product Name</option>
                                <option value="sale_price">Price</option>
                            </x-ui.select>
                        </div>
                        <div>
                            <x-label for="order_by" value="{{ __('Order By') }}" />
                            <x-ui.select wire:model="order_by"  id="order_by" class="block mt-1 h-8 text-xs w-full">
                                <option value="asc">ASC</option>
                                <option value="desc">DESC</option>
                            </x-ui.select>
                        </div>
                    </div>
                    <div>
                        <x-label for="show" value="{{ __('Show') }}" />
                        <x-ui.select wire:model="show"  id="show" class="block mt-1 h-8 text-xs w-full">
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
                        <div>
                            <a href="{{ route('single-product', ['productId' => $product->id, 'productSlug' => $product->slug]) }}">
                                <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-nonelg:h-80">
                                    <img src="{{ $product->thumbnailUrl() }}" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                </div>
                            </a>


                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                    <a href="{{ route('single-product', ['productId' => $product->id, 'productSlug' => $product->slug]) }}">
                                        {{ $product->name ?? '' }}
                                    </a>
                                    </h3>
                                    <div class="flex gap-1 mt-2">
                                        @if($product->color_code && $product->color && false)
                                            <span style="background-color: {{ $product->color_code }}; color: white" class=" text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded">{{ $product->color }}</span>
                                        @elseif($product->color)
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">{{ $product->color ?? '' }}</span>
                                        @endif

                                        @if($product->is_premium)
                                            <span class="self-end ml-auto bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">Premium</span>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <p class="text-sm font-medium text-gray-900">$ {{ $product->salePrice() }}</p>
                                    @if($product->hasDiscount())
                                        <del>
                                            <p class="text-xs text-gray-500">$ {{ $product->regularPrice() }}</p>
                                        </del>
                                    @endif
                                </div>
                            </div>

                            <div class="mt-3">
                                <livewire:front.add-to-cart-button wire:key :productId="$product->id" />
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="py-4">
                    {{ $products->links() }}
                </div>
            </div>
            <x-ui.loading-spinner wire:loading.flex wire:target="order_by, sort_by, show" />
        </div>
    @endif

</div>