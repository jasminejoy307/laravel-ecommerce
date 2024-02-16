@include('common.header')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Add Brand</h2>
<form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name"> Brand Name</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter brand name"value="{{ old('name') }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div><br>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
@include('common.footer')

