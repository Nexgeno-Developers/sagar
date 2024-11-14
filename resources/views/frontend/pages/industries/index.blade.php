@extends('frontend.layouts.app')

@section('page.title', 'Industries')

@section('page.content')
  
<main class="industries_page" id="industries_page">

<section class="banner" id="product_categories_banner_img">
    <div class="container">
        <div class="banner_heading_div text-center">
            <h2 class="text-light banner_heading_text">Industries</h2>
            <ul class="list-group list-unstyled list-group-horizontal banner_heading_breadcrumb">
                <li class="list-group-item"><a href=""><i class="fa fa-house text-light"></i></a></li>
                <li class="list-group-item"><a href="{{ route('index') }}">Home</a></li> > 
                <li class="list-group-item"><p class="mb-0">Industries</p></li>
            </ul>
        </div>
    </div>
</section>

<section class="white_section industries_product_section py-lg-5 py-3">
    <div class="container">
        {{-- <div class="row row-cols-1 row-cols-md-3 g-4 accordion mb-md-3 industries_accordion" id="faq_accordion">  
           
                @foreach ($industries as $index => $industry)
                    <div class="col">
                        <div class="accordion-item mb-md-2 mb-0">
                            <h5 class="function_title mb-lg-3 mb-md-1 mb-0">
                                <button 
                                    class="accordion-button collapsed" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#collapse{{ $index }}" 
                                    aria-expanded="false" 
                                    aria-controls="collapse{{ $index }}">
                                    {{ $industry->title }} <!-- Product title -->
                                </button>
                            </h5>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#product_accordion">
                                <div class="accordion-body">
                                    {!! $industry->description !!} <!-- Product description -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



        
        </div> --}}

        <div class="row justify-content-center"> 
            <div class="col-lg-3 col-md-4 col-6 our_product_cards_div">
                <a href="" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                    <div class="card">
                        <div class="product_description_div">
                            <img src="/assets/frontend/images/industry_img_4.png" 
                            class="product_card_image card-img-top" alt="product image" loading="lazy">
                            <div class="product_description">
                                <p class="product_description_text pe-lg-3">Lorem ipsum Doler Dummy text and div</p>
                            </div>
                        </div>
                        <div class="card-body d-flex">
                            <span class="product_img_heading">Lorem ipsum</span>
                            <!-- <p class="card-text">Hello</p> -->
                            <i class="btn btn-primary fa fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div> 

            <div class="col-lg-3 col-md-4 col-6 our_product_cards_div">
                <a href="" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                    <div class="card">
                        <div class="product_description_div">
                            <img src="/assets/frontend/images/industry_img_3.png" 
                            class="product_card_image card-img-top" alt="product image" loading="lazy">
                            <div class="product_description">
                                <p class="product_description_text pe-lg-3">Lorem ipsum Doler Dummy text and div</p>
                            </div>
                        </div>
                        <div class="card-body d-flex">
                            <span class="product_img_heading">Lorem ipsum</span>
                            <!-- <p class="card-text">Hello</p> -->
                            <i class="btn btn-primary fa fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div> 
            
            <div class="col-lg-3 col-md-4 col-6 our_product_cards_div">
                <a href="" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                    <div class="card">
                        <div class="product_description_div">
                            <img src="/assets/frontend/images/industry_img_2.png" 
                            class="product_card_image card-img-top" alt="product image" loading="lazy">
                            <div class="product_description">
                                <p class="product_description_text pe-lg-3">Lorem ipsum Doler Dummy text and div</p>
                            </div>
                        </div>
                        <div class="card-body d-flex">
                            <span class="product_img_heading">Lorem ipsum</span>
                            <!-- <p class="card-text">Hello</p> -->
                            <i class="btn btn-primary fa fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div> 
            
            <div class="col-lg-3 col-md-4 col-6 our_product_cards_div">
                <a href="" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                    <div class="card">
                        <div class="product_description_div">
                            <img src="/assets/frontend/images/industry_img_1.png" 
                            class="product_card_image card-img-top" alt="product image" loading="lazy">
                            <div class="product_description">
                                <p class="product_description_text pe-lg-3">Lorem ipsum Doler Dummy text and div</p>
                            </div>
                        </div>
                        <div class="card-body d-flex">
                            <span class="product_img_heading">Lorem ipsum</span>
                            <!-- <p class="card-text">Hello</p> -->
                            <i class="btn btn-primary fa fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div> 
            
        </div>

        <!-- Pagination Links -->
    </div>
</section>

</main>
@endsection
