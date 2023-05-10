<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Order;


class SalesChartWidget extends Component
{

    public $chartData;

    public function mount()
    {
        $this->chartData = $this->chartData();
    }

    
    public function render()
    {
        return view('admin.components.sales-chart-widget');
    }



    private function chartData()
    {
        $orders = Order::select(DB::raw("DATE_FORMAT(order_date,'%Y-%m') as month"), DB::raw("SUM(total_product_price) as total"))
        ->groupBy('month')
        ->get();
    
        $chartData = [
            'labels' => $orders->pluck('month'),
            'datasets' => [
                [
                    'label' => 'Total Sales',
                    'backgroundColor' => '#06b6d4',
                    'data' => $orders->pluck('total')
                ]
            ]
        ];

        return $chartData;
    }
}
