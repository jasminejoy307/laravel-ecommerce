<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .product-image {
            max-width: 100%;
            height: 200px;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mt-5 mb-4">All Products</h1>
            </div>
            <div class="col-md-6 text-right" style="margin-top: 20px;">
                <a href="{{ route('checkout') }}" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Checkout</a>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('uploads/' . $product->photo) }}" class="card-img-top product-image" alt="{{ $product->photo }}">
                         <form class="card-body cartform">
                            @csrf
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Category: {{ $product->category->name }}</p>
                            <p class="card-text">Brand: {{ $product->brands->name }}</p>
                            <p class="card-text">Price: Rs {{ $product->price }}</p>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="hidden" name="product" value="{{ $product->id }}">
                                <input type="number" class="form-control" name="qty" value="1" min="1">
                            </div>
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('.cartform').on('submit', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var fd = $(this).serialize();
            $.ajax({
                url: "{{ route('addtocart') }}",
                type: "POST",
                data: fd,
                dataType: 'json',
                success: function(resp) {
                    alert(resp);
                }
            })
        })
    </script>
</body>
</html>
