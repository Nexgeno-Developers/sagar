@extends('frontend.layouts.app')

@section('page.title', 'Saagar')

@section('page.description', 'description')

@section('page.type', 'website')

@section('page.content')
  
<main class="enquire_page">

<section class="first_section bg_smoky_img">
    <div class="container enquiry_section">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 left_section">
                <p class="since_content text-light lh-25">SSCPL is one of the largest distributors of speciality chemicals and one of the most reputed and trusted brands in India. We also export speciality chemicals to 11 countries.
                </p><p class="since_content text-light lh-25">We always thrive to tie up with distributors across the globe who are esteemed manufacturers of chemicals and want to establish their business in India.</p>
                <p class="since_content text-light lh-25">We have already tied up with 7 Top Principals and we are looking to take this number further to be able to provide more variations to the market.</p>
                <br>
                <p class="since_content fs-24 text-light lh-25 mb-md-2">To Understand better, we are:</p>
                <ul>
                    <li class="since_content">Authorized distribution</li>
                    <li class="since_content">Supply chain management</li>
                    <li class="since_content">Contract manufacturing of customized products</li>
                </ul>
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

<section class="white_section faq">
    <div class="container py-md-5">
        <h2 class="product_heading text-center pb-md-5">Frequently Asked<span class="our"> Question</span></h2>
        <div class="row row-cols-1 row-cols-md-3 g-4 accordion mb-md-3" id="faq_accordion">
            <div class="col">
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
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="accordion-item mb-2">
                    <h5 class="function_title mb-3">
                        <button 
                            class="accordion-button show" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseTwo" 
                            aria-expanded="true" 
                            aria-controls="collapseTwo">
                            Product Description
                        </button>
                    </h5>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#product_accordion">
                        <div class="accordion-body">
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col">
                <div class="accordion-item mb-2">
                    <h5 class="function_title mb-3">
                        <button 
                            class="accordion-button show" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseThree" 
                            aria-expanded="true" 
                            aria-controls="collapseThree">
                            Product Description
                        </button>
                    </h5>
                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#product_accordion">
                        <div class="accordion-body">
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col">
                <div class="accordion-item mb-2">
                    <h5 class="function_title mb-3">
                    <button 
                            class="accordion-button show" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseFour" 
                            aria-expanded="true" 
                            aria-controls="collapseFour">
                            Product Description
                        </button>
                    </h5>
                    <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour" data-bs-parent="#product_accordion">
                        <div class="accordion-body">
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col">
                <div class="accordion-item mb-2">
                    <h5 class="function_title mb-3">
                    <button 
                            class="accordion-button show" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseFive" 
                            aria-expanded="true" 
                            aria-controls="collapseFive">
                            Product Description
                        </button>
                    </h5>
                    <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#product_accordion">
                        <div class="accordion-body">
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col">
                <div class="accordion-item mb-2">
                    <h5 class="function_title mb-3">
                    <button 
                            class="accordion-button show" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseSix" 
                            aria-expanded="true" 
                            aria-controls="collapseSix">
                            Product Description
                        </button>
                    </h5>
                    <div id="collapseSix" class="accordion-collapse collapse show" aria-labelledby="headingSix" data-bs-parent="#product_accordion">
                        <div class="accordion-body">
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col">
                <div class="accordion-item mb-2">
                    <h5 class="function_title mb-3">
                    <button 
                            class="accordion-button show" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseSeven" 
                            aria-expanded="true" 
                            aria-controls="collapseSeven">
                            Product Description
                        </button>
                    </h5>
                    <div id="collapseSeven" class="accordion-collapse collapse show" aria-labelledby="headingSeven" data-bs-parent="#product_accordion">
                        <div class="accordion-body">
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col">
                <div class="accordion-item mb-2">
                    <h5 class="function_title mb-3">
                        <button 
                            class="accordion-button show" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseEight" 
                            aria-expanded="true" 
                            aria-controls="collapseEight">
                            Product Description
                        </button>
                    </h5>
                    <div id="collapseEight" class="accordion-collapse collapse show" aria-labelledby="headingEight" data-bs-parent="#product_accordion">
                        <div class="accordion-body">
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col">
                <div class="accordion-item mb-2">
                    <h5 class="function_title mb-3">
                        <button 
                            class="accordion-button show" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#collapseNine" 
                            aria-expanded="true" 
                            aria-controls="collapseNine">
                            Product Description
                        </button>
                    </h5>
                    <div id="collapseNine" class="accordion-collapse collapse show" aria-labelledby="headingNine" data-bs-parent="#product_accordion">
                        <div class="accordion-body">
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut
                                enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>           
            </div>
        </div>
    </div>
</section>
</main>


@endsection