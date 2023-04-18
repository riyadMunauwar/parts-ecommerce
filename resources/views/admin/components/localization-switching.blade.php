<div>
    <div class="block">
        <label for="locale" class="flex items-center">
            <x-ui.radio wire:model.debounce="locale" value="en" id="locale" name="locale" />
            <span class="ml-2 text-sm text-gray-600">{{ __('English') }}</span>
        </label>
    </div>
    <div class="block mt-1">
        <label for="locale" class="flex items-center">
            <x-ui.radio wire:model.debounce="locale" value="es" id="locale" name="locale" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Spanish') }}</span>
        </label>
    </div>
</div>