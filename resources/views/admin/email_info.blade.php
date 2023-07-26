<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
   @include('admin.css')
   <style>
    label{
        display:inline-block;
        width:200px;
        font-size:15px;
        font-weight:bold;
    }
   </style>
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
    <h1 style="text-align:center; font-size:25px;">send email to {{$order->email}}</h1>
    <form action="{{route('send-user-email', $order->id)}}" method="post">
        @csrf
        <div style="padding-left:35%; padding-top: 30px;">
            <label for="email">Email Greeting : </label>
            <input style="color:black" type="text" name="greeting" value="">
        </div>
        <div style="padding-left:35%; padding-top: 30px;">
            <label for="email">Email FirstLine : </label>
            <input style="color:black" type="text" name="firstline" value="">
        </div>
        <div style="padding-left:35%; padding-top: 30px;">
            <label for="email">Email body : </label>
            <input style="color:black" type="text" name="body" value="">
        </div>
        <div style="padding-left:35%; padding-top: 30px;">
            <label for="email">Email Button Name : </label>
            <input style="color:black" type="text" name="Button" value="">
        </div>
        <div style="padding-left:35%; padding-top: 30px;">
            <label for="email">Email url : </label>
            <input style="color:black" type="text" name="url" value="">
        </div>
        <div style="padding-left:35%; padding-top: 30px;">
            <label for="email">Email LastLine : </label>
            <input style="color:black" type="text" name="lastline" value="">
        </div>
        <div style="padding-left:35%; padding-top: 30px;">
            <input type="submit" name="" value="Send Email" class="btn btn-primary">
        </div>
    </form>
</div>

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
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
