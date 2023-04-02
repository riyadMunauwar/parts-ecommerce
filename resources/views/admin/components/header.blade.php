<div class="rounded-md p-5 bg-white">
    <h1>Header Message Setup</h1>
    <div>
        <div>
            <x-label  for="name" value="{{ __('Name') }}" />
            <x-input wire:model.debounce="name" id="name" class="block mt-1 w-full" type="text" required />
        </div>
    </div>
</div>