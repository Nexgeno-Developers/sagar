@extends('backend.layouts.app')

@section('page.name', 'Website Pages')

@section('page.content')
<div class="card">
   <div class="card-body">
      <div class="row mb-2">
         <div class="col-sm-5">
            <!--<h3>List</h3>-->
         </div>
         <div class="col-sm-7">
			{{--
            <div class="text-sm-end">
                <a href="javascript:void(0);" class="btn btn-danger mb-2" onclick="smallModal('{{ url(route('page.add')) }}', 'Add Page')"><i class="mdi mdi-plus-circle me-2"></i> Add Page</a>
            </div>
			--}}
         </div>
         <!-- end col-->
      </div>
      <div class="table-responsive">
      <table id="basic-datatable" class="table dt-responsive nowrap1 w-100">
	  <thead>
            <tr>
                <th data-breakpoints="lg">#</th>
                <th>Name</th>
                <th data-breakpoints="md">URL</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
		<tbody>
        	@foreach (\App\Models\Page::all() as $key => $page)
        	<tr>
        		<td>{{ $key+1 }}</td>
        		
				@if($page->type == 'home_page')
        			<td><a href="{{ route('custom-pages.show_custom_page', $page->slug) }}" class="text-reset">{{ $page->title }}</a></td>
					<td>{{ route('index') }}</td>
				@else
        			<td><a href="{{ route('custom-pages.show_custom_page', $page->slug) }}" class="text-reset">{{ $page->title }}</a></td>
					<td>{{ route('index') }}/{{ $page->slug }}</td>
				@endif
        		<td class="text-right">
					@if($page->type == 'home_page')
					<a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('custom-pages.edit', ['id'=>$page->slug, 'lang'=>env('DEFAULT_LANGUAGE'), 'page'=>'home'] )) }}', 'Edit')"> <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>
					@else
					<a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('custom-pages.edit', ['id'=>$page->slug, 'lang'=>env('DEFAULT_LANGUAGE'), 'page'=>$page->id] )) }}', 'Edit')"> <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>
					@endif
					@if($page->type != 'home_page')
					<a href="javascript:void(0);" class="action-icon" onclick="confirmModal('{{ url(route('custom-pages.destroy', $page->id)) }}', responseHandler)"><i class="mdi mdi-delete" title="Delete"></i></a>
          			@endif
        		</td>
        	</tr>
        	@endforeach
        </tbody>
        
    </table>
      </div>
   </div>
   <!-- end card-body-->
</div>
@endsection

@section("page.scripts")
<script>
	$(document).ready(function() {
    console.log($('#edit_home_form').length); // Check if the form is present

    $(document).on('shown.bs.modal', '#largeModal', function () {
        console.log('Modal shown and form exists:', $('#edit_home_form').length);

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
    });
});

    var responseHandler = function(response) {
        location.reload();
    }
</script>
@endsection