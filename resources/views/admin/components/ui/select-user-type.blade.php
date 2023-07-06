<div>
    <select wire:model.debounce="userRole" class="appearance-none bg-gray-50 border focus:outline-none focus:border-none text-gray-900 text-xs px-2 py-1 rounded-sm">
        <option value="{{ $customerId }}|user">User</option>
        <option value="{{ $customerId }}|retailer">Retailer</option>
        <option value="{{ $customerId }}|royal-user">Royal User</option>
    </select>
</div>