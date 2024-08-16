@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
        </div>
    </div>

    @if($products->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products found.</p>
    @endif
</div>
@endsection
