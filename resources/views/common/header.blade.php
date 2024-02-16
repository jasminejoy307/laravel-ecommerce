<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('product.index') }}">Products</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link{{ request()->is('category*') ? ' active' : '' }}" href="{{ route('category.index') }}">Categories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link{{ request()->is('brand*') ? ' active' : '' }}" href="{{ route('brand.index') }}">Brands</a>
              </li>
              <li class="nav-item">
                <a class="nav-link{{ request()->is('user*') ? ' active' : '' }}" href="{{ route('user.index') }}">Users</a>
              </li>
              <li class="nav-item">
                <a class="nav-link{{ request()->is('address*') ? ' active' : '' }}" href="{{ route('address.index') }}">Addresses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link{{ request()->is('orders*') ? ' active' : '' }}" href="{{ route('orders.index') }}">Orders</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>