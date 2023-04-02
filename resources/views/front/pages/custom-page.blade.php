<x-front.master-layout :title="$page->name">
    <section class="container mx-auto px-8 md:mt-5 md:mb-5 bg-white py-12">
        {!! $page->content ?? '' !!}
    </section>
</x-front.master-layout>