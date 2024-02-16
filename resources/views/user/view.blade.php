@include('common.header')
      <div class="container">
        <div class="my-4"><a href="{{ route('user.index') }}" class="btn btn-success">Go Back</a></div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">User Details</h2>
    <form action="">
      <div class="form-group">
        <label for="name"> user Name</label>
        <input type="text" class="form-control"  value="{{$user->name}} " readonly>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control"  value="{{$user->email}} " readonly>
      </div>
      <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control"  value="{{$user->phone}} " readonly>
      </div>
      <div class="form-group">
        <label for="status">Status</label>
        <input type="text" class="form-control"  value="{{$user->status}} " readonly>
      </div>
    </form>
    </div>
    </div>
    </div>
    @include('common.footer')

