<x-admin.master-layout title="Dashboard">

    <livewire:admin.sale-report-widget />


    <div class="flex gap-5 mt-5">
        <div class="flex-1">
            <livewire:admin.current-month-sales-chart />
        </div>
        <div class="flex-1">
            <livewire:admin.current-month-orders-chart />
        </div>
    </div>

    <div class="flex gap-5 mt-5">
        <div class="flex-1">
            <livewire:admin.sales-chart-widget />
        </div>
        <div class="flex-1">
        </div>
    </div>

</x-admin.master-layout>
