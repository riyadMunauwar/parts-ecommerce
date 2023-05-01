<div class="flex flex-col justify-center mx-auto mt-10 space-y-3 md:space-y-0 md:flex-row">
    <input wire:model.debounce="email" id="email" type="email" class="px-4 py-2 text-gray-700 bg-white border rounded-md focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300" placeholder="Email Address" required>

    <button wire:click="addNewSubscriber" type="button" class="w-full px-6 py-2.5 text-sm font-medium tracking-wider primary-text transition-colors duration-300 transform md:w-auto md:mx-4 focus:outline-none primary-bg primary-text rounded-lg secondary-hover-text secondary-hover-bg focus:ring focus:ring-gray-300 focus:ring-opacity-80">
        Subscribe
    </button>
</div>