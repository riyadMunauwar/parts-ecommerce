<div class="bg-white rounded-sm p-5">

    <h4 class="text-2xl font-bold border-b pb-3 mt-10">Order & Address Information</h4>

    <div class="grid grid-cols-2 mt-5">
        <div>
            <h5 class="text-xl font-bold">Account Information</h5>

            <div class="grid grid-cols-3 mt-4">
                <h6 class="grid-cols-1 text-md text-gray-600">Customer Name</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->user->name ?? '' }}</h6>
            </div>

            <div class="grid grid-cols-3 mt-2">
                <h6 class="grid-cols-1 text-md text-gray-600">Customer Email</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->user->email ?? '' }}</h6>
            </div>
        </div>
        <div>
            <h5 class="text-xl font-bold">Shipping Address</h5>
            <div class="grid grid-cols-3 mt-4">
                <h6 class="grid-cols-1 text-md text-gray-600">Name</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->address->full_name ?? '' }}</h6>
            </div>

            <div class="grid grid-cols-3 mt-2">
                <h6 class="grid-cols-1 text-md text-gray-600">Email</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->address->email ?? '' }}</h6>
            </div>

            <div class="grid grid-cols-3 mt-2">
                <h6 class="grid-cols-1 text-md text-gray-600">Phone</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->address->phone ?? '' }}</h6>
            </div>

            <div class="grid grid-cols-3 mt-2">
                <h6 class="grid-cols-1 text-md text-gray-600">Street 1</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->address->street_1 ?? '' }}</h6>
            </div>

            <div class="grid grid-cols-3 mt-2">
                <h6 class="grid-cols-1 text-md text-gray-600">Street 2</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->address->street_2 ?? '' }}</h6>
            </div>


            <div class="grid grid-cols-3 mt-2">
                <h6 class="grid-cols-1 text-md text-gray-600">City</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->address->city ?? '' }}</h6>
            </div>

            <div class="grid grid-cols-3 mt-2">
                <h6 class="grid-cols-1 text-md text-gray-600">State</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->address->state ?? '' }}</h6>
            </div>

            <div class="grid grid-cols-3 mt-2">
                <h6 class="grid-cols-1 text-md text-gray-600">Zip Code</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->address->zip ?? '' }}</h6>
            </div>

            <div class="grid grid-cols-3 mt-2">
                <h6 class="grid-cols-1 text-md text-gray-600">Country</h6>
                <h6 class="grid-cols-2 text-md font-semibold text-gray-900">{{ $order->address->country ?? ''}}</h6>
            </div>
        </div>
    </div>

    <h4 class="text-2xl font-bold border-b pb-3 mt-10">Items Orderd</h4>

    <div class="overflow-x-auto z-20 mt-3 pb-20">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-4 py-3">Image</th>
                    <th scope="col" class="px-4 py-3">Product</th>
                    <th scope="col" class="px-4 py-3">Unit Price</th>
                    <th scope="col" class="px-4 py-3">Order Qty</th>
                    <th scope="col" class="px-4 py-3">Stock Qty</th>
                    <th scope="col" class="px-4 py-3">Line Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems ?? [] as $orderItem)
                    <tr class="border-b dark:border-gray-700">
                        <th scope="row" class="px-4 whaitespace-nowrap w-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-6 h-6" src="{{ $orderItem->product->thumbnailUrl() }}" alt="">
                        </th>
                        <td class="px-4 py-1 whaitespace-nowrap">{{ $orderItem->product->name ?? '' }}</td>
                        <td class="px-4 py-1 whaitespace-nowrap">{{ number_format($orderItem->price ?? 0) }}</td>
                        <td class="px-4 py-1 whaitespace-nowrap">{{ number_format($orderItem->qty ?? 0) }}</td>
                        <td class="px-4 py-1 whaitespace-nowrap">{{ number_format($orderItem->product->stock_qty ?? 0) }}</td>
                        <td class="px-4 py-1 whaitespace-nowrap">{{ number_format($orderItem->qty * $orderItem->price) }}</td>
                    </tr>
                @endforeach
                    <tr>
                        <th scope="row" class="px-4 whaitespace-nowrap w-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap">
                            <h5 class="text-md mt-5">Sub Total</h5>
                        </td>
                        <td class="px-4 py-1 whaitespace-nowrap">
                            <h5 class="text-md mt-5">{{ number_format($orderSubtotalPrice) }}</h5>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="px-4 whaitespace-nowrap w-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap">
                            <h5 class="text-md mt-2">Shipping Charge</h5>
                        </td>
                        <td class="px-4 py-1 whaitespace-nowrap">
                            <h5 class="text-md mt-2">{{ number_format($order->shipping_cost) }}</h5>
                        </td>
                    </tr>
                    <tr class="">
                        <th scope="row" class="px-4 whaitespace-nowrap w-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 border-b py-1 whaitespace-nowrap">
                            <h5 class="text-md mt-2">Vat/Tax</h5>
                        </td>
                        <td class="px-4 border-b py-1 whaitespace-nowrap">
                            <h5 class="text-md mt-2">{{ number_format($order->total_vat) }}</h5>
                        </td>
                    </tr>
                    <tr class="">
                        <th scope="row" class="px-4 whaitespace-nowrap w-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 border-b py-1 whaitespace-nowrap">
                            <h5 class="text-md mt-2">Coupon Discount</h5>
                        </td>
                        <td class="px-4 border-b py-1 whaitespace-nowrap">
                            <h5 class="text-md mt-2">{{ number_format($order->coupon_discount ?? 0) }}</h5>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="px-4 whaitespace-nowrap w-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap"></td>
                        <td class="px-4 py-1 whaitespace-nowrap">
                            <h5 class="text-xl font-bold mt-2">Total</h5>
                        </td>
                        <td class="px-4 py-1 whaitespace-nowrap">
                            <h5 class="text-xl font-bold mt-2">{{ number_format($order->totalPrice()) }}</h5>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>