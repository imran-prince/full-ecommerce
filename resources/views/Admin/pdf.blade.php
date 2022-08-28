<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=., initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Order Details</h1>
    <div>
        <h3>Email: {{$data->email}}</h3>
        <h3>Address: {{$data->address}}</h3>
        <h3>Name: {{$data->name}}</h3> 
        <img src="product/{{$data->image}}" style="float: right" height="250px" width="200px" alt="">
        <h3>phone: {{$data->phone}}</h3>
        <h3>product_title: {{$data->product_title}}</h3>
        <h3>quantity: {{$data->quantity}}</h3>
        <h3>price: {{$data->price}}</h3>
        <h3>payment_status: {{$data->payment_status}}</h3>
        <h3>delivery_status: {{$data->delivery_status}}</h3>
        
    </div>
         <div style="float: right">
            Name: Prince Imran <br>
             Email:imran@gmail.com <br>
             amarbazar.com <br>
         </div>
</body>
</html>