@extends('admin.home')

@section('body')
    <div class="container">
        <h2>Product Details</h2>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Category:</strong> {{ $product->category->category_name }}</p>
                <p><strong>Name:</strong> {{ $product->name }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                <p><strong>Discount Price:</strong> {{ $product->discount_price }}</p>
                <p><strong>Price:</strong> {{ $product->price }}</p>
                @if ($product->image)
                    <img src="{{ $product->getImageUrl() }}" alt="Product Image" class="img-thumbnail" style="width: 200px; height: 200px;">
                @endif
            </div>
        </div>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection