<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        /* CSS styles for the invoice */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .invoice {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            max-width: 800px;
            margin: 0 auto;
        }

        .invoice h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .invoice .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .invoice .header .company-info {
            font-weight: bold;
        }

        .invoice .details {
            margin-bottom: 20px;
        }

        .invoice .details .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .invoice .details .row .label {
            font-weight: bold;
        }

        .invoice .items {
            margin-bottom: 20px;
        }

        .invoice .items table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice .items table th,
        .invoice .items table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .invoice .items table th {
            background-color: #f5f5f5;
        }

        .invoice .total {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <h1>Invoice</h1>

        @php 

            $company = config('setting');

        @endphp 


        <div class="header">
            <div class="company-info">
                <h3>{{ ucfirst(config('setting')->company_name) }}</h3>
                <p>{{ $company->street_1 ?? ''}}, {{ $company->street_2 ?? '' }}, {{ $company->city ?? '' }}, {{ $company->state ?? '' }}, {{ $company->country ?? '' }}</p>

                <p>Phone: {{ $company->phone ?? '' }}</p>
                <p>Email: {{ $company->email ?? '' }}</p>
            </div>
            <div class="invoice-info">
                <p>Invoice Number: #INV-{{ $order->id }}</p>
                <p>Order Number: #OR-{{ $order->id }}</p>
                <p>Date: {{ $order->order_date->format('d M Y') }}</p>
            </div>
        </div>

        <div class="details">
            <div class="row">
                <div class="label">Bill To:</div>
                <div class="value">{{ $order->user->name ?? $order->address->full_name ?? 'N/A'}}</div>
            </div>
            <div class="row">
                <div class="label">Phone:</div>
                <div class="value">{{ $order->address->phone }}</div>
            </div>
            <div class="row">
                <div class="label">Email:</div>
                <div class="value">{{ $order->address->email }}</div>
            </div>
            <div class="row">
                <div class="label">Address:</div>
                <div class="value">{{ $order->address->street_1 }}, {{ $order->address->street_2 }}, {{ $order->address->city }}, {{ $order->address->state }}, {{ $order->address->country }}</div>
            </div>
        </div>

        <div class="items">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Line Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>${{ $item->price }}</td>
                            <td>${{ (float) $item->price * $item->qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="total">
            <p><strong>Subtotal      : ${{ $order->total_product_price ?? '' }}</strong></p>
            <p><strong>Vat/Tax       : ${{ $order->total_vat ?? '' }}</strong></p>
            <p><strong>Shipping Cost : ${{ $order->shipping_cost ?? '' }}</strong></p>
            <p><strong>Total Amount  : $ {{ $order->total_price ?? '' }}</strong></p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.print();
        });
    </script>
</body>
</html>