@extends('backend.layouts.app')

@section('page.name', 'Product Category')

@section('page.content')
<div class="card">
   <div class="card-body">
      <div class="row mb-2">
         <div class="col-sm-5">
            {{--<h3>List</h3>--}}
         </div>
         <div class="col-sm-7">
            <div class="text-sm-end">
                <a href="javascript:void(0);" class="btn btn-danger mb-2" onclick="largeModal('{{ url(route('product-categories.create')) }}', 'Add Category')"><i class="mdi mdi-plus-circle me-2"></i> Add Category</a>
            </div>
         </div>
         <!-- end col-->
      </div>
      <div class="table-responsive">
      <table id="basic-datatable" class="table dt-responsive nowrap w-100">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @foreach($productCategories as $row)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$row->title}}</td>
                <td>{{$row->slug}}</td>
                <td>{{ ( $row->is_industry == 1) ? 'Industry' : 'Products' }}</td>
                <td>
                    @if($row->is_active == 1)
                    <span class="badge bg-success" title="Inactive">Active</span>
                    @else
                    <span class="badge bg-danger" title="Active">Inctive</span>
                    @endif
                </td>
                <td>
                    <a href="javascript:void(0);" class="action-icon" onclick="largeModal('{{ url(route('product-categories.edit',['id' => $row->id])) }}', 'Edit Product')"> <i class="mdi mdi-square-edit-outline" title="Edit"></i></a>
                    <a href="javascript:void(0);" class="action-icon" onclick="confirmModal('{{ url(route('product-categories.destroy', $row->id)) }}', responseHandler)"><i class="mdi mdi-delete" title="Delete"></i></a>
                </td>
            </tr>
            @endforeach
    </table>
      </div>
   </div>
   <!-- end card-body-->
</div>
@endsection

@section("page.scripts")
<script>
    var responseHandler = function(response) {
        location.reload();
    }
</script>
@endsection
