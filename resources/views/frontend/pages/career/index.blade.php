@extends('frontend.layouts.app')

@section('page.title', 'Saagar')

@section('page.description', 'description')

@section('page.type', 'website')

@section('page.content')
  
<main class="career_page">

<section class="banner" id="career_banner_img">
    <div class="container ">
        <div class="banner_heading_div text-center">
            <h2 class="text-light banner_heading_text">Career</h2>
            <ul class="list-group list-unstyled list-group-horizontal banner_heading_breadcrumb">
                <li class="list-group-item"><a href=""><i class="fa fa-house text-light"></i></a></li>
                <li class="list-group-item"><a href="{{route('index')}}">Home</a></li> > 
                <li class="list-group-item"><p class="mb-0">Career</p></li>
            </ul>
        </div>                
    </div>
</section>

<section class="white_section career_contact_form">
    <div class="container py-md-5">
        <div class="row">
            <div class="col-md-6 pe-md-5">
                <div class="col-md-12 contact_us_form career_form bg-transparent">
                    <h4 class="col-md-12 product_heading text-start pb-md-3 float-start">
                        Enroll Now
                    </h4><br>
                    <form>
                        <div class="col-md-12 mb-4">                                
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Full Name">
                        </div>
                        <div class="row col-md-12 mb-2 ms-md-0">
                            <div class="col-md-6 mb-3 px-0 pe-md-3">                                    
                                <input type="tel" class="form-control" id="exampleInputPhone" placeholder="Email">
                            </div>
                            <div class="col-md-6 mb-3 ps-md-3 pe-md-0">                                    
                                <input type="text" class="form-control" id="exampleInputAddress" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-12 mb-4">                                    
                            <input type="text" class="form-control" id="exampleInputAddress" placeholder="Apply For">
                        </div> 
                        <textarea class="col-md-12 mb-3" name="" id="" placeholder="Message"></textarea>
                        
                        <div class="col-12 mb-4">                                    
                            <input type="text" class="form-control" id="exampleInputAddress" placeholder="Type Code">
                        </div>                                
                        <button type="submit" class="">SUBMIT</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 ps-md-5">
                <img class="right_img what_we_do_img pe-md-3" src="/assets/frontend/images/career/career_form_right_img.png">
            </div>
        </div>
    </div>
</section>
</main>


@endsection