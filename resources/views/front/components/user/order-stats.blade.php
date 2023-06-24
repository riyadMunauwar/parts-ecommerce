<section class="bg-white rounded-sm">
  <div class="mx-auto max-w-screen-xl px-4 py-6  lg:px-8">

    <div>
      <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">

        <div class="flex flex-col rounded-lg bg-blue-100 px-4 py-8 text-center">
          <dt class="order-last text-lg uppercase font-medium text-gray-500">
            Order Placed
          </dt>

          <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">{{ number_format($totalOrderPlaced) }}</dd>
        </div>

        <div class="flex flex-col rounded-lg bg-blue-100 px-4 py-8 text-center">
          <dt class="order-last uppercase text-lg font-medium text-gray-500">
            Total Amount Spend
          </dt>

          <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">
            ${{ number_format($totalAmountSpent) }}
          </dd>
        </div>

        <div class="flex flex-col rounded-lg bg-blue-100 px-4 py-8 text-center">
          <dt class="order-last text-lg uppercase font-medium text-gray-500">
            Due Amount
          </dt>

          <dd class="text-4xl font-extrabold text-blue-600 md:text-5xl">${{ number_format($totalAmountDue) }}</dd>
        </div>
      </dl>
    </div>
  </div>
</section>