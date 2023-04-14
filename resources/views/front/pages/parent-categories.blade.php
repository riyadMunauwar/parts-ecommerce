<x-front.master-layout meta_title="All categories">

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
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="{{ route('parent-category') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">All</a>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-8 sm:px-6  lg:max-w-7xl lg:px-8">
        
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">All Categories</h2>
            

            <div class="mt-6 grid grid-cols-3 gap-x-6 gap-y-10 sm:grid-cols-4 lg:grid-cols-8 xl:gap-x-8">
            
                @foreach($categories as $category)
                    <div>
                        <a href="{{ route('category-product', ['categoryId' => $category->id, 'categorySlug' => $category->slug]) }}">
                            <div class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-nonelg:h-80">
                                <img  src="{{ $category->icon }}" alt="{{ $category->name ?? '' }}" class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                        </a>


                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    <a href="{{ route('category-product', ['categoryId' => $category->id, 'categorySlug' => $category->slug]) }}">
                                        {{ $category->name ?? '' }}
                                    </a>
                                </h3>
                            </div>

                        </div>

    
                    </div>
                @endforeach
            </div>

            <div class="py-4">
                {{ $categories->links() }}
            </div>
        </div>
        <x-ui.loading-spinner wire:loading.flex wire:target="order_by, sort_by, show" />
    </div>
</div>

</x-front.master-layout>
