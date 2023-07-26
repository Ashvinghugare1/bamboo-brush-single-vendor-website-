<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->


         <div class="row">
               <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50% padding: 30px">
                  <div class="box">
                     <div class="img-box" style="padding: 20px">
                        <img src="storage/{{$products->image }}" alt="img">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->name}}
                        </h5>
                        @if($products->discount_price!==null)
                        <h6 style="color: red">
                        Discount Price <br>
                        Rs {{$products->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color: blue">
                        Price<br>
                        Rs {{$products->price}}
                        </h6>
                        @else
                        <h6 style="color: blue">
                        Price<br>
                        Rs {{$products->price}}
                        </h6>
                        
                        @endif
                        <h6>Product Category : {{$products->category->category_name }}</h6>
                        <h6>Product Description : {{$products->description}}</h6>
                        <h6>Product Quantity : {{$products->quantity}}</h6>
                        <form action="{{route('add-cart',$products->id)}}" method="post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                              </div>
                              <div class="col-md-4">
                              <input type="submit" value="Add To Cart">
                              </div>
                           </div>
                          </form>
                     </div>
                  </div>
               </div>

            </div>


         <!-- slider section -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
    @include('home.script')
   </body>
</html>