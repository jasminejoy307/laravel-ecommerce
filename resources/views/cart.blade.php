<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</head>
<body>
    
<div class="container">
        <h1 class="mt-5 mb-4">Your Cart</h1>
        <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item->products->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->products->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                @if (Auth::check())
                <div class="mb-3">
                    <label for="addressId">Choose Address:</label>
                    <select class="form-control" id="addressId" name="addressId">
                        <option value="" disabled selected hidden>select</option>
                        @foreach ($addr as $value)
                        <option value="{{ $value->id }}" data-address="{{ $value->address }}" data-pincode="{{ $value->pincode }}">{{ $value->address }} - {{ $value->pincode }}</option>
                        @endforeach
                    </select>
                    @error('addressId') <div style="color: red">{{ $message }}</div> @enderror
                    <input type="hidden" id="address" name="address" value="0">
                </div>
                @else
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name">
                </div>
                @error('name') <div style="color: red">{{ $message }}</div> @enderror
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Enter email">
                </div>
                @error('email') <div style="color: red">{{ $message }}</div> @enderror
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                </div>
                @error('phone') <div style="color: red">{{ $message }}</div> @enderror
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"  placeholder="Enter address">
                </div>
                @error('address') <div style="color: red">{{ $message }}</div> @enderror
                @endif
                <div class="mb-3">
                    <label for="pincode">Pincode:</label>
                    <input type="number" class="form-control" {{ (Auth::check())?'readonly':'' }} id="pincode" name="pincode">
                </div>
                @error('pincode') <div style="color: red">{{ $message }}</div> @enderror
                <div class="mb-3">
                    <label for="delivery_date">Select Delivery Date:</label>
                    <input type="date" class="form-control" id="delivery_date" name="delivery_date">
                </div>
                @error('delivery_date') <div style="color: red">{{ $message }}</div> @enderror
                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>
        <script>
            $('#addressId').change(function() {
                var adr = $(this).find('option:selected').data('pincode');
                var pin = $(this).find('option:selected').data('pincode');
                $('#address').val(adr);
                $('#pincode').val(pin);
            })
        </script>
</body>
</html>