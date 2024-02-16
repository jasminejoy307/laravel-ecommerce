@include('common.header')
  <div class="container">
    <div style="display: flex; justify-content: space-between;">
        <div class="my-4" style="margin-left: auto;">
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
        <th>User</th>
        <th>Address</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      @forelse ($order as $key=>$orders)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{$orders->user->name}}</td>
        <td>{{$orders->Address->address}}</td>
        @if ($orders->status == 1)
        <td>Pending</td>
    @elseif ($orders->status == 2)
        <td> Confirmed</td>
    @elseif ($orders->status == 3)
        <td> Cancelled</td>
    @elseif ($orders->status == 4)
        <td> Deleted</td>
    @else
        <td> </td>
    @endif
        <td>
            <div class="d-flex gap-2">
            <a href="{{ route('orders.show', $orders->id) }}" class="btn btn-warning">View</a>
            <a href="{{ route('orders.edit', $orders->id) }}" class="btn btn-primary">Status change</a>
            <form action="{{ route('orders.destroy', $orders->id) }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="button" class="btn btn-danger orderdel">Delete</button>
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
    $('.orderdel').on('click', function(e) {
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