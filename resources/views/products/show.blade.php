<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
   @include('admin.css')
   
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
    <div class="container mt-5">
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
    @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>