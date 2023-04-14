<div>
    <section class="hidden md:block">
        <div class="container mx-auto">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Home
                        </a>
                    </li>
                    @if($category->parent)
                        @foreach($category->parents ?? [] as $parent)
                            <li>
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ route('category-product', ['categoryId' => $parent->id, 'categorySlug' => $parent->slug]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $parent->name ?? '' }}</a>
                                </div>
                            </li>
                        @endforeach
                        <li>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ route('category-product', ['categoryId' => $category->id, 'categorySlug' => $category->slug]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $category->name ?? '' }}</a>
                            </div>
                        </li>
                    @else 
                        <li>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                <a href="{{ route('category-product', ['categoryId' => $category->id, 'categorySlug' => $category->slug]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $category->name ?? '' }}</a>
                            </div>
                        </li>
                    @endif
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $product->name ?? '' }}</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="py-6 md:py-12 bg-white">
        <div class="container mx-auto max-w-6xl p-5">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-5">

                <div class="col-span-2">
                    <div class="relative pb-[100%]">
                        <img class="block absolute inset-0 w-full h-full object-cover rounded-md" src="{{ $thumbnail ?? '' }}" alt="{{ $product->name ?? '' }}">
                        <div wire:loading wire:target="changeThumbnail" style="background-color: rgba(0, 0, 0, .8)" class="absolute inset-0 w-full h-full rounded-md">
                            <p class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 text-white">Loading...</p>
                        </div>
                    </div>
                    <div class="mt-8 flex gap-2">
                        <div wire:click="changeThumbnail('{{ $product->thumbnailUrl() }}')" class="cursor-pointer border rounded-md">
                            <img class="w-20 h-20 rounded-md object-cover" src="{{ $product->thumbnailUrl() }}" alt="">
                        </div>
                        @foreach($product->getMedia('gallery') ?? [] as $media)
                            <div wire:click="changeThumbnail('{{ $media->getUrl() }}')" class="cursor-pointer border rounded-md">
                                <img class="w-20 h-20 rounded-md object-cover" src="{{ $media->getUrl() }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-span-3">
                    <h2 class="text-3xl font-bold dark:text-white">{{ $product->name ?? '' }}</h2>
                    <div class="border-t border-b border-gray-300 py-3 mt-5">
                        <div class="flex justify-between" >
                            <div>
                                <h2 class="text-2xl font-extrabold dark:text-white">$ {{ $product->salePrice() }}</h2>
                                @if($product->hasDiscount())
                                    <p>
                                        <del>{{ $product->regularPrice() }}</del>
                                    </p>
                                @endif
                            </div>
                            <div>
                                <p class="text-sm tracking-wide ">{{ $product->sku ?? '' }}</p>
                                @if($product->stock_qty > 0)
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
                                @else 
                                    <p class="text-xs tracking-wide flex gap-2 mt-3">
                                        <span class="text-amber-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg>
                                        </span>

                                        <span>
                                            Out of Stock
                                        </span>
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h1 class="mb-2">Quantity</h1>

                        <div class="flex">
                            <div class="flex items-center justify-center">
                                <button wire:click.debounce="decrementQty" type="button" class="inline-flex items-center p-1 border border-transparent rounded-sm font-semibold text-xs uppercase tracking-widest primary-bg primary-text secondary-hover-bg secondary-hover-text  focus:outline-none focus:ring-0ransition ease-in-out duration-150">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                        </svg>
                                    </span>
                                </button>

                            
                                <input wire:model.debounce.350ms="qty" class="block h-9 w-20 px-1 border-gray-300 focus:border-gray-300 focus:ring-gray-300 rounded-sm shadow-sm" type="number" />
                            

                                <button wire:click.debounce="incrementQty" type="button" class="inline-flex items-center p-1 b border border-transparent rounded-sm font-semibold text-xs uppercase tracking-widest primary-bg primary-text secondary-hover-bg secondary-hover-text  focus:outline-none focus:ring-0 transition ease-in-out duration-150">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 border-b border-t py-4">
                        <h1 class="mb-5 text-xl">Recommendation Tools</h1>
                        <div>
                            @foreach($recommendationProducts ?? [] as $item)
                                <div class="flex gap-6 max-w-md mb-3">
                                    <img class="block rounded-md w-14 h-14 object-cover" src="{{ $item->thumbnailUrl() }}" alt="{{ $product->name ?? '' }}">
                                    <div class="flex-grow">
                                        <a href="{{ route('single-product', ['productId' => $item->id, 'productSlug' => $item->slug]) }}">
                                            <p class="text-md">{{ $item->name ?? '' }}</p>
                                        </a>
                                        <div class="flex justify-between mt-1">
                                            <div class="flex gap-2">
                                                <p>$ {{ $item->salePrice() }}</p>
                                                <p class="text-xs"><del>$ {{ $product->regularPrice() }}</del></p>
                                            </div>
                                            <button wire:click.debounce="addToCartRecommendationItem({{ $item->id }})" type="button" class="inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-sm font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                                    Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-start mt-5">
                        <x-button wire:click.debounce="addToCart" type="button" class="">
                            {{ __('ADD TO CART') }}
                        </x-button>
                    </div>
                </div>
            </div>


            <!-- Details -->
            <div class="mt-10">
                <div x-data="{isOpen: false}" class="mb-2 border-b" :class="isOpen ? 'border rounded-md' : ''">
                    <div @click="isOpen = !isOpen" :class="isOpen ? 'border-b' : ''"  class="flex items-center px-3 gap-2 py-2">
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
                    <div x-show="isOpen" x-transition class="md:p-6 p-3">
                        {!! $product->compatibility ?? '' !!}
                    </div>
                </div>

                <div x-data="{isOpen: false}" class="mb-2 border-b" :class="isOpen ? 'border rounded-md' : ''">
                    <div  @click="isOpen = !isOpen" :class="isOpen ? 'border-b' : ''" class="flex items-center px-3 gap-2 py-2">
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
                    <div x-show="isOpen" x-transition class="md:p-6 p-3">
                        {!! $product->features ?? '' !!}
                    </div>
                </div>

                <div x-data="{isOpen: false}" class="mb-2 border-b" :class="isOpen ? 'border rounded-md' : ''">
                    <div @click="isOpen = !isOpen" :class="isOpen ? 'border-b' : ''"  class="flex items-center gap-2 px-3 py-2">
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
                    <div x-show="isOpen" x-transition class="md:p-6 p-3">
                        {!! $product->description ?? '' !!}
                    </div>
                </div>

                @if($product->youtube_video_url && $product->youtube_video_id)
                    <div x-data="{isOpen: false}" class="mb-2 border-b" :class="isOpen ? 'border rounded-md' : ''">
                        <div @click="isOpen = !isOpen" :class="isOpen ? 'border-b' : ''" class="flex items-center gap-2 px-3 py-2">
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

                            <h1 class="cursor-pointer">Guide</h1>
                        </div>
                        <div x-show="isOpen" x-transition class="md:p-6 p-3">
                            <div class="relative h-0 pb-[56.25%]">
                                <iframe class="absolute inset-0 w-full h-full" width="560" height="315" allowfullscreen src="https://www.youtube.com/embed/klTvEwg3oJ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </divx-show=>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <x-ui.loading-spinner wire:loading.flex wire:target="addToCartRecommendationItem, decrementQty, incrementQty, addToCart" />
</div>