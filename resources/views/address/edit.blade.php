@include('common.header')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Edit Address</h2>
<form action="{{ route('address.update', $addr->id) }}" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="address"> Address</label>
    <input type="text" class="form-control" id="address" name="address"   value="{{ old('address', $addr->address) }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="user"> Select User</label><br>
    <select class="form-control" name="user" id="user">
      @foreach ($user as $value)
      <option value="{{ $value->userId }}" {{ ($addr->userId == old('user', $value->userId)) ? 'selected' : '' }}>{{ $value->name }}</option>
    @endforeach
  </select>
    @error('user') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="pincode">Pincode</label>
    <input type="text" class="form-control" id="pincode" name="pincode"   value="{{ old('pincode', $addr->pincode) }}">
    @error('pincode') <div style="color: red">{{ $message }}</div> @enderror
  </div>
 <br>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
@include('common.footer')

