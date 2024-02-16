@include('common.header')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Edit Product</h2>
<form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="name"> Product Name</label>
    <input type="text" class="form-control" id="name" name="name"   value="{{ old('name', $product->name) }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="category"> Select Category</label><br>
    <select class="form-control" name="category" id="category">
      @foreach ($categorys as $value)
      <option value="{{ $value->id }}" {{ ($product->categoryId == old('category', $value->id)) ? 'selected' : '' }}>{{ $value->name }}</option>
    @endforeach
  </select>
    @error('category') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="brand"> Select Brand</label><br>
    <select class="form-control" name="brand" id="brand">
      @foreach ($brand as $value)
      <option value="{{ $value->id }}" {{ ($product->brandId == old('brand', $value->id)) ? 'selected' : '' }}>{{ $value->name }}</option>
    @endforeach
  </select>
    @error('brand') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price"   value="{{ old('price', $product->price) }}">
    @error('price') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="img">Current Image:</label><br>
    @if($product->photo)
      <img src="{{ asset('uploads/'.$product->photo) }}" alt="Current Image" class="img-thumbnail" width="150">
    @else
      <p>No image available</p>
    @endif
  </div>
  <div class="form-group">
    <label for="img"> Choose Image:</label><br>
    <input type="file" class="form-control-file" id="myFile" name="filename">
    @error('filename') <div style="color: red">{{ $message }}</div> @enderror
  </div><br>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
@include('common.footer')

