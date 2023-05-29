<section class="hidden md:block bg-white py-5 px-5">
    <div class="max-w-7xl mx-auto flex gap-5 justify-between">
        <div class="flex gap-3 items-center justify-center flex-1 border-r">
            <img class="w-14 h-14 object-contain" src="{{ config('setting')->sellingFeatureColumnOneIcon()  }}" alt="">
            <h1 class="text-sm font-extrabold text-gray-900">{{ config('setting')->selling_feature_column_1 ?? '' }}</h1>
        </div>

        <div class="flex gap-3 items-center justify-center flex-1 border-r">
            <img class="w-14 h-14 object-contain" src="{{ config('setting')->sellingFeatureColumnTwoIcon() }}" alt="">
            <h1 class="text-sm font-extrabold text-gray-900">{{ config('setting')->selling_feature_column_2 ?? '' }}</h1>
        </div>

        <div class="flex gap-3 items-center justify-center flex-1 border-r">
            <img class="w-14 h-14 object-contain" src="{{ config('setting')->sellingFeatureColumnThreeIcon()  }}" alt="">
            <h1 class="text-sm font-extrabold text-gray-900">{{ config('setting')->selling_feature_column_3 ?? '' }}</h1>
        </div>

        <div class="flex gap-3 items-center justify-center flex-1">
            <img class="w-14 h-14 object-contain" src="{{ config('setting')->sellingFeatureColumnFourIcon()  }}" alt="">
            <h1 class="text-sm font-extrabold text-gray-900">{{ config('setting')->selling_feature_column_4 ?? '' }}</h1>
        </div>
    </div>
</section>