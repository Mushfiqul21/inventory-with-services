<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    @include('navbar')
    <div class="container">
        <div class="d-flex justify-content-between my-1">
            <h2>Order List</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ number_format($order->price, 2) }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ number_format($order->total_price, 2) }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No orders found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $orders->links() }}

        </div>
        <div class="d-flex justify-content-between my-1">
            <h2>Add Order</h2>

        </div>

        <div class="bg-dark-subtle p-5">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 ">
                        <label>Product</label>
                        <select name="product_id" class="form-control" required>
                            <option value="">-- Select Product --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">
                                    {{ $product->name }}
                                    (Stock: {{ $product->stock->stock_quantity }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 ">
                        <label>Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label>Price</label>
                        <input type="number" name="price" id="price" class="form-control" min="1" required>
                    </div>
                    <div class="col-md-6 mt-2">
                        <label>Total Price</label>
                        <input type="number" name="price" id="total_price" class="form-control" min="1" disabled>
                    </div>
                </div>

                <button class="btn btn-dark mt-4" type="submit">
                    Create Order
                </button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    const qtyInput = document.getElementById('quantity');
    const priceInput = document.getElementById('price');
    const totalInput = document.getElementById('total_price');

    function calculateTotal() {
        const qty = parseFloat(qtyInput.value) || 0;
        const price = parseFloat(priceInput.value) || 0;
        totalInput.value = (qty * price).toFixed(2);
    }

    qtyInput.addEventListener('input', calculateTotal);
    priceInput.addEventListener('input', calculateTotal);
</script>

</body>

</html>
