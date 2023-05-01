<x-front.master-layout >

    <x-slot name="meta_data">
        <title>{{ $page->name ?? '' }}</title>
        <meta name="description" content="I try to document as much of my professional life as possible here. Visit my website to know more about my businesses, what I do &amp; to consume my content." />
        <link rel="canonical" href="https://khalidfarhan.com/" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Khalid Farhan - Marketer, Content Creator, Business Operator" />
        <meta property="og:description" content="I try to document as much of my professional life as possible here. Visit my website to know more about my businesses, what I do &amp; to consume my content." />
        <meta property="og:url" content="https://khalidfarhan.com/" />
        <meta property="og:site_name" content="KHALID FARHAN" />
        <meta property="article:modified_time" content="2023-03-06T16:18:12+00:00" />
        <meta property="og:image" content="https://khalidfarhan.com/wp-content/uploads/2022/02/Screenshot-2022-02-06-at-22.24.50.png" />
        <meta property="og:image:width" content="470" />
        <meta property="og:image:height" content="82" />
        <meta property="og:image:type" content="image/png" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:label1" content="Est. reading time" />
        <meta name="twitter:data1" content="3 minutes" />
    </x-slot>

    <section class="container mx-auto px-8 md:mt-5 md:mb-5 bg-white py-12">
        {!! $page->content ?? '' !!}
    </section>
</x-front.master-layout>