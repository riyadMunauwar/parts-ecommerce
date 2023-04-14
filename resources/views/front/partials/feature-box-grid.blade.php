
@php 
    $featureBoxs = \App\Models\FeatureBox::where('is_published', true)->get();
@endphp

<section>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
        <!-- Card -->
        @foreach($featureBoxs ?? [] as $box)
            <div class="{{ $loop->index + 1 > 2  ? 'col-span-2' : ''}} bg-gray-50 flex-col items-center justify-center">
                <div class="text-center p-5">
                    <p class="mb-3">{{ $box->sup_title ?? '' }}</p>
                    <h3 class="text-3xl font-bold">{{ $box->title ?? '' }}</h3>
                    <p class="mb-3 text-sm">{{ $box->sub_title ?? '' }}</p>
                    <a href="{{ $box->button_link ?? '' }}">{{ $box->button_text ?? '' }}</a>
                </div>
                <div>
                    <img class="block w-full" src="{{ $box->image ?? '' }}" alt="{{ $box->title ?? '' }}">
                </div>
            </div>
        @endforeach
    </div>
</section>