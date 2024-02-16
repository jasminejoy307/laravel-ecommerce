@include('common.header')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="text-center mb-4">Add User</h2>
<form action="{{ route('user.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="name"> User Name</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter user name"value="{{ old('name') }}">
    @error('name') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="email"> Email</label>
    <input type="text" class="form-control" id="email" name="email"  placeholder="Enter email "value="{{ old('email') }}">
    @error('email') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="phone"> Phone</label>
    <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter phone "value="{{ old('phone') }}">
    @error('phone') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <div class="form-group">
    <label for="password"> Password</label>
    <input type="text" class="form-control" id="password" name="password"  placeholder="Enter password"value="{{ old('password') }}">
    @error('password') <div style="color: red">{{ $message }}</div> @enderror
  </div>
  <br>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
@include('common.footer')

