@extends('layout')
@section('content')

<div class="row" style="margin:auto;">
    <div class="col-3"></div>
    <div class="col-6">
        <br><br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Order ID</td>
                    <td>Payment Status</td>
                    <td>Amount</td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->paymentStatus }}</td>
                    <td>RM {{ $order->amount }}</td>
                    <!-- Must be primary key, in this case, 'id' -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-3"></div>

</div>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-9">
        <a class="btn btn-xs btn-info" href="{{ (route('pdfReport'))}}">Download Report</a>
    </div>
</div>

@endsection