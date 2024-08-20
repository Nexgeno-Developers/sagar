@extends('frontend.layouts.app')

@section('page.title', 'Saagar')

@section('page.description', 'description')

@section('page.type', 'website')

@section('page.content')
  
<main class="about_us_page">

<section class="banner" id="product_categories_banner_img">
    <div class="container ">
        <div class="banner_heading_div text-center">
            <h2 class="text-light banner_heading_text">About Us</h2>
            <ul class="list-group list-unstyled list-group-horizontal banner_heading_breadcrumb">
                <li class="list-group-item"><a href=""><i class="fa fa-house text-light"></i></a></li>
                <li class="list-group-item"><a href="{{route('index')}}">Home</a></li> > 
                <li class="list-group-item"><p class="mb-0">About Us</p></li>
            </ul>
        </div>                
    </div>
</section>

<section class="white_section about_us">
    <div class="container py-md-5">
        <div class="row about_us_story_div">
            <div class="col-md-7 pe-md-4">
                <h2 class="product_heading text-start pb-md-1"><span class="our">ABOUT </span>US</h2>
                <div class="story_big_text">
                    <p class="since_content text-dark">
                        SSCPL STARTED ITS JOURNEY AS A PARTNERSHIP FIRM M/S. SAGAR INTERNATIONAL IN 1974.
                        <span class="since_content text-dark d-block">
                            WE GOT INCORPORATED AS A PRIVATE LIMITED COMPANY IN 1999.                                    
                        </span>
                    </p>
                </div>
                <div class="story_small_text">
                    <p class="story_small fs-14">As 
                        <strong>M/s. Sagar Speciality Chemicals Private Limited.</strong>
                    </p>
                    <p class="story_small fs-14">
                        SSCPL has always been a reliable and trusted partner to domestic and export
                        market in supply chain management. In 2016, we explored and found a niche 
                        market for contract manufacturing.&nbsp;
                    </p>
                    <p class="story_small fs-14">
                        With the support of well-known multinational brands, SSCPL has become a 
                        preferred supplier of niche performance chemical to various industrial segments.
                    </p>
                </div>
            </div>                    
            <div class="col-md-5 saagar_speciality_chemical_machines float-end">
                <img src="/assets/frontend/images/home/saagar_speciality_chemical.png" alt="Chemical Process" class="img-fluid rounded">
                <div class="about_info_box info-box text-start text-light p-md-4 up_and_down">
                    <h4>100k+</h4>
                    <p>Lorem Ipsum</p>
                    <hr>
                    <h4>12M</h4>
                    <p>Lorem Ipsum Lans</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-md-3">
            <p class="story_small fs-14">
                We have a team of expert who constantly work on developing innovative customized products 
                that will cater to our key esteemed customers across Indian geography as well as export market. 
                We have always kept an open mind in innovation and always do our best to cater to any 
                customization requirement that comes from our customers.
            </p>
            <p class="story_small fs-14">
                With 45+ years of experience, we understand the nature of business and we continuously work 
                towards improvement with not just the products, but we also ensure that the packaging match 
                the international standards with top focus on customer satisfaction.
            </p>
            <p class="story_small fs-14">
                We ensure our customers are engaged with us by providing them with 
                current and future market to keep them updated.
            </p>
        </div>

        <div class="col-md-12 background_blue_img my-md-5 p-md-5 cor_values">
            <h2 class="product_heading text-start text-light pb-md-1">Cor Values</h2>
            <div class="row">
                <div class="col-md-7 pe-md-4 pt-md-3">                            
                    <p class="fs-14 lh-20 fw-light text-light">
                        Under the guidance of founder Mr. Ravindra Sampat, M/s. Sagar Speciality Chemicals Private Limited is 
                        now ready to achieve new milestone by combining modern business model with traditional integrity, 
                        knowledge and collaboration.

                    </p>

                    <!--<p class="fs-14 lh-20 fw-light text-light">                                
                        Success is achievable with a combination of strong leadership and efficient team
                        that works round the clock to achieve the goals of the organization. We have faith
                        in our team and we try and keep them motivated to ensure the focus on business
                        and our values are not compromised.
                    </p>-->

                    <p class="fs-14 lh-20 fw-light text-light">
                        M/s Sagar Speciality Chemicals Private Limited success driven by 7 pillars;
                        <div class="col-md-6 d-flex ms-md-3">
                            <ul class="col-md-6 list-group ">
                                <li class="text-light fs-14 fw-light">Entrepreneurship</li>
                                <li class="text-light fs-14 fw-light">Responsibility</li>
                                <li class="text-light fs-14 fw-light">Sustainability</li>
                                <li class="text-light fs-14 fw-light">Integrity</li>
                            </ul>
                            <ul class="col-md-6 list-group ">
                                <li class="text-light fs-14 fw-light">Knowledge</li>
                                <li class="text-light fs-14 fw-light">Commitment</li>
                                <li class="text-light fs-14 fw-light">Collaboration</li>
                            </ul>
                        </div>
                    </p>
                    
                    <p class="fs-14 lh-20 fw-light text-light">
                        The 2nd generation management team is now looking forward to making notable progress into manufacturing 
                        customized speciality chemicals with supply chain management.
                    </p>
                </div>
                <div class="col-md-5">
                    <img class="img-fluid right_img ps-md-3" src="/assets/frontend/images/about-us/cor_values_right_img.png">
                </div>
            </div>
        </div>
        <div class="d-flex flex-row-reverse col-md-12">
            <div class="col-md-7 ps-md-5">
                <h2 class="col-md-12 product_heading text-start pb-md-3 float-start"><span class="our"> COMPANY  </span>POLICY</h2>
                <p class="fs-14 lh-20">
                    <ul class="company_policies list-group-numbered">
                        <li>We deal only with branded, recognized and quality products. We do not deal with inferior quality, adulterated or unrecognized products.</li>
                        <li>SSCPL does not promote any corruption or bribery while dealing with any of our customers or government authorities.</li>
                        <li>SSCPL strictly adheres to Child Labor Act and Sexual Harassment Policy. We believe in providing a free and fair work environment to our employees.</li>
                        <li>SSCPL adheres to Safety, Health & Environmental policies and engages with principals following the Safety, Health & Environmental policies.</li>
                        <li>SSCPL adheres to all the company norms as laid down by the UN as well as the Government of India.</li>
                    </ul>
                    
                </p>
            </div>
            <div class="col-md-5">
                <img class="right_img what_we_do_img pe-md-3" src="/assets/frontend/images/about-us/company_policy.png">
            </div>
        </div>
    </div>
