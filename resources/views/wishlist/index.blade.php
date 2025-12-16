@extends('layouts.app')
@section('title','My Wishlist')
@section('content')
<style>
    .wishlist-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
    }

    .wishlist-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    .wishlist-card img {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .wishlist-empty {
        font-size: 1.2rem;
        color: #856404;
        background: #fff3cd;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }
</style>

<div class="container py-5">

    <h3 class="mb-4 text-center">❤️ My Wishlist</h3>

    @if($wishlist->count())

        <div class="row g-4">

            @foreach($wishlist as $item)

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm wishlist-card">

                    <img src="{{ $item->product->image }}"
                         alt="{{ $item->product->name }}"
                         class="card-img-top"
                         height="180"
                         style="object-fit:cover">

                    <div class="card-body text-center">

                        <h6 class="fw-semibold mb-1">
                            {{ $item->product->name }}
                        </h6>

                        <p class="fw-bold text-success mb-3">
                            ₹{{ $item->product->price }}
                        </p>

                        <div class="d-grid gap-2">
                            <a href="/cart/add/{{ $item->product->id }}"
                               class="btn btn-sm btn-primary">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </a>

                            <a href="/wishlist/remove/{{ $item->id }}"
                               class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i> Remove
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            @endforeach

        </div>

    @else
        <div class="wishlist-empty">
            😔 Your wishlist is empty
        </div>
    @endif
</div>
@endsection
