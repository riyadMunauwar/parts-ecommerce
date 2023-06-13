<x-front.master-layout>

    <x-slot name="meta_data">
        <title>Dashboard | MobileComusa</title>
        <link rel="canonical" href="{{ URL('') }}" />
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-6 bg-white">
        <div class="max-w-70">
            @include('front.partials.user-dashboard-side-navigation')
        </div>

        <div class="col-span-5 border-l">
            <livewire:front.user.order-stats/>
        </div>
    </div>
</x-front.master-layout>