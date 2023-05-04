<head>
    <title>Southern Online</title>
</head>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse:collapse;
    }
</style>

<body>
    <h3>My Order Report</h3>
    <table>
        <thead>
            <tr>
                <td>Order ID</td>
                <td>Payment Status</td>
                <td>Amount (RM)</td>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->paymentStatus }}</td>
                <td>{{ $order->amount }}</td>
                <!-- Must be primary key, in this case, 'id' -->
            </tr>
            @endforeach
        </tbody>
    </table>
</body>