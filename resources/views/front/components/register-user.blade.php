<div>
    @if($isRegisterModeOn)
    <x-ui.edit-modal class="max-w-xl">
        <div class="p-5 md:p-10 bg-white rounded-md">

            <h5 class="text-xl font-bold dark:text-white">
                @if($isAlreadyHaveAnAccount)
                    Login
                @else 
                   Register an account
                @endif
            </h5>

            <x-validation-errors class="mb-4" />

            <div class="grid grid-cols-1 gap-5 mt-5">

                @if(!$isAlreadyHaveAnAccount)
                <div>
                    <div class="flex gap-1">
                        <x-label  for="name" value="{{ __('Name') }}" />
                    </div>
                    <x-input wire:model.debounce="name" id="name" class="block mt-1 w-full" type="text" required />
                </div>
                @endif

                <div>
                    <div class="flex gap-1">
                        <x-label  for="email" value="{{ __('Email') }}" />
                    </div>
                    <x-input wire:model.debounce="email" id="email" class="block mt-1 w-full" type="email" required />
                </div>

                <div>
                    <div class="flex gap-1">
                        <x-label  for="password" value="{{ __('Password') }}" />
                    </div>
                    <x-input wire:model.debounce="password" id="password" class="block mt-1 w-full" type="password" required />
                </div>

                @if(!$isAlreadyHaveAnAccount)
                <div>
                    <div class="flex gap-1">
                        <x-label  for="confirm" value="{{ __('Confirm') }}" />
                    </div>
                    <x-input wire:model.debounce="confirm" id="confirm" class="block mt-1 w-full" type="password" required />
                </div>
                @endif
               

                <div class="mt-2">
                    @if($isAlreadyHaveAnAccount)
                        <button wire:click.debounce="toggleAlreadyHaveAccountMode" class="underline" type="button">
                            Create an account
                        </button>
                    @else 
                        <button wire:click.debounce="toggleAlreadyHaveAccountMode" class="underline" type="button">
                            Already registered?
                        </button>
                    @endif
                </div>

                <div class="flex items-center justify-end">
                    <x-button wire:click.debounce="registerUser" type="button" class="ml-4">
                        {{ __('Next') }}
                    </x-button>
                    <x-button wire:click.debounce="cancelRegisterMode" type="button" class="ml-4">
                        {{ __('Cancel') }}
                    </x-button>
                </div>
            </div>
            <x-ui.loading-spinner wire:loading.flex wire:target="cancelRegisterMode, registerUser, toggleAlreadyHaveAccountMode" />
        </div>
    </x-ui.edit-modal>
    @endif
</div>