</section>

<section class="blue_section management_team">
    <div class="container py-md-5">
        <h2 class="vission_heading product_heading py-md-3 text-light">MANAGEMENT<span class="purple_color"> TEAM</span></h2>
        <div class="col-md-12 row align-items-center">
            <div class="col-md-3">
                <img src="/assets/frontend/images/about-us/ravindra_laxmidas.png" alt="" class="img-fluid profile_img">
            </div>
            <div class="col-md-9">
                <h5 class="name_and_position text-light pb-md-3">Ravindra Laxmidas Sampat - Founder &amp; Director.</h5>
                <p class="about_description text-light fs-14 lh-20 fw-light">
                    A visionary leader who started the company and responsible to take SSCPL to new heights. 
                    He has completed his graduation in Commerce and with an enriching experience of 50+ years, 
                    he ensured SSCPL has established a strong position in speciality chemical market.
                </p>
            </div>
        </div>
        <hr class=" col-md-9 float-end text-light py-md-2">    
        
        <div class="col-md-12 row align-items-center">
            <div class="col-md-3">
                <img src="/assets/frontend/images/about-us/hardik_ravindra.png" alt="" class="img-fluid profile_img">
            </div>
            <div class="col-md-9">
                <h5 class="name_and_position text-light pb-md-3">Hardik Ravindra Sampat – Managing Director.</h5>
                <p class="about_description text-light fs-14 lh-20 fw-light">
                    A chemical Engineer (B.E. Chemicals) with MBA in Marketing, he started his career with 
                    IOTL (Indian Oil Tanking Limited). He joined SSCPL in 2012 and with backing of his technical 
                    knowledge and experience of 2+ years, he introduced a new line of business into contract 
                    manufacturing and customized chemical solutions. He currently heads technical aspect of product
                    development ensuring diversification of business.
                </p>
            </div>
        </div>
        <hr class=" col-md-9 float-end text-light py-md-2">
        
        <div class="col-md-12 row align-items-center">
            <div class="col-md-3">
                <img src="/assets/frontend/images/about-us/jaydeep_kantilal.png" alt="" class="img-fluid profile_img">
            </div>
            <div class="col-md-9">
                <h5 class="name_and_position text-light pb-md-3">Jaydeep Kantilal Panchal - Business Development Manager</h5>
                <p class="about_description text-light fs-14 lh-20 fw-light">
                    A chemical engineer (B. E. Chemicals) with diploma in French language (DELF Al), he started his 
                    career in 2011 with marketing of speciality chemicals. He joined SSCPL in 2018 and since then
                    has been responsible for developing new business and market for SSCPL. 
                    He jointly works with the Director with planning and strategies to ensure business growth.
                </p>
            </div>
        </div>
        <hr class=" col-md-9 float-end text-light py-md-2">
        
        <div class="col-md-12 row align-items-center">
            <div class="col-md-3">
                <img src="/assets/frontend/images/about-us/mehul_chandulal.png" alt="" class="img-fluid profile_img">
            </div>
            <div class="col-md-9">
                <h5 class="name_and_position text-light pb-md-3">Mehul Chandulal Dattani - Head of Operations</h5>
                <p class="about_description text-light fs-14 lh-20 fw-light">
                    Mehul holds a diploma in Export & Import Management and with 17+ years of experience in
                    multiple profiles, he takes care of entire operations right from order management to delivery of products. 
                    He jointly works with the Management Team and responsible for logistics and documentation process.
                </p>
            </div>
        </div>
        <hr class=" col-md-9 float-end text-light py-md-2">
        
        <div class="col-md-12 row align-items-center">
            <div class="col-md-3">
                <img src="/assets/frontend/images/about-us/brijesh_shah.png" alt="" class="img-fluid profile_img">
            </div>
            <div class="col-md-9">
                <h5 class="name_and_position text-light pb-md-3">Brijesh Shah</h5>
                <p class="about_description text-light fs-14 lh-20 fw-light">                            
                    Brijesh Shah is engineer with MBA in International Business Management and 20 years 
                    of experience of strong well-rounded track record in a competitive international market. 
                    He is responsible to ensure Sagar Speciality Chemicals Private Limited establishes a 
                    strong presence in international market.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="white_section  partnership">
    <div class="container pt-md-5">
        <div class="row align-items-center">
            <div class="col-md-7 pe-md-5">
                <h2 class="col-md-12 product_heading text-start pb-md-3 float-start"><span class="d-block"><span class="our">LOREM </span>IPSUM </span> DOLOR SIT AMER</h2>
                <p class="fs-14 lh-20">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit anim id est laborum.
                </p>
            </div>
            <div class="col-md-5">
                <img class="right_img what_we_do_img ps-md-3 mt-md-0" src="/assets/frontend/images/about-us/about_lorem_ipsum.png">
            </div>
        </div>
    </div>

    <div class="container pt-md-5">
        <div class="d-flex flex-row-reverse align-items-center justify-content-between">
            <div class="col-md-6 ps-md-4">
                <h2 class="col-md-12 product_heading text-start pb-md-3 float-start"><span class="our">WHY SSCPL </span></h2>
                <p class="fs-14 lh-20">
                    We have the knowledge and expertise into specialized chemical
                    industry carrying 50+ enriching experience which makes us a valued
                    and trusted supplier across the industries. We are currently supplying
                    specialized chemicals in domestic market across Indian geography
                    and doing exports to ll countries.
                </p>

            </div>
            <div class="col-md-5">
                <img class="right_img what_we_do_img pe-md-3" src="/assets/frontend/images/about-us/about_why_sscpl.png">
            </div>
        </div>
    </div>
