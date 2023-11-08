@extends('layout')
@section('content')
<div class="row">
    @foreach ($products as $product)
    <div class="col-xs-12 col-3 my-3">
        <div class="img_thumbnail productlist">
            <div class="container-fluid">
                <img class="img-fluid" src="{{ $product->image_url }}" alt="{{ $product->name }}">
            </div>
            <div class="caption mt-2 text-center text-dark">
                <h4>{{ $product->name }}</h4>
                <p>{{ $product->description }}</p>
                <p><strong>Price: </strong> S/. {{ $product->sale_price }}</p>
                <p class="btn-holder">
                    <a href="{{ route('add_to_cart', $product->id) }}" class="btn bg-success text-white btn-block text-center" role="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-2 bi bi-cart-plus-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                        </svg>
                        Add to cart
                    </a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection