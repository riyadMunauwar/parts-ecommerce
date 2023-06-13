<x-front.master-layout>

    <x-slot name="meta_data">
        <title>Profile | MobileComusa</title>
        <link rel="canonical" href="{{ URL('') }}" />
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-6 bg-white">
        <div class="max-w-70">
            @include('front.partials.user-dashboard-side-navigation')
        </div>

        <div class="col-span-5 border-l">
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')

                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>

                    <x-section-border />
                @endif

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())

                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-front.master-layout>