<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        .header { display: flex; justify-content: space-between; margin-bottom: 30px; }
        .company-info { flex: 1; }
        .invoice-info { text-align: right; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th { text-align: left; background-color: #f5f5f5; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #eee; }
        .totals { float: right; width: 300px; margin-top: 20px; }
        .footer { margin-top: 50px; padding-top: 20px; border-top: 1px solid #eee; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .font-bold { font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="company-info">
                <h1 class="font-bold" style="font-size: 24px;">kgsons</h1>
                <p>123 Business Street</p>
                <p>City, State 10001</p>
                <p>Phone: (123) 456-7890</p>
                <p>Email: info@yourcompany.com</p>
            </div>
            <div class="invoice-info">
                <h2 style="font-size: 20px;">INVOICE</h2>
                <p><strong>Invoice #:</strong> {{ $invoice->invoice_number }}</p>
                <p><strong>Date:</strong> {{ $invoice->invoice_date}}</p>
                <p><strong>Due Date:</strong> {{ $invoice->due_date}}</p>
                <p><strong>Status:</strong> 
                    @if($invoice->paid_at) Paid
                    @elseif($invoice->due_date) Overdue
                    @else Pending @endif
                </p>
            </div>
        </div>

        <div style="margin-bottom: 30px;">
            <div style="margin-bottom: 10px;"><strong>Bill To:</strong></div>
            <div>{{ $invoice->client}}</div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                <tr>
                    <td>{{ $item->product}}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ ($item->unit_price) }}</td>
                    <td class="text-right">{{ ($item->total) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="totals">
            <table>
                <tr>
                    <td><strong>Subtotal:</strong></td>
                    <td class="text-right">{{ ($invoice->subtotal) }}</td>
                </tr>
                <tr>
                    <td><strong>Tax (15%):</strong></td>
                    <td class="text-right">{{ ($invoice->tax) }}</td>
                </tr>
                <tr>
                    <td><strong>Total:</strong></td>
                    <td class="text-right">{{ ($invoice->total) }}</td>
                </tr>
            </table>
        </div>

        @if($invoice->notes)
        <div class="footer">
            <p><strong>Notes:</strong></p>
            <p>{{ $invoice->notes }}</p>
        </div>
        @endif

        <div class="footer" style="margin-top: 100px;">
            <div style="float: left; width: 50%;">
                <p>___________________________</p>
                <p>Client Signature</p>
            </div>
            <div style="float: right; width: 50%; text-align: right;">
                <p>___________________________</p>
                <p>Authorized Signature</p>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>