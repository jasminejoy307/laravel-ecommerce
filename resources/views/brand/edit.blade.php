@include('common.header')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Edit Brand</h2>
<form action="{{ route('brand.update', $brand->id) }}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="name"> Brand Name</label>
    <input type="text" class="form-control" id="name" name="name"   value="{{ old('name', $brand->name) }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div><br>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
@include('common.footer')

