<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
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
            <div class="content-wrapper">
              @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
              </div>
              @endif
              <div style="padding-left:400px; padding-bottom:30px; color:black;">
                <form action="{{route('search')}}" method="get">
                  <input type="text" name="search" id="" placeholder="search order">
                  <input type="submit" value="search" class="btn btn-outline-primary" >
                </form>
              </div>
                <div class="row">
                  <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Sr No</th>
                                <th>name</th>
                                <th>email</th>
                                <th>phone</th>
                                <th>address</th>
                                <th>user_id</th>
                                <th>product_title</th>
                                <th>quantity</th>
                                <th>price</th>
                                <th>image</th>
                                <th>product_id</th>
                                <th>payment_status</th>
                                <th>delivery_status</th>
                                <th>created at</th>
                                <th>updated at</th>
                                <th>Delivered</th>
                                <th>Print PDF</th>
                                <th>Email</th>
                              </tr>
                            </thead>
                            <tbody>
                              @isset($order)
                            @foreach ($order as $key => $order)
                              <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->user_id}}</td>
                                <td>{{$order->product_title}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->price}}</td>
                                <td> @if ($order->image)
                                <img src="storage/{{ $order->image }}" alt="order Image" class="img-thumbnail" style="width: 100px; height: 100px;">
                            @endif</td>
                                <td>{{$order->product_id}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->delivery_status}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->updated_at}}</td>
                                <td>
                                  @if($order->delivery_status=='processing')
                                  <a class="btn btn-success" href="{{route('delivered',$order->id)}}">Delivered</a>
                                  @else
                                  <p>Delivered</p>
                                  @endif
                              </td>
                              <td><a href="{{route('print-pdf', $order->id)}}" class="btn btn-secondary">Print Pdf</a></td>
                              <td><a href="{{route('send-email', $order->id)}}" class="btn btn-info">Send Email</a></td>
                              </tr>
                             
                              @endforeach
                              @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
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