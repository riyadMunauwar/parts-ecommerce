<div>
    @if($isPaymentModeOn)
    <x-ui.edit-modal class="max-w-xl">
        <div class="p-5 md:p-10 bg-white rounded-md">

            <h5 class="text-xl font-bold dark:text-white">
                Pay
            </h5>

            <x-validation-errors class="mb-4" />

            <div class="grid grid-cols-1 gap-5 mt-5">



                <div>
                    <div class="flex gap-1">
                        <x-label  for="email" value="{{ __('Email') }}" />
                    </div>
                    <x-input wire:model.debounce="email" id="email" class="block mt-1 w-full" type="email" required />
                </div>

                <div class="flex items-center justify-end">
                    <x-button wire:click.debounce="pay" type="button" class="ml-4">
                        {{ __('Payment') }}
                    </x-button>
                    <x-button wire:click.debounce="cancelPaymentMode" type="button" class="ml-4">
                        {{ __('Cancel') }}
                    </x-button>
                </div>
            </div>
            <x-ui.loading-spinner wire:loading.flex wire:target="cancelPaymentMode" />
        </div>
    </x-ui.edit-modal>
    @endif
</div>
