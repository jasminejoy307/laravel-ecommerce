@include('common.header')
    <div class="container">
        <h1>Order Items</h1>
        {{-- <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>User</th>
                    <th>Address</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($order as $key => $orderItem)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $orderItem->Products->name }}</td>
                    <td>{{ $orderItem->orders->user->name }}</td>
                    <td>{{ $orderItem->orders->Address->address }}</td>
                    <td>{{ $orderItem->qty }}</td>
                    <td>{{ $orderItem->price }}</td>
                    <td>{{ $orderItem->qty * $orderItem->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
        <h5>Name: {{ $order->user->name }}</h5>
        <h5>Address: {{ $order->Address->address.' | '.$order->Address->pincode }}</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderlist as $key => $orderItem)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $orderItem->Products->name }}</td>
                    <td>{{ $orderItem->qty }}</td>
                    <td>{{ $orderItem->price }}</td>
                    <td>{{ $orderItem->qty * $orderItem->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('common.footer')
