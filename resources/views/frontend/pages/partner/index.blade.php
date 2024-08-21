@extends('frontend.layouts.app')

@section('page.title', 'Saagar')

@section('page.description', 'description')

@section('page.type', 'website')

@section('page.content')
@php
    if (!empty($page->content)) {
        $data = $page->content;
        $decoded_data = json_decode($data);

        /*
        echo '<pre>';
        print_r($decoded_data);
        echo '</pre>';
        exit();
        */
        
        $about_content = $decoded_data->about_content ?? '';
        $faqs = $decoded_data->faqs ?? '';


    } else {
        // If content is empty, set default empty values
        $about_content =  '';
        $faqs =  '';
    }
@endphp
<main class="enquire_page">

<section class="first_section bg_smoky_img">
    <div class="container enquiry_section">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 left_section text-light">
                {!! $about_content !!}
            </div>
            <div class="col-md-5 right_section">
                <h3 class="fs-24" >Enquire Now</h3>
                <form>
                    <input type="text" class="form-control" placeholder="Company Name">
                    <input type="text" class="form-control" placeholder="Full Name">
                    <input type="tel" class="form-control" placeholder="Mobile">
                    <input type="email" class="form-control" placeholder="Email Address">
                    <div class="custom-dropdown">
                        <select class="form-control custom-select">
                            <option>Select Product</option>
                            <option value="vinyl">Vinyl</option>
                            <option value="ethelene">Ethelene</option>
                            <option value="methyl">Methyl</option>
                            <option value="acetone">Acetone</option>
                            <!-- Add your options here -->
                        </select>
                    </div>
                    <!--<input type="number" class="form-control" placeholder="Quantity">-->
                    <!-- <input type="text" class="form-control" placeholder="Type Code">
                    
                    <div>
                        <img src="captcha_image.jpg" alt="CAPTCHA" class="img-fluid">
                    </div> -->
                    <textarea class="col-md-12 mb-3" name="" id="" placeholder="Message" rows="2"></textarea>
                    <button type="submit" class="btn btn-primary mt-3">SEND</button>
                </form>
            </div>
        </div>
    </div>
</section>

@if (!empty($faqs))
<section class="white_section faq">
    <div class="container py-md-5">
        <h2 class="product_heading text-center pb-md-5">Frequently Asked<span class="our"> Question</span></h2>
        <div class="row row-cols-1 row-cols-md-3 g-4 accordion mb-md-3" id="faq_accordion">
            @foreach ($faqs as $index => $faq)
                <div class="col">
                    <div class="accordion-item mb-2">
                        <h5 class="function_title mb-3">
                            <button 
                                class="accordion-button show" 
                                type="button" 
                                data-bs-toggle="collapse" 
                                data-bs-target="#collapse{{$index}}" 
                                aria-expanded="true" 
                                aria-controls="collapse{{$index}}">
                                {{$faq->question}}
                            </button>
                        </h5>
                        <div id="collapse{{$index}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$index}}" data-bs-parent="#product_accordion">
                            <div class="accordion-body">
                                {!! $faq->answer !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

</main>


@endsection