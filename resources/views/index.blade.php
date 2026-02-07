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
            <h2>Product Stock</h2>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Buy Qty</th>
                        <th>Sell Qty</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Stock Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $key => $stock)
                        <tr>
                            <td>{{ $stocks->firstItem() + $key }}</td>
                            <td>{{ $stock->product->name }}</td>
                            <td>{{ $stock->buy_quantity }}</td>
                            <td>{{ $stock->sell_quantity }}</td>
                            <td>{{ $stock->stock_quantity }}</td>
                            <td>{{ $stock->product->price }}</td>
                            <td>{{ $stock->stock_quantity * $stock->product->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $stocks->links() }}


        </div>
        <div class="d-flex justify-content-between my-1">
            <h2>Add Product</h2>

        </div>

        <div class="bg-dark-subtle p-5">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                        required>
                </div>
                <div class="mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit"
                        required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity"
                        min="0" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price"
                        min="0" required>
                </div>


                <button type="submit" class="btn btn-dark mt-2">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
