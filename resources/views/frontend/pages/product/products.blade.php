@extends('frontend.layouts.app')

@section('page.title', 'Products')

@section('page.content')
  
<main class="product_categories_page">

<section class="banner" id="product_categories_banner_img">
    <div class="container">
        <div class="banner_heading_div text-center">
            <h2 class="text-light banner_heading_text">Products</h2>
            <ul class="list-group list-unstyled list-group-horizontal banner_heading_breadcrumb">
                <li class="list-group-item"><a href=""><i class="fa fa-house text-light"></i></a></li>
                <li class="list-group-item"><a href="{{ route('index') }}">Home</a></li> > 
                <li class="list-group-item"><p class="mb-0">Products</p></li>
            </ul>
        </div>
    </div>
</section>

<section class="white_section gallery_filter">
    <div class="container py-md-5">
        <div class="row">
            <div class="col-md-3 sidebar">                
                <form action="{{ route('products_s') }}" method="GET" id="searchForm">
                    <div class="search-bar-filter">
                        <button type="submit" class="btn search_btn me-2">
                            <i class="fa fa-search"></i>
                        </button>
                        <input type="text" name="search" class="product-search form-control" placeholder="Search for Product" value="{{ request('search') }}">
                    </div>
                    
                    <div class="row ps-lg-3 px-3 select2_industry">
                        <div class="col-md-10 col-10 p-0">
                            <div class="form-group mb-3">
                                <label class="pb-1 pt-2">Industry</label>
                                <select class="select2 form-select border-0 rounded-0" name="industry" id="industrySelect">
                                    <option value="">Select Industry</option>
                                    @foreach($Industry as $row)
                                        <option value="{{ $row->id }}" @if(request('industry') == $row->id) selected @endif>{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 col-2 margin36 p-0">
                            <button class="border-0 p-0 rounded-0" onchange="submitCategoryForm()">
                                <i class="btn p-0 rounded-0 btn-primary fa fa-search padding6"></i>
                            </button>
                        </div>
                    </div>
                  

                    <input type="hidden" id="pre_category_ids" value="{{ is_array($categoryIds) ? implode(',', $categoryIds) : $categoryIds }}">
                    <input type="hidden" id="category_ids_hidden" name="category_ids" value="">
                    
                    <div class="d-flex justify-content-between">
                        <ul class="list-group filter_list">
                            <li onclick="viewAllCategories()" class="cursor-pointer list-group-item @if(empty($categoryIds)) active @endif">
                                All Categories
                            </li>
                            @foreach($productCategories as $category)
                                <li class="cursor-pointer list-group-item @if(is_array($categoryIds) && in_array($category->id, $categoryIds)) active @endif">
                                    <input type="checkbox" class="category_checkbox" id="category_ids" value="{{ $category->id }}" 
                                    onchange="updateCategoryIds(this)"
                                    @if(is_array($categoryIds) && in_array($category->id, $categoryIds)) checked @endif
                                    >
                                    {{ $category->title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </form>
            </div>
            <div class="col-md-9 product_filter_gallery">
                @if($products->isEmpty())
                    <p class="text-center">No products available.</p>
                @else
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 col-6 product_filter_gallery_div">
                                <a onclick="enquiry({{ $product->id }})" class="d-block text-decoration-none">
                                    <div class="card">
                                        <!-- <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="product_card_image card-img-top"> -->
                                        <span class="product_img_heading">{{ $product->title }}</span>
                                        <div class="card-body d-flex align-items-center justify-content-center">
                                            <p class="card-text">{{ $product->title }}</p>
                                            <i class="btn btn-primary fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination Links -->
                    <div class="col-12 text-center pt-md-5 mt-md-0 mt-4">
                        {{ $products->appends(['category_id' => $categoryIds])->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>


{{------------------------- Modal popup ------------------------}}

<div class="modal fade product_form" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Enquire Now</h5>
          <button type="button" onclick="closeModal()" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="add_partner_us_form" action="{{ route('form.save') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><input type="hidden" name="form_type" value="product_listing"></div>
                
                <div class="form-group"><input required type="text" name="company_name" class="form-control" placeholder="Company Name"></div>
                <div class="form-group"><input required type="text" name="full_name" class="form-control" placeholder="Full Name"></div>
                
                <div class="custom-dropdown">
                    <select required name="product" id="productSelect" class="form-control custom-select form-group">
                        <option value="">---Select Product---</option>
                        @foreach ($products_list as $row)
                            <option value="{{ $row->id }}">{{ $row->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group"> <input type="number" class="form-control" name="quantity" required placeholder="Quantity" min="0"></div>
                <div class="form-group"><input required type="email" name="email" class="form-control" placeholder="Email Address"></div>
                
                <textarea class="col-12 mb-3" name="message" id="message" placeholder="Message" rows="2"></textarea>
                <button type="submit" class="btn btn-primary mt-md-3 mt-0">SEND</button>
            </form>
        </div>
      </div>
    </div>
</div>

{{------------------------- Modal popup ------------------------}}

@endsection

@section('page.scripts')
<script>
$(document).ready(function() {
    initSelect2('.select2');
});

function submitCategoryForm() {// Ensure the category_ids are updated before submitting
    document.getElementById('searchForm').submit();
}

function updateCategoryIds(checkbox) {
    // Get all checked checkboxes
    const preCategoryIdsValue = document.querySelector('input[id="pre_category_ids"]').value;
    let preCategoryIds = preCategoryIdsValue ? preCategoryIdsValue.split(',') : [];

    // Get all checked checkboxes
    const checkboxes = document.querySelectorAll('input[id="category_ids"]:checked');
    let selectedIds = Array.from(checkboxes).map(checkbox => checkbox.value);

    // Check if the industrySelect has a value
    if (industrySelect.value) {
        selectedIds = selectedIds.filter(id => !preCategoryIds.includes(id));
        preCategoryIds = [];
    } 

    // Remove the unchecked checkbox value from pre_category_ids if it exists
    if (!checkbox.checked) {
        const index = preCategoryIds.indexOf(checkbox.value);
        if (index !== -1) {
            preCategoryIds.splice(index, 1); // Remove the ID
        }
    }

    // Merge remaining pre_category_ids with selectedIds
    const allIds = [...new Set([...preCategoryIds, ...selectedIds])];

    // Update the hidden input field
    document.getElementById('category_ids_hidden').value = allIds.join(',');

    // Clear the selected value in the industry select box
    document.getElementById('industrySelect').value = '';

    submitCategoryForm();
}




function viewAllCategories() {
    // Clear the search input field using getElementsByClassName
    var searchInputs = document.getElementsByClassName('product-search');
    if (searchInputs.length > 0) {
        searchInputs[0].value = '';
    }

    // Clear the category_id hidden field
    document.getElementById('category_id').value = '';

    // Submit the form using getElementsByClassName
    var searchForm = document.getElementsByClassName('searchForm');
    if (searchForm.length > 0) {
        searchForm[0].submit();
    }
}

function closeModal() {
    $('#exampleModalCenter').modal('hide');
}

function enquiry(productID) {
    // Set the selected product in the dropdown
    const productSelect = document.getElementById('productSelect');
    productSelect.value = productID;

    // Open the modal
    $('#exampleModalCenter').modal('show');
}


$(document).ready(function() {
    initValidate('#add_partner_us_form');
    $("#add_partner_us_form").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, responseHandler);
    });

    var responseHandler = function(response) {
        $('input, textarea').val('');
        $("select option:first").prop('selected', true);
        setTimeout(function() {
            location.reload();
        }, 1000);
    }
});

</script>
@endsection
