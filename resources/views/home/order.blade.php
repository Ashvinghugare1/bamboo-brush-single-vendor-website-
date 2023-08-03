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
              <div class="col-lg-12 stretch-card">
                  <div class="card-body">
                    <h3 class="card-title">Order Table</h3>
                    <div class="table-responsive">
                      <table class="table table-bordered table-contextual">
                        <thead>
                          <tr class="table-primary">
                            <th> Sr. No. </th>
                            <th> Product Title </th>
                            <th> Quantity </th>
                            <th> Price </th>
                            <th> Payment Status </th>
                            <th> Delivery Status </th>
                            <th> Image </th>
                            <th> Cancel Order </th>
                          </tr>
                        </thead>
                        <tbody>
                            @isset($order)
                            @foreach($order as $order)
                          <tr >
                            <td>{{$order->id}}</td>
                            <td> {{$order->product_title}} </td>
                            <td> {{$order->quantity}} </td>
                            <td>{{$order->price}} </td>
                            <td>{{$order->payment_status}}</td>
                            <td> {{$order->delivery_status}}</td>
                            <td><img height="100px" width="100px" src="storage/{{$order->image}}"></td>
                            <td>
                                @if($order->delivery_status=='processing')    
                                    <a href="{{route('cancel-order',$order->id)}}" class="btn btn-danger">Cancel Order</a>
                                @else
                                    <p style="color: blue;">Not Allowed</p>
                                @endif    
                            </td>
                          </tr>


                          @endforeach
                          @endisset
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
    </div>
         
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="https://www.bamboobrush.com">bamboobrush.com</a><br></p>
      </div>
    @include('home.script')
   </body>
</html>