<section class="bg-white mx-auto max-w-screen-xl rounded-md p-5">
    <h1>Customer list</h1>
    <div class="">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative z-20 overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.debounce.350ms="search" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
            </div>
            <div class="overflow-x-auto z-20">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Image</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Discount</th>
                            <th scope="col" class="px-4 py-3">Ordered</th>
                            <th scope="col" class="px-4 py-3">Type</th>
                            <th scope="col" class="px-4 py-3">Change</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers ?? [] as $customer)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-8 h-8 border rounded-full object-cover" src="{{ $customer->profile_photo_url ?? '' }}" alt="{{ $customer->name ?? '' }}">
                            </th>

                            <td class="px-4 py-1">
                                {{ $customer->name ?? '' }}
                            </td>

                            <td class="px-4 py-1">
                                {{ $customer->email ?? '' }}
                            </td>

                            <td class="px-4 py-1">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                    @if($customer->discount_type === 'fixed')
                                        {{ $customer->discount_amount }} $
                                    @elseif($customer->discount_type === 'percentage')
                                        {{ $customer->discount_amount }} %
                                    @else
                                        Default
                                    @endif
                                </span>
                            </td>

                            <td class="px-4 py-1">
                                {{ $customer->orders_count ?? 0 }}
                            </td>

                            <td class="px-4 py-1">
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                    {{ $customer->getRoleNames()->first() ?? 'None'}}
                                </span>
                            </td>

                            <td class="px-4 py-1">
                                <livewire:admin.ui.select-user-type :key :customerId="$customer->id" />
                            </td>

                            <td class="px-4 py-1">
                                <div class="flex items-center justify-end gap-1">
                                    <button wire:click.debounce="openAddDiscountModal({{ $customer->id }})" class="text-blue-500" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                    <button wire:click.debounce="confirmDeleteCustomer({{ $customer->id }})" class="text-red-400" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <nav class="py-2 mt-5" aria-label="Table navigation">
                {{ $customers->links() }}
            </nav>
        </div>
    </div>
    <x-ui.loading-spinner wire:loading.flex wire:target="search, userRole, openAddDiscountModal, confirmDeleteCustomer, enableCustomerEditMode" />
</section>


@push('modals')
    <livewire:admin.add-discount />
@endpush