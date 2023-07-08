<div class="max-w-2xl px-5 md:mx-auto mt-16 ">
    
    <h2 class="text-4xl font-extrabold dark:text-white">Order ID#{{ $orderId }}</h2>

    <x-validation-errors />

    <div class="mt-10">
        <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason</label>
        <textarea wire:model.debounce="reason" id="reason" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your reason here..."></textarea>
    </div>

    <div class="mt-5 flex justify-end">
        <x-button wire:click.debounce="handleSubmit" type="button">
            Submit
        </x-button>
    </div>
</div>