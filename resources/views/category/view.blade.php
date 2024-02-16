@include('common.header')
      <div class="container">
        <div class="my-4"><a href="{{ route('category.index') }}" class="btn btn-success">Go Back</a></div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">category Details</h2>
    <form action="">
      <div class="form-group">
        <label for="name"> Category Name</label>
        <input type="text" class="form-control"  value="{{$category->name}} " readonly>
      </div>
      <div class="form-group">
        <label for="category"> Parent Category</label>
        <input type="text" class="form-control"  value="{{$parentcat->name }}" readonly>
      </div>
      </form>
    </div>
    </div>
    </div>
    @include('common.footer')

