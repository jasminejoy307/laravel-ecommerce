@include('common.header')
      <div class="container">
        <div class="my-4"><a href="{{ route('orders.index') }}" class="btn btn-success">Go Back</a></div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">Order Details</h2>
         <form action="{{ route('orders.update', $order->orderId) }}" method="POST" >
          @method('PUT')
          @csrf
      {{-- <div class="form-group">
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
      </div> --}}
      <div class="form-group">
        <label for="Status">Status</label>
        <select class="form-control" name="status">
            <option value="">Select Status</option>
            <option value="1" @if ($order->orders->status == 1) selected @endif>Pending</option>
            <option value="2" @if ($order->orders->status == 2) selected @endif>Confirmed</option>
            <option value="3" @if ($order->orders->status == 3) selected @endif>Cancelled</option>
            <option value="4" @if ($order->orders->status == 4) selected @endif>Deleted</option>
        </select>
    </div><br>
    <input type="submit" class="btn btn-primary" value="Submit">
    </form>
    </div>
    </div>
    </div>
    @include('common.footer')
