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
        <div class="row row-cols-1 row-cols-md-3 g-4 accordion mb-md-3 industries_accordion" id="faq_accordion">  
           
                @foreach ($products as $index => $product)
                    <div class="col">
                        <div class="accordion-item mb-2">
                            <h5 class="function_title mb-lg-3 mb-md-1 mb-0">
                                <button 
                                    class="accordion-button collapsed" 
                                    type="button" 
                                    data-bs-toggle="collapse" 
                                    data-bs-target="#collapse{{ $index }}" 
                                    aria-expanded="false" 
                                    aria-controls="collapse{{ $index }}">
                                    {{ $product->title }} <!-- Product title -->
                                </button>
                            </h5>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#product_accordion">
                                <div class="accordion-body">
                                    {!! $product->product_description !!} <!-- Product description -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



        
        </div>

        <!-- Pagination Links -->
    </div>
</section>

</main>
@endsection
