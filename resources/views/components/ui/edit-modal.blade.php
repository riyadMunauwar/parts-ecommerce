<div style="background-color: rgba(0, 0, 0, .4)" class="fixed z-50 inset-0 w-full h-full overflow-y-auto">
    <div {!! $attributes->merge(['class' => 'mx-auto md:my-20 max-w-3xl']) !!}>
        {{ $slot }}
    </div>
</div>
