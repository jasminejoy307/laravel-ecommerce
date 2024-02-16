@include('common.header')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Edit User</h2>
<form action="{{ route('user.update', $user->userId) }}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-group">
    <label for="name"> User Name</label>
    <input type="text" class="form-control" id="name" name="name"   value="{{ old('name', $user->name) }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email"   value="{{ old('email', $user->email) }}">
    @error('email') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" name="phone"   value="{{ old('phone', $user->phone) }}">
    @error('phone') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control" id="password" name="password"  value="">
    @error('password') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    {{-- <input type="text" class="form-control" id="status" name="status"   value="{{ old('status', $user->status) }}"> --}}
    <select class="form-control" name="status" id="status">
        <option value="{{ $user->status }}" selected>{{ $user->status }}</option>
        <option value="Active" >Active</option>
        <option value="Inactive" >InActive</option>
    </select>
    @error('status') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
@include('common.footer')

