<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
    </div>

    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="form-group">
        <label>Product Category</label>
        <select name="product_category[]" class="form-control select2" multiple>
            @foreach($categories as $id => $title)
                <option value="{{ $id }}" {{ in_array($id, old('product_category', [])) ? 'selected' : '' }}>
                    {{ $title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Function Description</label>
        <textarea name="function_description" class="form-control trumbowyg">{{ old('function_description') }}</textarea>
    </div>

    <div class="form-group">
        <label>Product Description</label>
        <textarea name="product_description" class="form-control trumbowyg">{{ old('product_description') }}</textarea>
    </div>

    <div class="form-group">
        <label>Product Information</label>
        <textarea name="product_information" class="form-control trumbowyg">{{ old('product_information') }}</textarea>
    </div>

    <div class="form-group">
        <label>Delivery Description</label>
        <textarea name="delivery_description" class="form-control trumbowyg">{{ old('delivery_description') }}</textarea>
    </div>

    <div class="form-group">
        <label>Meta Title</label>
        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
    </div>

    <div class="form-group">
        <label>Meta Description</label>
        <textarea name="meta_description" class="form-control">{{ old('meta_description') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>
