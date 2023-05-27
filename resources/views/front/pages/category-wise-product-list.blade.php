<x-front.master-layout>

   <x-slot name="meta_data">
        <title>{{ $category->meta_title ?? $category->search_name ?? ''}}</title>
        <meta name="description" content="{{ $category->meta_description ?? $category->description ?? '' }}" />
        <meta name="keywords" content="{{ $category->meta_tags ?? '' }}" />

        <link rel="canonical" href="{{ URL('') }}" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $category->meta_title ?? $category->search_name ?? ''}}" />
        <meta property="og:description" content="{{ $category->meta_description ?? $category->description ?? '' }}" />
        <meta property="og:url" content="{{ URL('') }}" />
        <meta property="og:site_name" content="{{ config('setting')->website_name ?? '' }}" />
        <meta property="article:modified_time" content="{{ $category->updated_at ?? '' }}" />
        <meta property="og:image" content="{{ $category->icon ?? '' }}" />
        <meta property="og:image:width" content="470" />
        <meta property="og:image:height" content="82" />
        <meta property="og:image:type" content="image/png" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:label1" content="Est. reading time" />
        <meta name="twitter:data1" content="3 minutes" />
    </x-slot>


   <livewire:front.product-grid :categorySlug="$categorySlug" :categoryId="$categoryId" />
   
</x-front.master-layout>