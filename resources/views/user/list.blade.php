@include('common.header')
  <div class="container">
    <div style="display: flex; justify-content: space-between;">
    <div class="my-4"><a href="{{ route('user.create') }}" class="btn btn-success">Add New</a></div>
    <div class="my-4">
      <form action="{{route('logout') }}" method="POST">
        @csrf
        <input type="submit" class="btn btn-danger logout" value="Logout">
      </form>
    </div>
    </div>
    @if (Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
  @endif
  @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
  @endif
    <table class="table">
      <tr>
        <th>Sl.No</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      @forelse ($users as $key => $user)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
        <td>
            @foreach ($user->addresses as $address)
            <a href="{{ route('address.edit', $address->id) }}">{{ $address->address }}</a> <br>
            @endforeach
        </td>
        <td>{{ $user->status }}</td>
   
      <td>
            <div class="d-flex gap-2">
            <a href="{{ route('user.show', $user->userId) }}" class="btn btn-warning">View</a>
            <a href="{{ route('user.edit', $user->userId) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('user.destroy', $user->userId) }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="button" class="btn btn-danger userdel">Delete</button>
            </form>
            </div>
        </td>
      </tr>
      @empty
      <tr>
        <td>No Data</td>
      </tr>
      @endforelse
    </table>
  </div>
  <script>
    $('.userdel').on('click', function(e) {
      e.preventDefault();
      var curr = $(this); 
      $.confirm({
        title: 'Confirm!',
        content: 'Are you sure to delete?',
        buttons: {
          confirm: function () {
            curr.parent('form').submit();
          },
          cancel: function () {

          },
        }
      });
    });
    </script>
 @include('common.footer')