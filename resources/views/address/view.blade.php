@include('common.header')
      <div class="container">
        <div class="my-4"><a href="{{ route('address.index') }}" class="btn btn-success">Go Back</a></div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">Address Details</h2>
    <form action="">
        <div class="form-group">
            <label for="user">User</label>
            <input type="text" class="form-control"  value="{{$addr->user->name}} " readonly>
          </div>
      <div class="form-group">
        <label for="name"> Address</label>
        <input type="text" class="form-control"  value="{{$addr->address}} " readonly>
      </div>
      <div class="form-group">
        <label for="pincode">Pincode</label>
        <input type="text" class="form-control"  value="{{$addr->pincode}} " readonly>
      </div>
    </form>
    </div>
    </div>
    </div>
    @include('common.footer')
