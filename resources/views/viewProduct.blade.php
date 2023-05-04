@extends('layout')
@section('content')

<div class="row" style="margin:auto;">

    @foreach($products as $product)
    <div class="col-sm-12 col-md-6 col-lg-3 p-2">
        <div class="card shadow-sm boarder-dark">
            <div class="card-body">
                <h5 clas="card-title">{{ $product->name }}</h5>
                <input type="hidden" name="id" value="{{ $product->id }}">
                <img src="{{asset('images/')}}/{{ $product->image}}" alt="" width="100%" class="img-fluid">

                <div class="row mt-3">
                    <div class="col-md-5">
                        <div class="card-heading">Price: {{ $product->price }}</div>
                    </div>
                    <div class="col-md-7 float-right">
                        <button type="submit" class="btn btn-danger btn-xs">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endforeach

</div>

@endsection