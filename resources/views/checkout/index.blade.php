@extends('layouts.app')
@section('title','Checkout')

@section('content')

<style>
    .checkout-card {
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }
</style>

<div class="container py-5">
    <div class="row">

        <!-- Billing -->
        <div class="col-md-7">
            <div class="card checkout-card mb-4">
                <div class="card-header bg-primary text-white">
                    📦 Billing Details
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->name }}">
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>City</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Pincode</label>
                            <input type="text" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Summary -->
        <div class="col-md-5">
            <div class="card checkout-card">
                <div class="card-header bg-dark text-white">
                    🧾 Order Summary
                </div>
                <div class="card-body">
                    <p>Items Total: <strong>₹{{ $grandTotal ?? '—' }}</strong></p>
                    <p>Delivery: <strong>₹50</strong></p>
                    <hr>
                    <h5>Total Payable: ₹{{ isset($grandTotal) ? $grandTotal + 50 : '—' }}</h5>

                    <button class="btn btn-success w-100 mt-3">
                        Place Order
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
