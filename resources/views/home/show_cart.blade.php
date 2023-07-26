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
      <style>
        .center{
            margin:auto;
            width:50%;
            text-align:center;
            padding:30px
        }

        table,th,td{
            border: 1px solid grey;
        }

        .th_deg{
            font-size:30px;
            padding:5px;
        }
        .img_deg{
            height: 100px;
            width: 100px;
        }
        .total_deg{
            font-size: 20px;
            padding: 40px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
            @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
              </div>
            @endif
         <div class="center">
            <table>
                <tr>
                    <th class="th_deg">Sr No</th>
                    <th class="th_deg">Product Name</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Image</th>
                    <th class="th_deg">Action</th>
                </tr>
                <?php $totalprice=0; ?>
                @isset($cart)
                @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->id}}</td>
                    <td>{{$cart->product_title}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->price}}</td>
                    <td><img class="img_deg" src="/storage/{{$cart->image}}"></td>
                    <td><a href="{{route('remove-cart',$cart->id)}}" class="btn btn-danger" onclick="return confirm('are you sure toremove this product ?')">Remove</a></td>
                </tr>
                <?php $totalprice=$totalprice + $cart->price ?>
                @endforeach
                @endisset
            </table>
            <div>
                <h1 class="total_deg">Total Price : Rs. {{$totalprice}}</h1>
            </div>
            <h1  style="font-size:25px; padding-bottom: 15px;">Proceed To order </h1>
            <a href="{{route('cash-order')}}" class="btn btn-success">Cash On Delivery</a>
            <a href="{{route('stripe',$totalprice)}}" class="btn btn-success">Pay Using Card</a>
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