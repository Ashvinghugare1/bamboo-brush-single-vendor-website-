<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    <h1>Order Detail</h1>
    Costomer Name : <h3>{{$order->name}}</h3>
    Costomer Email : <h3>{{$order->email}}</h3>
    Costomer Phone : <h3>{{$order->phone}}</h3>
    Costomer Address : <h3>{{$order->address}}</h3>

    Product Name : <h3>{{$order->product_title}}</h3>
    Product price : <h3>{{$order->price}}</h3>
    Product Quantity : <h3>{{$order->quantity}}</h3>
    Product Payment Status : <h3>{{$order->payment_status}}</h3>
    Product NaIdme : <h3>{{$order->product_id}}</h3>
    <br>
    <img src="storage/{{ $order->image }}" alt="order Image" class="img-thumbnail" style="width: 100px; height: 100px;">
</body>
</html>