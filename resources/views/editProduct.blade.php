@extends('layout')
@section('content')
<div class="row"> 
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <br><br>
        <h3>Edit Product</h3>
        <form action="{{route('updateProduct')}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @foreach($products as $product)
            <div class="form-group">
                <img src="{{asset('images/')}}/{{$product->image}}" alt="" width="100" class="img-fluid">
            <label for="productname">Product Name</label>
            <input type="hidden" name="id" value="{{$product->id}}">
            <input class="form-control" type="text"id="productName" name="productName" required value="{{$product->name}}">
            </div>
            <div class="form-group">
            <label for="productDescription">Description</label>
            <input class="form-control" type="text"id="productDescription" name="productDescription" required value="{{$product->description}}">
            </div>
            <div class="form-group">
            <label for="productPrice">Price</label>
            <input class="form-control" type="number"id="productPrice" name="productPrice" min="0" required value="{{$product->price}}">
            </div>
            <div class="form-group">
            <label for="productQuantity">Quantity</label>
            <input class="form-control" type="number"id="productQuantity" name="productQuantity" min="0" required value="{{$product->quantity}}">
            </div>
            <div class="form-group">
            <label for="productImage">Image</label>
            <input class="form-control" type="file"id="productImage" name="productImage" >
            </div>
            <div class="form-group">
            <label for="Category">Category</label>
            <select name="CategoryID" id="CategoryID" class="form-control">
                @foreach($categoryID as $category)
                    <option value="{{$category->id}}"
                    @if($product->CategoryID==$category->id)
                        selected
                    @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            @endforeach
        </form>
        <br><br>
    </div>
    <div class="col-sm-3"></div>  
</div> 
@endsection 