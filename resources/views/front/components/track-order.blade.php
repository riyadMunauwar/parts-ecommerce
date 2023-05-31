<section class="relative flex flex-wrap lg:h-screen lg:items-center bg-white">
  <div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
    <div class="mx-auto max-w-lg text-center">
      <h1 class="text-2xl font-bold sm:text-3xl">Track Your Order</h1>

      <p class="mt-4 text-gray-500">
        Please enter your Order ID in the provided field and click the "Track Order" button to initiate the tracking process
      </p>


    </div>

    <x-validation-errors class="mb-4 mt-4" />


    <form wire:submit.prevent="trackOrder" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
      <div>
        <label for="email" class="sr-only">Your order ID</label>

        <div class="relative">
          <input
            wire:model.debounce="order_id"
            type="number"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
            placeholder="Your Order ID"
          />
        </div>
      </div>


      <div class="flex items-center justify-end">
        <button
          type="submit"
          class="inline-block rounded-lg bg-gray-900 px-5 py-3 text-sm font-medium text-white"
        >
          Track Order
        </button>
      </div>
    </form>
  </div>

  <div class="relative h-64 w-full sm:h-96 lg:h-full lg:w-1/2">
    <img
      alt="Welcome"
      src="{{ asset('assets/images/track-order-fedex.jpg') }}"
      class="absolute inset-0 h-full w-full object-cover"
    />
  </div>

  <x-ui.loading-spinner wire:loading.flex wire:target="trackOrder" />

</section>