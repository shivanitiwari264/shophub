@extends('layouts.app')

@section('content')
<h2>Edit Category</h2>

<form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Category Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
    </div>

    <button class="btn btn-success">Update</button>
</form>
@endsection
