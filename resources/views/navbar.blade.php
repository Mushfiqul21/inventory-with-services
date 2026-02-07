    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container py-2">
            <a class="navbar-brand" href="#">Inventory Management System</a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible Menu -->
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Stocks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.index') }}">Orders</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
