<form id="edit_home_form" action="{{ route('custom-pages.update', $page->id) }}" method="post" enctype="multipart/form-data"></form>

	@csrf
    <div class="row">
        <input type="hidden" name="id" value="{{ $page->id }}">
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>Title <span class="red">*</span></label>
                <input type="text" class="form-control" name="title" value="{{ $page->title }}" required>
            </div>
        </div>
		<div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Slug (URL) <span class="red">*</span></label>
                <input type="text" class="form-control" name="slug" required>
            </div>
        </div>
		
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Status <span class="red">*</span></label>
                <select class="form-select" name="is_active" required>
                    <option value="0" {{ $page->isactive == 0 ? 'selected' : '' }}>Inactive</option>
                    <option value="1" {{ $page->isactive == 1 ? 'selected' : '' }}>Active</option>
                </select>
            </div>
        </div>

		<div class="row gallery-image-row">
            <div class="col-md-9">
                <div class="form-group row mb-3 ">
                    <div class="col-6 form-group mb-3">
						<label>Banner Image</label>
						<input class="form-control" type="file" id="banner" name="banner[]" accept=".jpg,.jpeg,.png,.webp">
                    </div>
                    <div class="col-6 form-group mb-3">
                        <label>Banner Text</label>
                        <input type="text" class="form-control" name="banner_text[]" value="">
                    </div>
                    <div class="col-6 form-group mb-3">
                        <label>Banner Button Text </label>
                        <input class="form-control" type="text" id="banner_button[]" name="banner_button[]">
                    </div>
                    <div class="col-6 form-group mb-3">
                        <label>Banner Url </label>
                        <input class="form-control" type="text" id="banner_url[]" name="banner_url[]">
                    </div>

                </div>
            </div>
            <div class="add-row-col-3-div col-md-3">
                <button type="button" class="btn btn-outline-success add-row my-2">Add More +</button>
            </div>
        </div>

		<div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Product section <span class="red">*</span></label>
                <select class="form-select" name="product_ids[]" required>
					@foreach ($products as $product )
						<option value="{{$product->id}}" {{ $page->product_ids == $product->id ? 'selected' : '' }}>{{$product->title}}</option>
					@endforeach
                </select>
            </div>
        </div>
		<div class="col-sm-6">
                <div class="form-group mb-3">
                    <label>About Images</label>
                    <input class="form-control" type="file" id="about_image" name="about_image" accept=".jpg,.jpeg,.png,.webp">
                </div>
            </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label>About Content<span class="red">*</span></label>
                <textarea class="form-control" name="about_content" rows="3" required>{{ $page->content }}</textarea>
            </div>
        </div>
		
        <div class="col-sm-12">
            <div class="form-group mb-3">
                <label>About Content<span class="red">*</span></label>
                <textarea class="form-control" name="about_content" rows="3" required>{{ $page->content }}</textarea>
            </div>
        </div>

		<div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Industry section <span class="red">*</span></label>
                <select class="form-select" name="product_category_id" required>
					@foreach ($product_categories as $product_category )
						<option value="{{$product_category->id}}" {{-- $page->product_ids == $product->id ? 'selected' : '' --}}>{{$product_category->title}}</option>
					@endforeach
                </select>
            </div>
        </div>

		<label>What we do Section</label>
		<div class="row gallery-image-row2">
            <div class="col-md-9">
                <div class="form-group row mb-3 ">
                    <div class="col-6 form-group mb-3">
						<label>Image</label>
						<input class="form-control" type="file" id="banner" name="wwd_image[]" accept=".jpg,.jpeg,.png,.webp">
                    </div>
                    <div class="col-6 form-group mb-3">
                        <label>Text</label>
                        <input type="text" class="form-control" name="wwd_text[]" value="">
                    </div>
                    <div class="col-6 form-group mb-3">
						<label>Content<span class="red">*</span></label>
						<textarea class="form-control" name="wwd_content[]" rows="3" required>{{ $page->content }}</textarea>
					</div>

                </div>
            </div>
            <div class="add-row-col-3-div col-md-3 ">
                <button type="button" class="btn btn-outline-success add-row2 my-2">Add More +</button>
            </div>
        </div>

		<div class="col-sm-6">
            <div class="form-group mb-3">
                <label>Industry section <span class="red">*</span></label>
                <select class="form-select" name="product_category_id" required>
					@foreach ($post_categories as $post_category )
						<option value="{{$post_category->id}}" {{-- $page->product_ids == $product->id ? 'selected' : '' --}}>{{$post_category->name}}</option>
					@endforeach
                </select>
            </div>
        </div>

		<div class="col-md-12">
			<label>Supply Chain Partner</label>
			<div class="col-12 form-group mb-3">
				<label>Content<span class="red">*</span></label>
				<textarea class="form-control" name="wwd_content" rows="3" required>{{ $page->content }}</textarea>
			</div>
			<div class="form-group row mb-3 ">
				<div class="col-6 form-group mb-3">
					<label>Image</label>
					<input class="form-control" type="file" id="banner" name="scp_image" accept=".jpg,.jpeg,.png,.webp">
				</div>
				<div class="col-6 form-group mb-3">
					<label>Text</label>
					<input type="text" class="form-control" name="scp_text" value="">
				</div>
				<div class="col-6 form-group mb-3">
					<label>PDF</label>
					<input class="form-control" type="file" name="scp_pdf">
				</div>
			</div>
			<div class="form-group row mb-3 ">
				<div class="col-6 form-group mb-3">
					<label>Image</label>
					<input class="form-control" type="file" id="banner" name="scp_image" accept=".jpg,.jpeg,.png,.webp">
				</div>
				<div class="col-6 form-group mb-3">
					<label>Text</label>
					<input type="text" class="form-control" name="scp_text" value="">
				</div>
				<div class="col-6 form-group mb-3">
					<label>URL</label>
					<input type="text" class="form-control" name="scp_url" value="">
				</div>
			</div>
			<div class="form-group row mb-3 ">
				<div class="col-6 form-group mb-3">
					<label>Image</label>
					<input class="form-control" type="file" id="banner" name="scp_image" accept=".jpg,.jpeg,.png,.webp">
				</div>
				<div class="col-6 form-group mb-3">
					<label>Text</label>
					<input type="text" class="form-control" name="scp_text" value="">
				</div>
				<div class="col-6 form-group mb-3">
					<label>PDF</label>
					<input class="form-control" type="file" name="scp_pdf">
				</div>
			</div>
		</div>

		<div class="col-sm-12">
			<label>Code Of Conduct Section</label>
            <div class="form-group mb-3">
                <label>Description<span class="red">*</span></label>
                <textarea class="form-control" name="about_content" rows="3" required>{{ $page->content }}</textarea>
            </div>
        </div>

		<div class="col-sm-12">
			<label>Seo Section</label>
            <div class="form-group mb-3">
				<label>Meta Title<span class="red">*</span></label>
				<input type="text" class="form-control" name="meta_title" value="{{ $page->content }}" required>
			</div>
            <div class="form-group mb-3">
                <label>Meta Description<span class="red">*</span></label>
                <textarea class="form-control" name="meta_description" rows="3" required>{{ $page->content }}</textarea>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group mb-3 text-end">
                <button type="submit" class="btn btn-block btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
	// alert('1');
	$(document).on('submit', '#edit_home_form', function (e) {
		e.preventDefault(); // Prevent the default form submission
		initValidate('#edit_home_form');
		var form = $(this);
		ajaxSubmit(e, form, responseHandler);
	});

    // Add row functionality for Banner Section
    $(document).on('click', '.add-row', function () {
        var newRow = $('.gallery-image-row').first().clone();
        newRow.find('input').val('');
        newRow.find('.add-row-col-3-div').remove();
        newRow.append('<div class="col-md-3"><button type="button" class="btn btn-outline-success add-row m-2">Add More +</button><button type="button" class="btn btn-outline-danger remove-row my-2">Remove</button></div>');
        $('.gallery-image-row').last().after(newRow);
    });

    // Remove row functionality for Banner Section
    $(document).on('click', '.remove-row', function () {
        if ($('.gallery-image-row').length > 1) {
            $(this).closest('.gallery-image-row').remove();
        } else {
            alert('At least one row is required.');
        }
    });

    // Repeat for What We Do Section and other sections
    $(document).on('click', '.add-row2', function () {
        var newRow = $('.gallery-image-row2').first().clone();
        newRow.find('input, textarea').val('');
        newRow.find('.add-row-col-3-div').remove();
        newRow.append('<div class="col-md-3"><button type="button" class="btn btn-outline-success add-row2 m-2">Add More +</button><button type="button" class="btn btn-outline-danger remove-row2 my-2">Remove</button></div>');
        $('.gallery-image-row2').last().after(newRow);
    });

    // Remove row functionality for What We Do Section
    $(document).on('click', '.remove-row2', function () {
        if ($('.gallery-image-row2').length > 1) {
            $(this).closest('.gallery-image-row2').remove();
        } else {
            alert('At least one row is required.');
        }
    });

});
</script>