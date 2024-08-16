@extends('backend.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mb-3">
            <a href="{{ route('product-categories.create') }}" class="btn btn-primary">Add Category</a>
        </div>
    </div>

    @if($productCategories->count())
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
                @foreach($productCategories as $category)
                    <tr>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <a href="{{ route('product-categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('product-categories.destroy', $category->id) }}" method="POST" style="display:inline;">
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
        <p>No categories found.</p>
    @endif
</div>
@endsection
