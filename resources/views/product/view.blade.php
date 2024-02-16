@include('common.header')
      <div class="container">
        <div class="my-4"><a href="{{ route('product.index') }}" class="btn btn-success">Go Back</a></div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">Product Details</h2>
    <form action="">
      <div class="form-group">
        <label for="name"> Product Name</label>
        <input type="text" class="form-control"  value="{{$product->name}} " readonly>
      </div>
      <div class="form-group">
        <label for="category">Category</label>
        <input type="text" class="form-control"  value="{{$product->category->name}} " readonly>
      </div>
      <div class="form-group">
        <label for="brand">Brand</label>
        <input type="text" class="form-control"  value="{{$product->brands->name}} " readonly>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control"  value="{{$product->price}} " readonly>
      </div>
      <div class="form-group">
        <label for="image">Image</label><br>
        <img src="{{ asset('uploads/'.$product->photo) }}" alt="image" style="object-fit: cover" width="150" height="150">
      </div>
    </form>
    </div>
    </div>
    </div>
    @include('common.footer')
