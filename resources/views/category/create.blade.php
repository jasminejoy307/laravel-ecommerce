@include('common.header')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Add Category</h2>
<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name"> Category Name</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter category name"value="{{ old('name') }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="pcat"> Select Parent Category</label><br>
    <select class="form-control" name="pcat" id="pcat">
      @foreach ($category as $value)
      <option value="" disabled selected hidden>select</option>
      <option value="{{ $value->id }}" {{ (old('pcat')==$value->id)?'selected':'' }}>{{ $value->name }}</option>
      @endforeach
    </select>
    @error('pcat') <div style="color: red">{{ $message }}</div> @enderror
  </div><br>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
@include('common.footer')

