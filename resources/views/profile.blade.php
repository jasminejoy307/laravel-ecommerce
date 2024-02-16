<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</head>
<body>
  <div class="container">
    <div style="display: flex; justify-content: space-between;">
      <h4>{{ 'welcome '.auth()->user()->name }}</h4>
        <div class="my-4" style="margin-left: auto;">
        <form action="{{route('logout') }}" method="POST">
          @csrf
          <input type="submit" class="btn btn-danger logout" value="Logout">
        </form>
        </div>
        </div>
    @if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
  @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
  <h2 style="color:blue;">Orders</h2>
  <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
       @php
      $serialNumber = 1; 
  @endphp
    @foreach($orders as $order)
      @foreach($order->orderlist as $orderItem)
      <tr>
        <td>{{ $serialNumber++ }}</td>
          <td>{{ $orderItem->Products->name }}</td>
          <td>{{ $orderItem->qty }}</td>
          <td>{{ $orderItem->price }}</td>
          <td>{{ $orderItem->qty * $orderItem->price }}</td>
      </tr>
      @endforeach
      @endforeach
    </tbody>
</table>
  </div>
</body>
</html>