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

        <div class="header">
            <div class="company-info">
                <h3>Your Company Name</h3>
                <p>123 Main Street, City, State</p>
                <p>Phone: (123) 456-7890</p>
                <p>Email: info@example.com</p>
            </div>
            <div class="invoice-info">
                <p>Invoice Number: INV00123</p>
                <p>Date: June 23, 2023</p>
            </div>
        </div>

        <div class="details">
            <div class="row">
                <div class="label">Bill To:</div>
                <div class="value">Customer Name</div>
            </div>
            <div class="row">
                <div class="label">Address:</div>
                <div class="value">123 Customer Street, City, State</div>
            </div>
        </div>

        <div class="items">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Item 1</td>
                        <td>2</td>
                        <td>$10</td>
                        <td>$20</td>
                    </tr>
                    <tr>
                        <td>Item 2</td>
                        <td>1</td>
                        <td>$15</td>
                        <td>$15</td>
                    </tr>
                    <tr>
                        <td>Item 3</td>
                        <td>3</td>
                        <td>$8</td>
                        <td>$24</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="total">
            <p><strong>Total Amount: $59</strong></p>
        </div>
    </div>
</body>
</html>