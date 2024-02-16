@include('common.header')
      <div class="container">
        <div class="my-4"><a href="{{ route('orders.index') }}" class="btn btn-success">Go Back</a></div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">Order Details</h2>
    <form action="">
      <div class="form-group">
        <label for="name"> Product Name</label>
        <input type="text" class="form-control"  value="{{$order->products->name}} " readonly>
      </div>
      <div class="form-group">
        <label for="User">User</label>
        <input type="text" class="form-control"  value="{{$order->orders->user->name}} " readonly>
      </div>
      <div class="form-group">
        <label for="Address">Address</label>
        <input type="text" class="form-control"  value=" " readonly>
      </div>
      <div class="form-group">
        <label for="Quanity">Quanity</label>
        <input type="text" class="form-control"  value="{{$order->qty}} " readonly>
      </div>
      <div class="form-group">
        <label for="Price">Price</label>
        <input type="text" class="form-control"  value="{{$order->price}} " readonly>
      </div>
      <div class="form-group">
        <label for="Total">Total Price</label>
        <input type="text" class="form-control"  value="{{$order->qty * $order->price}}" readonly>
      </div>
      <div class="form-group">
        <label for="Status">Status</label>
        <input type="text" class="form-control"  value=" @if ($order->orders->status == 1) Pending
    @elseif ($order->orders->status == 2)
        Confirmed
    @elseif ($order->orders->status == 3)
        Cancelled
    @elseif ($order->orders->status == 4)
        Deleted
    @else
       
    @endif" readonly>
      </div>
    </form>
    </div>
    </div>
    </div>
    @include('common.footer')
