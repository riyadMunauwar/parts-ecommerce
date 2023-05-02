<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;


class SaleReportWidget extends Component
{

    public $totalSales = 0;
    public $totalOrders = 0;
    public $totalProducts = 0;
    public $totalCustomers = 0;

    public $todaySales = 0;
    public $todayOrders = 0;
    public $todayProducts = 0;
    public $todayCustomers = 0;

    public function mount()
    {
        $this->preparedInitData();
    }

    public function render()
    {
        return  view('admin.components.sale-report-widget');
    }


    private function preparedInitData()
    {
        $this->totalSales = $this->totalSales();
        $this->totalOrders = $this->totalOrders();
        $this->totalProducts = $this->totalProducts();
        $this->totalCustomers = $this->totalCustomers();

        $this->todaySales = $this->todaySales();
        $this->todayOrders = $this->todayOrders();
        $this->todayProducts = $this->todayProducts();
        $this->todayCustomers = $this->todayCustomers();
    }


    private function totalSales()
    {
        return Order::sum('total_product_price');
    }


    private function totalOrders()
    {
        return Order::count();
    }


    private function totalProducts()
    {
        return Product::count();
    }


    private function totalCustomers()
    {
        return User::count();
    }


    private function todaySales()
    {
        return Order::ofToday()->sum('total_product_price');
    }

    private function todayOrders()
    {
        return Order::ofToday()->count();
    }


    private function todayProducts()
    {
        return Product::ofToday()->count();
    }

    private function todayCustomers()
    {
        return User::ofToday()->count();
    }
}
