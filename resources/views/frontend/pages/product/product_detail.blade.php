@extends('frontend.layouts.app')

@section('page.title', 'Saagar')

@section('page.description', 'description')

@section('page.type', 'website')

@section('page.content')
  
<main class="products_page product_di_butyl_phosphate" id="di_butyl_phosphate">
        
        <section class="banner" id="product_categories_banner_img">
            <div class="container ">
                <div class="banner_heading_div text-center">
                    <h2 class="text-light banner_heading_text">{{$page_name}}</h2>
                    <ul class="list-group list-unstyled list-group-horizontal banner_heading_breadcrumb">
                        <li class="list-group-item"><a href=""><i class="fa fa-house text-light"></i></a></li>
                        <li class="list-group-item"><a href="{{route('index')}}">Home</a></li> > 
                        <li class="list-group-item"><p class="mb-0">{{$page_name}}</p></li>
                    </ul>
                </div>                
            </div>
        </section>

        <section class="white_section product_info">
            <div class="container product-section py-md-5">
                <div class="row">
                    <div class="col-md-5 text-center product_img_div">
                        <img class="img-fluid product_img" src="{{ asset('storage/' . $image)}}" alt="Chemical Structure">
                    </div>
                    <div class="col-md-7 ps-md-5 product_details">
                        <div class="product_heading_btn_next_prev_div">
                            <h2 class="product_heading text-start pb-md-1"><span class="our">{{$page_name}}</span></h2>
                            <div class="col-md-2 btn_next_prev_div">
                                    <i class="fa fa-arrow-left btn btn-primary disabled"></i>
                                    <i class="fa fa-arrow-right btn btn-primary"></i>
                            </div>
                        </div>
                        <h5 class="function_title text-dark">Function</h5>
                        <p class="mb-md-4">It is an active antihydrolysis agent for polyester polyurethanes produced by hot casting as well as for adhesives based on polyester polyurethane.</p>
                        <div class="product_description">
                            <div class="accordion" id="product_accordion">
                                <div class="accordion-item mb-2">
                                    <h5 class="function_title mb-3">
                                        <button 
                                            class="accordion-button show" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#collapseOne" 
                                            aria-expanded="true" 
                                            aria-controls="collapseOne">
                                            Product Description
                                        </button>
                                    </h5>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#product_accordion">
                                        <div class="accordion-body">
                                            <p><strong>Chemical composition</strong>: Monomeric carbodiimide</p>
                                            <p><strong>Physical form</strong>: slightly yellowish, crystallized melt</p>
                                            <p><strong>Density</strong>: approx. 0.97 g/cm3 (20 °C / 68 °F) approx. 0.95 g/cm3 (50 °C / 122 °F)</p>
                                            <p><strong>Melting Range</strong>: 45 – 52 °C / 113 – 126 °F (DSC main peak)</p>
                                            <p><strong>Viscosity</strong>: 16.0 – 24.0 mPa s (50 °C / 122 °F)</p>
                                            <p><strong>Solubility</strong>: soluble in organic solvents, e.g. aceton, dichloromethane; insoluble in water</p>
                                            <p><strong>Carbodiimide content</strong>: min. 10.0 %</p>
                                            <p>The analytical data are general guide values.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item mb-2">
                                    <h5 class="function_title mb-3">
                                        <button 
                                            class="accordion-button collapsed" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#collapseTwo" 
                                            aria-expanded="true" 
                                            aria-controls="collapseOne">
                                            Product information
                                        </button>
                                    </h5>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#product_accordion">
                                        <div class="accordion-body">
                                            <p><strong>Chemical composition</strong>: Monomeric carbodiimide</p>
                                            <p><strong>Physical form</strong>: slightly yellowish, crystallized melt</p>
                                            <p><strong>Density</strong>: approx. 0.97 g/cm3 (20 °C / 68 °F) approx. 0.95 g/cm3 (50 °C / 122 °F)</p>
                                            <p><strong>Melting Range</strong>: 45 – 52 °C / 113 – 126 °F (DSC main peak)</p>
                                            <p><strong>Viscosity</strong>: 16.0 – 24.0 mPa s (50 °C / 122 °F)</p>
                                            <p><strong>Solubility</strong>: soluble in organic solvents, e.g. aceton, dichloromethane; insoluble in water</p>
                                            <p><strong>Carbodiimide content</strong>: min. 10.0 %</p>
                                            <p>The analytical data are general guide values.</p>
                                        </div>
                                    </div>
                                </div>
                                            
                        </div>
                        <h5 class="product_description mt-md-3"></h5>
                        <!-- Add more product information here -->
                    </div>
                </div>
                <div class="col-md-12 pt-md-5">
                    <h4 class="product_heading text-start pb-md-1"><span class="our">Modes </span>of Delivery:</h4>
                    <p class="since_content">
                        We supply material by road, sea and air depending upon the nature of chemical and shipping requirement.
                    </p>
                </div>
                </div>
            </div>
        </section>
        
        <section class="white_section product_info">
            <div class="container product-section pb-md-5 product_filter_gallery ">
                <div class="row">
                    <h2 class="product_heading text-start pb-md-1"><span class="our">Related </span>Products</h2>
                    @foreach($related_products as $related_product)
                        <div class="col-md-3 product_filter_gallery_div">
                            <div class="card">
                                <img src="{{ asset('storage/' . $related_product->image) }}" alt="{{ $related_product->title }}" class="product_card_image card-img-top">
                                <div class="card-body d-flex">
                                    <a href="{{ route('product.detail', $related_product->slug) }}" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                                        <p class="card-text">{{ $related_product->title }}</p>
                                        <i class="btn btn-primary fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>


@endsection