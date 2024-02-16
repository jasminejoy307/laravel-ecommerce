@include('common.header')
  <div class="container">
    <div style="display: flex; justify-content: space-between;">
    <div class="my-4"><a href="{{ route('brand.create') }}" class="btn btn-success">Add New</a></div>
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
        <th>Brand Name</th>
        <th>Action</th>
      </tr>
      @forelse ($brands as $key=>$brand)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{$brand->name }}</td>
        <td>
            <div class="d-flex gap-2">
            <a href="{{ route('brand.show', $brand->id) }}" class="btn btn-warning">View</a>
            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('brand.destroy', $brand->id) }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="button" class="btn btn-danger branddel">Delete</button>
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
    $('.branddel').on('click', function(e) {
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