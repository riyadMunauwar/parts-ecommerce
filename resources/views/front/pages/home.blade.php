<x-front.master-layout >
   <x-slot name="meta_data">
        <title>{{ config('setting')->meta_title ?? '' }}</title>
        <meta name="description" content="{{ config('setting')->meta_description ?? '' }}" />
        <meta name="keywords" content="{{ config('setting')->meta_tags ?? '' }}" />
        <link rel="canonical" href="{{ URL('') }}" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ config('setting')->meta_title ?? '' }}" />
        <meta property="og:description" content="{{ config('setting')->meta_description ?? '' }}" />
        <meta property="og:url" content="{{ URL('') }}" />
        <meta property="og:site_name" content="{{ config('setting')->website_name ?? '' }}" />
        <meta property="article:modified_time" content="{{ config('setting')->updated_at ?? '' }}" />
        <meta property="og:image" content="{{ config('setting')->logoUrl() ?? '' }}" />
        <meta property="og:image:width" content="470" />
        <meta property="og:image:height" content="82" />
        <meta property="og:image:type" content="image/png" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:label1" content="Est. reading time" />
        <meta name="twitter:data1" content="3 minutes" />
    </x-slot>

   @include('front.partials.caurosel')
   @include('front.partials.selling-feature')
   @include('front.partials.feature-box-grid')
   <livewire:front.contact-form />
</x-front.master-layout>