</section>

<section class="white_section why_sscpl height670">
    <div class="container mb-md-5">
        <div class="row justify-content-between position-relative">
            <div class="animated_moving_machine py-md-2">
                <img class="moving_machine" src="/assets/frontend/images/home/animated_top-tank.png" alt="">
            </div>
            <div class="col-md-12 why_sscpl_bg_img position-absolute">
                <h2 class="product_heading text-light text-center pt-md-5 mt-md-4">WHY SSCPL?</h2>
                <div class="row pt-md-5">
                    <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                        <div class="sscl_img_div"> <img src="/assets/frontend/images/home/funnel.png" alt="" class="sscl_img"></div>
                        <p class="sscl_content mt-md-3">Product</p>
                    </div>
                    <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                        <div class="sscl_img_div"> <img src="/assets/frontend/images/home/competitve_pricing.png" alt="" class="sscl_img"></div>
                        <p class="sscl_content mt-md-3">Competitve Pricing</p>
                    </div>
                    <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                        <div class="sscl_img_div"> <img src="/assets/frontend/images/home/packaging.png" alt="" class="sscl_img"></div>
                        <p class="sscl_content mt-md-3">Packaging</p>
                    </div>
                    <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                        <div class="sscl_img_div"> <img src="/assets/frontend/images/home/commitment.png" alt="" class="sscl_img"></div>
                        <p class="sscl_content mt-md-3">Commitment</p>
                    </div>
                    <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                        <div class="sscl_img_div"> <img src="/assets/frontend/images/home/delivery.png" alt="" class="sscl_img"></div>
                        <p class="sscl_content mt-md-3">Delivery</p>
                    </div>
                    <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                        <div class="sscl_img_div"> <img src="/assets/frontend/images/home/customised_solutions.png" alt="" class="sscl_img"></div>
                        <p class="sscl_content mt-md-3">Customised Solutions</p>
                    </div>
                    <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                        <div class="sscl_img_div"> <img src="/assets/frontend/images/home/compliances.png" alt="" class="sscl_img"></div>
                        <p class="sscl_content mt-md-3">Compliances</p>
                    </div>
                    <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                        <div class="sscl_img_div"> <img src="/assets/frontend/images/home/customer_support.png" alt="" class="sscl_img"></div>
                        <p class="sscl_content mt-md-3">Customer Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="white_section vision_mission">
    <div class="container pb-md-5">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="our_vission_main_div p-md-5 ">
                    <div class="vission_img_div">
                        <img src="/assets/frontend/images/about-us/our_vission.png" alt="" class="vission_img">                        
                    </div>
                    <h2 class="vission_heading product_heading py-md-3 text-light"><span class="purple_color">OUR</span> VISSION</h2>
                    <p class="vission_para text-light fs-14 fw-light">
                        To be an exceptional known brand with maximum reach through our technical expertise
                    </p>
                </div>
            </div>
            <div class="col">
                <div class="our_mission_main_div p-md-5">
                    <div class="mission_img_div">
                        <img src="/assets/frontend/images/about-us/our_mission.png" alt="" class="mission_img">
                    </div>
                    <h2 class="mission_heading product_heading py-md-3 text-light"><span class="purple_color">OUR</span> MISSION</h2>
                    <p class="mission_para text-light fs-14 fw-light">
                        To become a reliable partner with multiple segment product portfolio under Sagar Speciality Chemicals Private Limited.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</main>


@endsection