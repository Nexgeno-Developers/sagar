@extends('frontend.layouts.app')

@section('page.title', 'Saagar')

@section('page.description', 'description')

@section('page.type', 'website')

@section('page.content')
  
<main class="contact_us_page">
        
        <section class="banner" id="contact_us_page_banner">
            <div class="container ">
                <div class="banner_heading_div text-center">
                    <h2 class="text-light banner_heading_text">Contact Us</h2>
                    <ul class="list-group list-unstyled list-group-horizontal banner_heading_breadcrumb">
                        <li class="list-group-item"><a href=""><i class="fa fa-house text-light"></i></a></li>
                        <li class="list-group-item"><a href="{{route('index')}}">Home</a></li> > 
                        <li class="list-group-item"><p class="mb-0">Contact Us</p></li>
                    </ul>
                </div>                
            </div>
        </section>

        <section class="white_section address_and_map">
            <div class="container py-md-5">
                <div class="row">
                    <div class="col-md-5 contact_info pe-md-4">
                        <h2 class="product_heading saagar_specialty text-start pb-md-3 float-start">
                            <span class="our">
                                Sagar Speciality 
                                Chemicals Pvt. Ltd.
                            </span>
                        </h2>
                        <div class="col-12 d-flex align-items-start gap-2 footer_location_1">
                            <img class="location_flags mt-1" src="/assets/frontend/images/flag_india.png">
                            <p class="pb-1 location_text"> 
                                1304, Meraki Arena, V N Purav Marg, Opp.
                                R K Studio, Chembur East, Mumbai
                                400071, Maharashtra, India 
                            </p> 
                        </div>

                        <div class="d-flex col-md-12">
                            <div class="col-md-4 d-flex align-items-start gap-2 pb-md-3">
                                <i class="fa fa-phone mt-2"></i>
                                <div class="d-block">
                                    <span>Mobile Number: </span><br>
                                    <a href="tel:+919619603699" class="fw-500">+91 9619603699</a>
                                </div> 
                            </div>
                            <div class="col-md-8 d-flex align-items-start justify-content-center gap-2 pb-md-3">
                                <i class="fa fa-phone mt-2"></i>
                                <div class="d-block">
                                    <span>Landline Number: </span>  <br>
                                    <a href="tel:+912235137822" class="fw-500">+91-22-35137822 </a> /
                                    <a href="tel:+912235137821" class="fw-500">+91-22-35137821</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex align-items-cemter gap-2 pb-md-3">
                            <i class="fa fa-envelope mt-1"></i>
                            <a href="mailto:sales@sagarspecialitychemicals.com" class="fw-500">
                                sales@sagarspecialitychemicals.com
                            </a>
                        </div>

                        <div class="d-flex align-items-start gap-2 pt-md-4">
                            <img class="location_flags mt-1" src="/assets/frontend/images/flag_brazil.png">
                            <p class="text-dark mb-3 pb-2 location_text"> 
                                1304, Meraki Arena, V N Purav Marg, Opp.
                                R K Studio, Chembur East, Mumbai
                                400071, Maharashtra, India 
                            </p> 
                        </div>
                        <div class="d-flex gap-2">
                            <i class="fa fa-phone mt-2"></i>
                            <div class="block">
                                <span class="d-block mb-0">Overseas Business Enquiries: <br>
                                </span> 
                                    <a href="tel:+5519989563731" class="mt-2">
                                        +55 19 989563731
                                    </a>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.1699375418936!2d144.9560543153246!3d-37.81627997975182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf0727f5e2b0d4e0!2sMelbourne%20Central%20Station!5e0!3m2!1sen!2sau!4v1627548037391!5m2!1sen!2sau" 
                            width="100%" 
                            height="440" 
                            style="border:0; border-radius: 50px;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>

                    </div>

                    <div class="col-md-12 p-md-5 contact_us_form mt-md-5">
                        <h2 class="col-md-12 product_heading text-start pb-md-1 float-start">
                            <span class="our">Enquiry</span>
                        </h2><br>
                        <h5 class="form_mark">All fields marked as * are mandatory</h5>
                        <form>
                            <div class="col-md-12 mb-4">                                
                                <input type="text" class="form-control" id="exampleInputName" placeholder="Full Name">
                            </div>
                            <div class="row col-md-12 mb-2">
                                <div class="col-md-6 mb-3">                                    
                                    <input type="tel" class="form-control" id="exampleInputPhone" placeholder="Email">
                                </div>
                                <div class="col-md-6 mb-3">                                    
                                    <input type="text" class="form-control" id="exampleInputAddress" placeholder="Phone">
                                </div>
                            </div>
                                <textarea class="col-md-12 mb-3" name="" id="" placeholder="Message"></textarea>
                            <button type="submit" class="">SEND</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main> 


@endsection