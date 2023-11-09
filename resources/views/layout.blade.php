<!DOCTYPE html>
<html>

<head>
    <title>Store Forces GYM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <nav class="navbar bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex justify-content-start" href="{{ route('inicio') }}">
                <strong class="ms-5 text-white">Forces Gym</strong>
            </a>

            <div class="d-flex justify-content-end">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="dropdown">
                            <button id="dLabel" type="button" class="btn me-5 bg-white" data-bs-toggle="dropdown">
                                <i class="fa fa-shopping-cart me-2" aria-hidden="true"></i>
                                <span class="badge bg-white">
                                    <strong style="color: #1f2937;">
                                        @if (session('cart'))
                                            {{ count((array) session('cart')->getItems()) }}
                                        @else
                                            0
                                        @endif
                                    </strong>
                                </span>
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dLabel">
                                <div class="row total-header-section">
                                    <div class="col-lg-12 col-sm-12 col-12 total-section text-center">
                                        @if (session('cart'))
                                            <p class="fw-bold">Total: <span class="text-success">S/.
                                                    {{ session('cart')->calculateTotal() }}</span></p>
                                        @endif
                                    </div>
                                </div>
                                @if (session('cart'))
                                    @foreach (session('cart')->getItems() as $item)
                                        <div class="row cart-detail">
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                                <img src="{{ $item->product->image_url }}" />
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                <p class="fw-bold">{{ $item->product->name }}</p>
                                                <p class="price text-success fw-bold">
                                                    S/. {{ $item->price }}
                                                </p>
                                                <p class="count fw-bold">
                                                    Cantidad: {{ $item->quantity }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('cart') }}" class="btn btn-dark">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16"
                                                height="16" fill="currentColor" class="bi bi-eye-fill"
                                                viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                            ¡Ver carrito!
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <br />
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    @yield('scripts')
</body>

</html>
