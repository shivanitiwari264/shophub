@extends('layouts.app')

@section('content')
<h1>Admin Dashboard</h1>

<div class="row mt-4">

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h4>Categories</h4>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary mt-2">Manage</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h4>Products</h4>
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary mt-2">Manage</a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h4>Orders</h4>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary mt-2">View</a>
        </div>
    </div>

</div>
@endsection
