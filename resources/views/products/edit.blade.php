@extends('admin.home')

@section('body')
<div class="content-wrapper">
    <div class="container">
        <h2>Edit Product</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="category">Product Category</label>
                <select name="category" id="">
                    <option value="" selected="">add category here</option>
                    @isset($category)
                    @foreach($category as $category)
                    <option value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                    @endisset
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" step="0.01" value="{{ $product->quantity }}" required>
            </div>
            <div class="form-group">
                <label for="discount_price">discount_price:</label>
                <input type="number" class="form-control" id="discount_price" name="discount_price" step="0.01" value="{{ $product->discount_price }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if ($product->image)
                    <img src="{{ $product->getImageUrl() }}" alt="Product Image" class="img-thumbnail" style="width: 200px; height: 200px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection