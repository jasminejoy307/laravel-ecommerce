@include('common.header')
  <div class="container">
    <div style="display: flex; justify-content: space-between;">
    <div class="my-4"><a href="{{ route('product.create') }}" class="btn btn-success">Add New</a></div>
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
        <th>Product Name</th>
        <th>Category</th>
        <th>Brand</th>
        <th>Photo</th>
        <th>price</th>
        <th>status</th>
        <th>Action</th>
      </tr>
      @forelse ($product as $key=>$products)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{$products->name  }}</td>
        <td>{{$products->category->name}}</td>
        <td>{{$products->brands->name}}</td>
        <td><img src="{{ asset('uploads/' . $products->photo) }}" class="card-img-top product-image" alt="{{ $products->photo }}" style="object-fit: cover" width="50" height="50"></td>
        <td>{{$products->price}}</td>
        <td>{{$products->status}}</td>
        <td>
            <div class="d-flex gap-2">
            <a href="{{ route('product.show', $products->id) }}" class="btn btn-warning">View</a>
            <a href="{{ route('product.edit', $products->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('product.destroy', $products->id) }}" method="POST">
              @method('DELETE')
              @csrf
              <button type="button" class="btn btn-danger productdel">Delete</button>
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
    {{ $product->render() }}
  </div>
  <script>
    $('.productdel').on('click', function(e) {
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