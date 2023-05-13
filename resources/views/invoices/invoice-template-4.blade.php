<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Invoice</title>
  <style>
    body {
      font-family: sans-serif;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 30px;
      background-color: #fff;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }
    .header img {
      width: 150px;
    }
    .invoice-details {
      display: flex;
      justify-content: space-between;
      margin-bottom: 30px;
    }
    .invoice-details div {
      flex: 1;
      text-align: center;
    }
    .invoice-number {
      font-size: 24px;
      margin-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 30px;
    }
    th,
    td {
      text-align: left;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #f5f5f5;
    }
    .total {
      display: flex;
      justify-content: flex-end;
    }
    .total span {
      font-weight: bold;
    }
    .thank-you {
      text-align: center;
      font-size: 24px;
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=Invoice+Logo&w=150&h=150" alt="Logo">
      <h1>Invoice</h1>
    </div>
    <div class="invoice-details">
      <div>
        <h2>Billed To</h2>
        <p>John Doe</p>
        <p>123 Main Street, Anytown, CA 12345</p>
      </div>
      <div>
        <h2>Invoice Details</h2>
        <p class="invoice-number">Invoice #123456</p>
        <p>Date: 2023-05-12</p>
        <p>Due Date: 2023-05-26</p>
      </div>
    </div>
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
          <td>Book</td>
          <td>1</td>
          <td>$10.00</td>
          <td>$10.00</td>
        </tr>
        <tr>
          <td>T-shirt</td>
          <td>2</td>
          <td>$20.00</td>
          <td>$40.00</td>
        </tr>
      </tbody>
    </table>
    <div class="total">
      <span>Total:</span> $50.00
    </div>
    <div class="thank-you">
      Thank you for your business!
    </div>
  </div>
</body>
</html>
