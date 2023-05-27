<x-front.master-layout >

    <x-slot name="meta_data">
        <title>{{ $page->meta_title ?? $page->name ?? '' }}</title>
        <meta name="description" content="{{ $page->meta_description ?? '' }}" />
        <meta name="keywords" content="{{ $page->meta_tags ?? '' }}" />
        <link rel="canonical" href="{{ URL('') }}" />
        <meta property="og:url" content="{{ URL('') }}" />
        <meta property="og:site_name" content="{{ config('setting')->website_name ?? '' }}" />
        <meta property="article:modified_time" content="{{ $page->updated_at ?? '' }}" />
    </x-slot>

    <section class="container mx-auto px-8 md:mt-5 md:mb-5 bg-white py-12">
        {!! $page->content ?? '' !!}
    </section>
</x-front.master-layout>