@extends('frontend.layouts.app')

@section('page.title', $page->meta_title)

@section('page.description', $page->meta_description)

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
                <div class="col-lg-5 col-md-6">
                    <div class="col-12 right_section">
                        <h3 class="fs-24" >Enquire Now</h3>
                        <form id="add_partner_us_form" action="{{ route('form.save') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group"><input type="hidden" name="form_type" value="partner_us"></div>
                            

                            <div class="form-group"><input required type="text" name="company_name" class="form-control" placeholder="Company Name"></div>
                            <div class="form-group"><input required type="text" name="full_name" class="form-control" placeholder="Full Name"></div>
                            <div class="custom-dropdown">
                                <select required name="product" class="form-control custom-select form-group">
                                    <!-- Add your options here -->
                                     <option value="Select Product">---Select Product---</option>
                                    @foreach ($products_list as $row)
                                        <option value="{{ $row->title }}">{{ $row->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <input required type="tel" name="mobile" class="form-control" placeholder="Mobile"> -->
                           <div class="form-group"> <input type="number" class="form-control" name="quantity" required placeholder="Quantity" min="0"></div>
                            <div class="form-group"><input required type="email" name="email" class="form-control" placeholder="Email Address"></div>
                            <!-- <input type="text" class="form-control" placeholder="Type Code">
                            
                            <div>
                                <img src="captcha_image.jpg" alt="CAPTCHA" class="img-fluid">
                            </div> -->
                            <textarea class="col-12 mb-3" name="message" id="message" placeholder="Message" rows="2"></textarea>
                            <button type="submit" class="btn btn-primary mt-md-3 mt-0">SEND</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (!empty($faqs))
    <section class="white_section faq py-lg-5 pb-md-3">
        <div class="container ">
            <h2 class="product_heading text-center pb-md-5 pb-2">Frequently Asked<span class="our"> Question</span></h2>
            <div class="row row-cols-1 row-cols-md-3 g-4 accordion mb-md-3" id="faq_accordion">
                @foreach ($faqs as $index => $faq)
                    <div class="col">
                        <div class="accordion-item mb-2">
                            <h5 class="function_title mb-lg-3 mb-md-1 mb-0">
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
                            <div id="collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$index}}" data-bs-parent="#product_accordion">
                                <div class="accordion-body">
                                    <p>{!! $faq->answer !!}</p>
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
    @section('page.scripts')

        <script>
            $(document).ready(function() {
                initSelect2('.select2');
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
                    }, 5000);
                }
            });
        </script>


    @endsection