@include('common.header')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Edit category</h2>
<form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="name"> Category Name</label>
    <input type="text" class="form-control" id="name" name="name"   value="{{ old('name', $category->name) }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="pcat"> Select  Parent Category</label><br>
    <select class="form-control" name="pcat" id="pcat">
      @foreach ($list as $value)
      <option value="{{ $value->id }}" {{ ($category->parentId == old('pcat', $value->id)) ? 'selected' : '' }}>{{ $value->name }}</option>
    @endforeach
  </select>
    @error('category') <div style="color: red">{{ $message }}</div> @enderror
  </div><br>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
@include('common.footer')

