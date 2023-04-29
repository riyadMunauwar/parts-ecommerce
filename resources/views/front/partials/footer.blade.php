@php 
    $setting = \App\Models\Setting::first();
    $column_one_items = \App\Models\Footer::where('column_name', 'column_one')->get();
    $column_two_items = \App\Models\Footer::where('column_name', 'column_two')->get();
    $column_three_items = \App\Models\Footer::where('column_name', 'column_three')->get();
    $column_four_items = \App\Models\Footer::where('column_name', 'column_four')->get();
@endphp


<footer class="footer-bg footer-text">
    <div class="container px-6 py-8 mx-auto">
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div>
                <div class="text-md font-medium footer-text uppercase">
                    {{ $setting->footer_column_one_title ?? '' }}
                </div>

                @foreach($column_one_items ?? [] as $item)
                    <a href="{{ $item->menu_item_link ?? '' }}" class="block mt-5 text-sm font-medium footer-text duration-700">
                        {{ $item->menu_item_name ?? '' }}
                    </a>
                @endforeach

            </div>

            <div>
                <div class="text-md font-medium footer-text uppercase">
                    {{ $setting->footer_column_two_title ?? '' }}
                </div>

                @foreach($column_two_items ?? [] as $item)
                    <a href="{{ $item->menu_item_link ?? '' }}" class="block mt-5 text-sm font-medium footer-text duration-700">
                        {{ $item->menu_item_name ?? '' }}
                    </a>
                @endforeach

            </div>

            <div>
                <div class="text-md font-medium footer-text uppercase">
                    {{ $setting->footer_column_three_title ?? '' }}
                </div>

                @foreach($column_three_items ?? [] as $item)
                    <a href="{{ $item->menu_item_link ?? '' }}" class="block mt-5 text-sm font-medium footer-text duration-700">
                        {{ $item->menu_item_name ?? '' }}
                    </a>
                @endforeach

            </div>

            <div>
                <div class="text-md font-medium footer-text uppercase">
                    {{ $setting->footer_column_four_title ?? '' }}
                </div>

                @foreach($column_four_items ?? [] as $item)
                    <a href="{{ $item->menu_item_link ?? '' }}" class="block mt-5 text-sm font-medium footer-text duration-700">
                        {{ $item->menu_item_name ?? '' }}
                    </a>
                @endforeach

            </div>
        </div>


        <!-- Subscriber -->
        <livewire:store.subscribe />


        <hr class="my-10 footer-border">

        <div class="sm:flex sm:items-center sm:justify-between">
            <p class="text-sm footer-text">© Copyright {{ \Carbon\Carbon::now()->year }}. All Rights Reserved.</p>

            @php 

                $socialLinks = \App\Models\SocialLink::with('media')->where('is_published', true)->get();

            @endphp 

            <div class="flex mt-3 -mx-2 sm:mt-0">
                @foreach($socialLinks ?? [] as $link)
                    <a href="{{ $link->link ?? '' }}" target="_blank" class="mx-2 footer-text hover:text-gray-500" aria-label="Reddit">
                       <img class="block h-6 w-6 rounded-full" src="{{ $link->iconUrl('thumb-50') ?? '' }}" alt="{{ $icon->name ?? '' }}">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</footer>