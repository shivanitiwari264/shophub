@extends('layouts.app')

@section('content')
<h2>Categories</h2>

<a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-3">Add Category</a>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>

    @foreach($categories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection
