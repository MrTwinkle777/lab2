<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <h3>Products</h3>
        <form action="{{route('category.show', $category->slug)  }}" method="GET">
            @csrf
            Price:
            <input type="text" name="minPrice" style="width:60px"value="{{ $filterMinPrice ?? $minPrice }}">
            -
            <input type="text" name="maxPrice" style="width:60px" value="{{ $filterMaxPrice ?? $maxPrice }}">
            <button type="submit" style="padding:2px 10px">Filter</button>   
        </form>
        @if ($products->count() > 0 )
        <div class="row" style="margin-bottom:15px; margin-top:15px;">
            @foreach ($products as $product)
            <div class="col-4">
                <div class="card" style="margin-bottom:15px">
                    <div class="card-header">{{ $product->name }}</div>
                    <div class="card-body">
                        <div class="card-img"><img src="{{ $product->image }}" alt="Not found" style="width:100%"></div>
                        <div class="card-desc">{{ $product->description }}</div>
                        <br>
                        <div class="card-cost">{{ $product->cost }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
        @else
            <h2>No Product Found.!</h2>
        @endif
    </div>
</body>
</html>
