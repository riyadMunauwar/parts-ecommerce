<x-front.master-layout>

    <x-slot name="meta_data">
        <title>{{ $searchQuery }}</title>
        <meta name="description" content="{{ $searchQuery }}" />
        <meta name="keywords" content="{{ $searchQuery }}" />
        <link rel="canonical" href="{{ URL('') }}" />
    </x-slot>


    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6  lg:max-w-7xl lg:px-8">

            <h2 class="mt-5 md:mt-0 text-2xl font-bold tracking-tight text-gray-900">{{ $searchQuery ?? '' }}</h2>
            
            @if(!$products->count())
                <h2 class="mt-5 text-center text-2xl font-bold tracking-tight text-gray-900">Sorry ! No Results Found !</h2>
            @endif 

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
                                <p class="text-sm font-medium whitespace-nowrap text-gray-900">$ {{ $product->salePrice() }}</p>
                                @if($product->hasDiscount())
                                    <del>
                                        <p class="text-xs whitespace-nowrap text-gray-500">$ {{ $product->regularPrice() }}</p>
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
    </div>
</x-front.master-layout>
