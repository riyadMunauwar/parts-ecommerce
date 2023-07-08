<section class="bg-white mx-auto max-w-screen-xl rounded-md p-5">
    <h1>Order list</h1>
    <div class="">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative z-20 overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/3">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full mt-5">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.debounce.350ms="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 h-8 text-gray-900 text-sm rounded-md focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-2/3">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div>
                            <x-label for="from_date" value="{{ __('From') }}" />
                            <x-input wire:model.debounce="from_date" id="from_date"  class="h-8 bg-gray-50 mt-1 w-full" type="date" />
                        </div>

                        <div>
                            <x-label for="to_date" value="{{ __('To') }}" />
                            <x-input wire:model.debounce="to_date" id="to_date"  class="block bg-gray-50 h-8 mt-1 w-full" type="date" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto z-20 mt-7">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Order No.</th>
                            <th scope="col" class="px-4 py-3 text-center">Order Date</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Total</th>
                            <th scope="col" class="px-4 py-3">Items</th>
                            <th scope="col" class="px-4 py-3">Qty</th>
                            <th scope="col" class="px-4 py-3 text-center">Invoice</th>
                            <th scope="col" class="px-4 py-3 text-center">Track Parcel</th>
                            <th scope="col" class="px-4 py-3 text-center">Tracking No.</th>
                            <th scope="col" class="px-4 py-3 text-center">Parcel No.</th>
                            <th scope="col" class="px-4 py-3 text-center">Return/Refund</th>
                            
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @foreach($orders ?? [] as $order)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{ $order->id ?? '' }}
                            </th>
                            <td class="px-4 py-1">
                                {{ $order->order_date->format('d M y') }}
                                </br>
                                <span class="text-xs">{{ $order->order_date->diffForHumans() }}</span>
                            </td>
                            <td class="px-4 py-1">
                                @if($order->status === 'Canceled' || $order->status === 'Refunded')
                                    <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $order->status ?? '' }}</span>
                                @elseif($order->status === 'Payment Pending' || $order->status  === 'Pending')
                                    <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $order->status ?? '' }}</span>
                                @else 
                                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $order->status ?? 'Paid' }}</span>
                                @endif
                            </td>
                            <td class="px-4 py-1">
                                ${{ number_format($order->total_price ?? 0) }}
                            </td>
                            <td class="px-4 py-1">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $order->order_items_count ?? '' }}</span>
                            </td>
                            <td class="px-4 py-1">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $order->orderItems->sum('qty') ?? 0 }}</span>
                            </td>
                            <td class="px-4 py-1">
                                <a href="{{ route('invoice', ['orderId' => $order->id ]) }}" target="_blank" class="text-blue-500 font-semibold underline">Print</a>
                            </td>
                            <td class="px-4 py-1">
                                @if($order->tracking_url)
                                    <a href="{{ $order->tracking_url }}" target="_blank" class="text-blue-500 font-semibold underline">Track</a>
                                @else 
                                    <a  class="text-blue-500 font-semibold">---</a>
                                @endif
                            </td>
                            <td class="px-4 py-1">
                                {{ $order->tracking_number ?? '---'}}
                            </td>
                            <td class="px-4 py-1">
                                {{ $order->parcel_id ?? '---' }}
                            </td>
                            <td class="px-4 py-1">
                                @if($order->status === 'Paid' && $order->order_date->diffInDays() <= 7)
                                    <a href="{{ route('return-apply', ['orderId' => $order->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Return</a>
                                @else 
                                    <span class="text-xs">7 days exceed</span>
                                @endif
                            </td> 
                            <td class="px-4 py-1">
                                <div class="flex items-center gap-1 justify-end">
                                    <a href="{{ route('user-order-detail', ['orderId' => $order->id]) }}">
                                        <span class="text-blue-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <nav class="py-2 mt-5" aria-label="Table navigation">
                {{ $orders->links() }}
            </nav>
        </div>
    </div>
    <x-ui.loading-spinner wire:loading.flex wire:target="search, status, to_date, enableAddStockModal, confirmDeleteProduct, deleteProduct, enableProductEditMode, showVariationList" />
</section>
