@include('common.header')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Add Product</h2>
<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name"> Product Name</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name"value="{{ old('name') }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="category"> Select Category</label><br>
    <select class="form-control" name="category" id="category">
      @foreach ($category as $value)
      <option value="" disabled selected hidden>select</option>
      <option value="{{ $value->id }}" {{ (old('category')==$value->id)?'selected':'' }}>{{ $value->name }}</option>
      @endforeach
    </select>
    @error('category') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="brand"> Select Brand</label><br>
    <select class="form-control" name="brand" id="brand">
      @foreach ($brand as $value)
      <option value="" disabled selected hidden>select</option>
      <option value="{{ $value->id }}" {{ (old('brand')==$value->id)?'selected':'' }}>{{ $value->name }}</option>
      @endforeach
    </select>
    @error('brand') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price"   placeholder="Enter price"value="{{ old('price') }}">
    @error('price') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="img"> Choose Image:</label><br>
    <input type="file" name="filename" />
    @error('filename') <div style="color: red">{{ $message }}</div> @enderror
  </div><br>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
@include('common.footer')

