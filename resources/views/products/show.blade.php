<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ strtoupper($product->name) }}</title>
</head>
<body>
    <div class="container">
        <h2>Product</h2>
        <ul>
            <li>ID: {{ $product->id }}</li>
            <li>Name: {{ $product->name }}</li>
            <li>Character code: {{ $product->slug }}</li>
            <li>Description: {{ $product->description }}</li>
            <li>Date and time of creation: {{ $product->created_at }}</li>
            <li>Cost: {{ $product->cost }}</li>
            <li>Image: &lt;img src='{{ $product->image }}' alt='Not found' &gt;</li>
            <li>Count: {{ $product->count }}</li>
        </ul>
    </div> 
</body>
</html>
