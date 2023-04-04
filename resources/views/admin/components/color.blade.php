<div class="rounded-md p-5 md:p-7 bg-white">
    <h1 class="uppercase">Website color setup</h1>
    <div class="mt-5 grid grid-cols-1 md:grid-cols-2 md:gap-5">
        <div>
            <x-label class="mb-1 block" for="primaryColor" value="{{ __('Primary Color') }}" />
            <x-input wire:model.debounce="setting.primary_color" id="primaryColor" class="coloris h-8  block mt-1 w-full" type="text" />
        </div>

        <div>
            <x-label class="mb-1 block" for="secondaryColor" value="{{ __('Secondary Color') }}" />
            <x-input wire:model.debounce="setting.secondary_color"  id="secondaryColor" class="coloris h-8  block mt-1 w-full" type="text" />
        </div>

        <div>
            <x-label class="mb-1 block" for="primaryText" value="{{ __('Primary Text') }}" />
            <x-input wire:model.debounce="setting.primary_text_color" id="primaryText" class="coloris h-8  block mt-1 w-full" type="text" />
        </div>


        <div>
            <x-label class="mb-1 block" for="secondarText" value="{{ __('Secondary Text') }}" />
            <x-input wire:model.debounce="setting.secondary_text_color" id="secondarText" class="coloris h-8  block mt-1 w-full" type="text" />
        </div>
    </div>


    <h1 class="mt-5 uppercase">Header color setup</h1>

    <div class="mt-3 grid grid-cols-1 md:grid-cols-2 md:gap-5">
        <div>
            <x-label class="mb-1 block" for="top_bg" value="{{ __('Top Header Background Color') }}" />
            <x-input wire:model.debounce="setting.top_header_bg_color" id="top_bg" class="coloris h-8  block mt-1 w-full" type="text" />
        </div>

        <div>
            <x-label class="mb-1 block" for="top_text" value="{{ __('Top Header Text Color') }}" />
            <x-input wire:model.debounce="setting.top_header_text_color" id="top_text" class="coloris h-8 block mt-1 w-full" type="text" />
        </div>

        <div>
            <x-label class="mb-1 block" for="top_button_text" value="{{ __('Top Header Button Text') }}" />
            <x-input wire:model.debounce="setting.top_header_button_text_color" id="top_button_text" class="coloris h-8  block mt-1 w-full" type="text" />
        </div>

        <div>
            <x-label class="mb-1 block" for="mid_header_bg" value="{{ __('Middel Header Background Color') }}" />
            <x-input wire:model.debounce="setting.middle_header_bg_color" id="mid_header_bg" class="coloris h-8 block mt-1 w-full" type="text" />
        </div>

        <div>
            <x-label class="mb-1 block" for="mid_header_text" value="{{ __('Middle Header Text Color') }}" />
            <x-input wire:model.debounce="setting.middle_header_text_color" id="mid_header_text" class="coloris h-8 block mt-1 w-full" type="text" />
        </div>

        <div>
            <x-label class="mb-1 block" for="main_header_text" value="{{ __('Main Header Background Color') }}" />
            <x-input wire:model.debounce="setting.main_header_bg_color" id="main_header_text" class="coloris h-8 block mt-1 w-full" type="text" />
        </div>

        <div>
            <x-label class="mb-1 block" for="main_header_bg" value="{{ __('Main Header Text Color') }}" />
            <x-input wire:model.debounce="setting.main_header_text_color" id="main_header_bg" class="coloris h-8 block mt-1 w-full" type="text" />
        </div>

    </div>

    <h1 class="mt-5 uppercase">Footer color  setup</h1>
    <div class="mt-3 grid grid-cols-1 md:grid-cols-2 md:gap-5">
        <div>
            <x-label class="mb-1 block" for="footer_bg" value="{{ __('Footer Background Color') }}" />
            <x-input wire:model.debounce="setting.footer_bg_color" id="footer_bg" class="coloris h-8  block mt-1 w-full" type="text" />
        </div>

        <div>
            <x-label class="mb-1 block" for="footer_text" value="{{ __('Footer Text Color') }}" />
            <x-input wire:model.debounce="setting.footer_text_color" id="footer_text" class="coloris h-8 block mt-1 w-full" type="text" />
        </div>

    </div>
</div>

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/coloris/coloris.min.css') }}">
@endpush

@push('scripts')

<script type="text/javascript" src="{{ asset('assets/coloris/coloris.min.js') }}"></script>

<script>

    window.document.addEventListener('DOMContentLoaded', function () {

        init();

        window.addEventListener('init:coloris', function(){
            init();
        })

    });

    function init(){
        Coloris({
            el: '.coloris',
            swatches: [
                '#264653',
                '#2a9d8f',
                '#e9c46a',
                '#f4a261',
                '#e76f51',
                '#d62828',
                '#023e8a',
                '#0077b6',
                '#0096c7',
                '#00b4d8',
                '#48cae4',

                '#f9fafb',
                '#f3f4f6',
                '#e5e7eb',
                '#d1d5db',
                '#9ca3af',
                '#6b7280',
                '#4b5563',
                '#374151',
                '#1f2937',
                '#111827',

                '#fecaca',
                '#fca5a5',
                '#f87171',
                '#ef4444',
                '#dc2626',
                '#b91c1c',


                '#fed7aa',
                '#fdba74',
                '#fb923c',
                '#f97316',
                '#ea580c',
                '#c2410c',

                '#fde68a',
                '#fcd34d',
                '#fbbf24',
                '#f59e0b',
                '#d97706',
                '#b45309',


                '#84cc16',
                '#65a30d',

                '#22c55e',
                '#16a34a',

                '#10b981',
                '#059669',

                '#14b8a6',
                '#0891b2',

                '#0ea5e9',
                '#2563eb',

                '#3b82f6',
                '#2563eb',

                '#6366f1',
                '#4f46e5',

                '#8b5cf6',
                '#9333ea',

                '#d946ef',
                '#c026d3',

                '#ec4899',
                '#db2777',

                '#f43f5e',
                '#e11d48',
            ]
        });
    }

</script>
@endpush