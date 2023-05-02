<x-front.master-layout>

    <x-slot name="meta_data">
        <title>{{ $product->name ?? '' }}</title>
        <meta name="description" content="{{ $product->meta_title ?? $product->description ?? '' }}" />
        <meta name="keywords" content="{{ $product->meta_tags ?? '' }}" />
        <link rel="canonical" href="{{ URL('') }}" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $product->meta_title ?? $product->name ?? '' }}" />
        <meta property="og:description" content="{{ $product->meta_description ?? $product->description ?? '' }}" />
        <meta property="og:url" content="{{ URL('') }}" />
        <meta property="og:site_name" content="{{ config('setting')->website_name ?? '' }}" />
        <meta property="article:modified_time" content="{{ $product->updated_at ?? '' }}" />
        <meta property="og:image" content="{{ $product->thumbnailUrl() }}" />
        <meta property="og:image:width" content="470" />
        <meta property="og:image:height" content="82" />
        <meta property="og:image:type" content="image/png" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:label1" content="Est. reading time" />
        <meta name="twitter:data1" content="3 minutes" />
    </x-slot>


    <livewire:front.single-product :productId="$productId" />

</x-front.master-layout>
