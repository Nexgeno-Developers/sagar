@extends('frontend.layouts.app')

@section('page.title', 'Saagar')

@section('page.description', 'description')

@section('page.type', 'website')

@section('page.content')
  
  <main class="home-page">

      <section id="slider_banner_section">
          <div class="container-fluid px-0">
              <div class="owl-theme owl-carousel home_page_banner_slides" id="home_page_banner_slider">
                  <div class="banner_slides">
                      <img src="/assets/frontend/images/home/liquid_bottles.png" alt="" class="banner_img">
                      <div class="banner_contents_div">
                          <h4 class="banner_content text-light">
                              Lorem ipsum dolor sit amet,
                              consectetur adipiscing elit, sed do
                              eiusmod tempor incididunt ut labore
                              et dolore magna aliqua.
                          </h4>
                          <a href="dibutyl-phosphate.php" class="banner_view_button">View Products</a>
                      </div>
                  </div>

                  <div class="banner_slides">
                      <img src="/assets/frontend/images/home/liquid_jar_with_tripod_stand.png" alt="" class="banner_img">
                      <div class="banner_contents_div">
                          <h4 class="banner_content text-light">
                              consectetur adipiscing elit, sed do
                              eiusmod tempor incididunt ut labore
                              et dolore magna aliqua.
                              Lorem ipsum dolor sit amet,
                          </h4>
                          <a href="dibutyl-phosphate.php" class="banner_view_button">View Products</a>
                      </div>
                  </div>

                  <div class="banner_slides">
                      <img src="/assets/frontend/images/home/medicine_materials.png" alt="" class="banner_img">
                      <div class="banner_contents_div">
                          <h4 class="banner_content text-light">
                              eiusmod tempor incididunt ut labore
                              et dolore magna aliqua.
                              Lorem ipsum dolor sit amet,
                              consectetur adipiscing elit, sed do
                          </h4>
                          <a href="dibutyl-phosphate.php" class="banner_view_button">View Products</a>
                      </div>
                  </div>

                  <div class="banner_slides">
                      <img src="/assets/frontend/images/home/liquid_jars.png" alt="" class="banner_img">
                      <div class="banner_contents_div">
                          <h4 class="banner_content text-light">
                              et dolore magna aliqua.
                              Lorem ipsum dolor sit amet,
                              consectetur adipiscing elit, sed do
                              eiusmod tempor incididunt ut labore
                          </h4>
                          <a href="dibutyl-phosphate.php" class="banner_view_button">View Products</a>
                      </div>
                  </div>
              </div>
              <marquee behavior="scroll" direction="left" class="banner_marque">
                  Your Dedicated Partners for Supply of Specialty Chemicals
              </marquee>
              <div class="animated_arrow_div text-center">
                  <span class="animated_arrow_span">
                      <a href="#our_products">
                          <i class="fa fa-arrow-down animated_arrow_down"></i>
                      </a>
                  </span>
              </div>
          </div>
      </section>

      <section class="white_section our_products" id="our_products">
          <div class="container pt-md-5 pt-5 pb-md-2">
              <h2 class="product_heading text-center pb-md-1"><span class="our">OUR</span> PRODUCT</h2>
              <div class="row">
                  <div class="col-md-3 col-6 our_product_cards_div">
                      <a href="dibutyl-phosphate.php" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                          <div class="card">
                              <img src="/assets/frontend/images/home/our_product_1.png" alt="" class="product_card_image card-img-top">
                              <div class="card-body d-flex">
                                  <p class="card-text">Phosphate Esters &amp; Flame Retardant</p>
                                  <i class="btn btn-primary fa fa-arrow-right"></i>
                              </div>
                          </div>
                      </a>
                  </div>
                  
                  <div class="col-md-3 col-6 our_product_cards_div">
                      <a href="dibutyl-phosphate.php" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                          <div class="card">
                              <img src="/assets/frontend/images/home/our_product_2.png" alt="" class="product_card_image card-img-top">
                              <div class="card-body d-flex">
                                  <p class="card-text">Surfactant &amp; Antistatic Agent</p>
                                  <i class="btn btn-primary fa fa-arrow-right"></i>
                              </div>
                          </div>
                      </a>
                  </div>
                  
                  <div class="col-md-3 col-6 our_product_cards_div">
                      <a href="dibutyl-phosphate.php" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                          <div class="card">
                              <img src="/assets/frontend/images/home/our_product_3.png" alt="" class="product_card_image card-img-top">
                              <div class="card-body d-flex">
                                  <p class="card-text">Hydrobromic Acid</p>
                                  <i class="btn btn-primary fa fa-arrow-right"></i>
                              </div>
                          </div>
                      </a>
                  </div>
                  
                  <div class="col-md-3 col-6 our_product_cards_div">
                      <a href="dibutyl-phosphate.php" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                          <div class="card">
                              <img src="/assets/frontend/images/home/our_product_4.png" alt="" class="product_card_image card-img-top">
                              <div class="card-body d-flex">
                                  <p class="card-text">Plasticizer</p>
                                  <i class="btn btn-primary fa fa-arrow-right"></i>
                              </div>
                          </div>
                      </a>
                  </div>
                  
                  <div class="col-md-3 col-6 our_product_cards_div">
                      <a href="dibutyl-phosphate.php" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                          <div class="card">
                              <img src="/assets/frontend/images/home/our_product_5.png" alt="" class="product_card_image card-img-top">
                              <div class="card-body d-flex">
                                  <p class="card-text">Anti-hydrolysis Agent</p>
                                  <i class="btn btn-primary fa fa-arrow-right"></i>
                              </div>
                          </div>
                      </a>
                  </div>
                  
                  <div class="col-md-3 col-6 our_product_cards_div">
                      <a href="dibutyl-phosphate.php" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                          <div class="card">
                              <img src="/assets/frontend/images/home/our_product_6.png" alt="" class="product_card_image card-img-top">
                              <div class="card-body d-flex">
                                  <p class="card-text">Polyurethane &amp; Cast Nylon Additives</p>
                                  <i class="btn btn-primary fa fa-arrow-right"></i>
                              </div>
                          </div>
                      </a>
                  </div>
                  
                  <div class="col-md-3 col-6 our_product_cards_div">
                      <a href="dibutyl-phosphate.php" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                          <div class="card">
                              <img src="/assets/frontend/images/home/our_product_7.png" alt="" class="product_card_image card-img-top">
                              <div class="card-body d-flex">
                                  <p class="card-text">Green Chemistry</p>
                                  <i class="btn btn-primary fa fa-arrow-right"></i>
                              </div>
                          </div>
                      </a>
                  </div>
                  
                  <div class="col-md-3 col-6 our_product_cards_div">
                      <a href="dibutyl-phosphate.php" class="d-flex align-items-center justify-content-between text-decoration-none w-100">
                          <div class="card">
                              <img src="/assets/frontend/images/home/our_product_8.png" alt="" class="product_card_image card-img-top">
                              <div class="card-body d-flex">
                                  <p class="card-text">C5 Products</p>
                                  <i class="btn btn-primary fa fa-arrow-right"></i>
                              </div>
                          </div>
                      </a>
                  </div>

                  <div class="col-12 text-center pt-md-4 pt-4">
                      <a href="product-categories.php" class="btn a_btn blue_btn">
                          View All
                      </a>
                  </div>                    
              </div>
          </div>
      </section>

      <section class="white_section py-5" id="company_section">
          <div class="container ">
              <div class="row">
                  <div class="col-12">
                      <div class="col-md-11 background_blue_img p-md-5 px-2">
                          <div class="col-md-8 p-md-5 p-3 py-4">
                              <h2 class="text-light company_heading">SAGAR SPECIALITY <br class="d-md-block d-none"> CHEMICALS (PVT) LTD.</h2>
                              <p class="since_content text-white">INCORPORATED IN 1974 AS A PARTNERSHIP COMPANY M/S. SAGAR INTERNATIONAL AND CONVERTED TO PVT LTD IN 1999</p>
                              <p class="text-light after_success_content">After successfully recognizing itself as a reliable partner in supply chain management, Sagar Speciality Chemicals Private Limited then started with contract manufacturing.</p>
                              <a href="about-us.php" class="btn a_btn white_btn btn-lg mt-md-3 mt-0">Read More <i class="fa fa-arrow-right"></i></a>                    
                          </div>
                      </div>
                      <div class="col-12 position-relative">
                          <div class="col-md-5 saagar_speciality_chemical_machine float-end">
                              <img src="/assets/frontend/images/home/saagar_speciality_chemical.png" alt="Chemical Process" class="img-fluid rounded">
                              <div class="info_box text-md-start text-center text-light p-md-4 up_and_down">
                                  <h4>100k+</h4>
                                  <p>Lorem Ipsum</p>
                                  <hr>
                                  <h4>12M</h4>
                                  <p>Lorem Ipsum Lans</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="white_section industry_we_cater">
          <div class="container py-md-5 py-3">
              <div class="row justify-content-between">
                  <div class="col-md-6">
                      <h2 class="product_heading text-center pb-md-1 float-start"><span class="our">INDUSTRY</span> WE CATER</h2>
                  </div>
                  <div class="col-md-6 d-md-block d-none">
                      <a href="#" class="btn a_btn blue_btn float-md-end float-start">
                          View All
                      </a>
                  </div>
              </div>
              <div class="row industry_contents_main_div">
                  <!-- Add your achievement items here -->
                  <div class="col-md-4 col-6 mb-0 pe-md-0">
                      <a href="product-categories.php" class="d-block industry_content_div position-relative">
                          <img src="/assets/frontend/images/home/industry_img_1.png" alt="" class="industry_img">
                          <div class="d-flex industry_content">
                              <span class="industry_text_link ps-md-4">Adhesive and sealant</span>
                              <span class="industry_arrow_link pe-md-3">
                                  <img class="rotate45" src="/assets/frontend/images/home/right_arrow_45deg.png">
                              </span>
                          </div>
                      </a>
                  </div>
              
                  <div class="col-md-4 col-6 mb-0 pe-md-0">
                      <a href="product-categories.php" class="d-block industry_content_div position-relative">
                          <img src="/assets/frontend/images/home/industry_img_2.png" alt="" class="industry_img">
                          <div class="d-flex industry_content">
                              <span class="industry_text_link ps-md-4">Water Treatment</span>
                              <span class="industry_arrow_link pe-md-3">
                                  <img class="rotate45" src="/assets/frontend/images/home/right_arrow_45deg.png">
                              </span>
                          </div>
                      </a>
                  </div>
              
                  <div class="col-md-4 col-6 mb-0 pe-md-0">
                      <a href="product-categories.php" class="d-block industry_content_div position-relative">
                          <img src="/assets/frontend/images/home/industry_img_3.png" alt="" class="industry_img">
                          <div class="d-flex industry_content">
                              <span class="industry_text_link ps-md-4">Unsaturated Polyester Resin</span>
                              <span class="industry_arrow_link pe-md-3">
                                  <img class="rotate45" src="/assets/frontend/images/home/right_arrow_45deg.png">
                              </span>
                          </div>
                      </a>
                  </div>
              
                  <div class="col-md-4 col-6 mb-0 pe-md-0">
                      <a href="product-categories.php" class="d-block industry_content_div position-relative">
                          <img src="/assets/frontend/images/home/industry_img_4.png" alt="" class="industry_img">
                          <div class="d-flex industry_content">
                              <span class="industry_text_link ps-md-4">Food</span>
                              <span class="industry_arrow_link pe-md-3">
                                  <img class="rotate45" src="/assets/frontend/images/home/right_arrow_45deg.png">
                              </span>
                          </div>
                      </a>
                  </div>
              
                  <div class="col-md-4 col-6 mb-0 pe-md-0">
                      <a href="product-categories.php" class="d-block industry_content_div position-relative">
                          <img src="/assets/frontend/images/home/industry_img_5.png" alt="" class="industry_img">
                          <div class="d-flex industry_content">
                              <span class="industry_text_link ps-md-4">Textile</span>
                              <span class="industry_arrow_link pe-md-3">
                                  <img class="rotate45" src="/assets/frontend/images/home/right_arrow_45deg.png">
                              </span>
                          </div>
                      </a>
                  </div>
              
                  <div class="col-md-4 col-6 mb-0 pe-md-0">
                      <a href="product-categories.php" class="d-block industry_content_div position-relative">
                          <img src="/assets/frontend/images/home/industry_img_6.png" alt="" class="industry_img">
                          <div class="d-flex industry_content">
                              <span class="industry_text_link ps-md-4">Specialty Chemicals</span>
                              <span class="industry_arrow_link pe-md-3">
                                  <img class="rotate45" src="/assets/frontend/images/home/right_arrow_45deg.png">
                              </span>
                          </div>
                      </a>
                  </div>
              
                  <div class="col-md-4 col-6 mb-0 pe-md-0">
                      <a href="product-categories.php" class="d-block industry_content_div position-relative">
                          <img src="/assets/frontend/images/home/industry_img_7.png" alt="" class="industry_img">
                          <div class="d-flex industry_content">
                              <span class="industry_text_link ps-md-4">Pharmaceuticals</span>
                              <span class="industry_arrow_link pe-md-3">
                                  <img class="rotate45" src="/assets/frontend/images/home/right_arrow_45deg.png">
                              </span>
                          </div>
                      </a>
                  </div>
              
                  <div class="col-md-4 col-6 mb-0 pe-md-0">
                      <a href="product-categories.php" class="d-block industry_content_div position-relative">
                          <img src="/assets/frontend/images/home/industry_img_8.png" alt="" class="industry_img">
                          <div class="d-flex industry_content">
                              <span class="industry_text_link ps-md-4">Metal Treatment</span>
                              <span class="industry_arrow_link pe-md-3">
                                  <img class="rotate45" src="/assets/frontend/images/home/right_arrow_45deg.png">
                              </span>
                          </div>
                      </a>
                  </div>
              
                  <div class="col-md-4 col-6 mb-0 pe-md-0">
                      <a href="product-categories.php" class="d-block industry_content_div position-relative">
                          <img src="/assets/frontend/images/home/industry_img_9.png" alt="" class="industry_img">
                          <div class="d-flex industry_content">
                              <span class="industry_text_link ps-md-4">Surface Treatment</span>
                              <span class="industry_arrow_link pe-md-3">
                                  <img class="rotate45" src="/assets/frontend/images/home/right_arrow_45deg.png">
                              </span>
                          </div>
                      </a>
                  </div>
              </div>

              <div class="col-md-6 d-md-none d-block py-3 text-center">
                  <a href="#" class="btn a_btn blue_btn float-md-end">
                      View All
                  </a>
              </div>
          </div>
      </section>

      <section class="blue_section what_we_do">
          <div class="container py-md-5 py-3">
              <div class="row justify-content-between">
                  <div class="col-md-6">
                      <h2 class="product_heading what_we_do_heading text-center pb-1 float-start"><span class="text-light">WHAT</span> WE DO?</h2>
                  </div>
                  <div class="col-md-6 d-md-block d-none">
                      <a href="what-we-do.php" class="btn a_btn purple_btn float-end border border-2 border-light text-light">
                          View All
                      </a>
                  </div>
              </div>
              <div class="row">
                  <div class="owl-theme owl-carousel" id="what_we_do_slider">
                      <div class="col-12 what_we_do_main_div">
                          <div class="card">
                              <img src="/assets/frontend/images/home/what_we_do_img_1.png" class="card-img-top" alt="card-img-top">
                              <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  <a href="what-we-do.php" class="what_we_do_link">Read More<i class="fa fa-arrow-right"></i></a>
                              </div>
                          </div>
                      </div>

                      <div class="col-12 what_we_do_main_div">
                          <div class="card">
                              <img src="/assets/frontend/images/home/what_we_do_img_2.png" class="card-img-top" alt="card-img-top">
                              <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  <a href="what-we-do.php" class="what_we_do_link">Read More<i class="fa fa-arrow-right"></i></a>
                              </div>
                          </div>
                      </div>

                      <div class="col-12 what_we_do_main_div">
                          <div class="card">
                              <img src="/assets/frontend/images/home/what_we_do_img_3.png" class="card-img-top" alt="card-img-top">
                              <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  <a href="what-we-do.php" class="what_we_do_link">Read More<i class="fa fa-arrow-right"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-md-6 d-md-none d-block py-3 text-center">
                  <a href="what-we-do.php" class="btn a_btn purple_btn float-md-end border border-2 border-light text-light">
                      View All
                  </a>
              </div>
          </div>
      </section>
      
      <section class="white_section why_sscpl pb-md-5 pb-3">
          <div class="container py-md-5 py-3 mb-md-5">
              <div class="row justify-content-between position-relative">
                  <div class="animated_moving_machine py-md-2 d-md-block d-none">
                      <img class="moving_machine" src="/assets/frontend/images/home/animated_top-tank.png" alt="">
                  </div>
                  <div class="col-12">
                      <div class="why_sscpl_bg_img">
                          <h2 class="product_heading text-light text-center pt-md-5 pt-3 mt-md-4">WHY SSCPL?</h2>
                          <div class="row pt-md-5 pt-3">
                              <div class="col-md-3 col-6 sscl_contents_main_div text-center pb-md-5 pb-3">
                                  <div class="sscl_img_div"> <img src="/assets/frontend/images/home/funnel.png" alt="" class="sscl_img"></div>
                                  <p class="sscl_content mt-md-3">Product</p>
                              </div>
                              <div class="col-md-3 col-6 sscl_contents_main_div text-center pb-md-5 pb-3">
                                  <div class="sscl_img_div"> <img src="/assets/frontend/images/home/competitve_pricing.png" alt="" class="sscl_img"></div>
                                  <p class="sscl_content mt-md-3">Competitve Pricing</p>
                              </div>
                              <div class="col-md-3 col-6 sscl_contents_main_div text-center pb-md-5 pb-3">
                                  <div class="sscl_img_div"> <img src="/assets/frontend/images/home/packaging.png" alt="" class="sscl_img"></div>
                                  <p class="sscl_content mt-md-3">Packaging</p>
                              </div>
                              <div class="col-md-3 col-6 sscl_contents_main_div text-center pb-md-5 pb-3">
                                  <div class="sscl_img_div"> <img src="/assets/frontend/images/home/commitment.png" alt="" class="sscl_img"></div>
                                  <p class="sscl_content mt-md-3">Commitment</p>
                              </div>
                              <div class="col-md-3 col-6 sscl_contents_main_div text-center pb-md-5 pb-3">
                                  <div class="sscl_img_div"> <img src="/assets/frontend/images/home/delivery.png" alt="" class="sscl_img"></div>
                                  <p class="sscl_content mt-md-3">Delivery</p>
                              </div>
                              <div class="col-md-3 col-6 sscl_contents_main_div text-center pb-md-5 pb-3">
                                  <div class="sscl_img_div"> <img src="/assets/frontend/images/home/customised_solutions.png" alt="" class="sscl_img"></div>
                                  <p class="sscl_content mt-md-3">Customised Solutions</p>
                              </div>
                              <div class="col-md-3 col-6 sscl_contents_main_div text-center pb-md-5 pb-3">
                                  <div class="sscl_img_div"> <img src="/assets/frontend/images/home/compliances.png" alt="" class="sscl_img"></div>
                                  <p class="sscl_content mt-md-3">Compliances</p>
                              </div>
                              <div class="col-md-3 col-6 sscl_contents_main_div text-center pb-md-5 pb-3">
                                  <div class="sscl_img_div"> <img src="/assets/frontend/images/home/customer_support.png" alt="" class="sscl_img"></div>
                                  <p class="sscl_content mt-md-3">Customer Support</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="white_section future_activity">
          <div class="container pb-md-5 pb-3">
              <div class="row">
                  <div class="col-md-12 pb-md-3">
                      <h2 class="product_heading text-center pb-md-1 float-start"><span class="our">FUTURE</span> ACTIVITES & OBJECTIVES</h2>
                  </div>
                  <div class="owl-theme owl-carousel" id="future_activity_slider">
                      <div class="col-12 future_activites_main_div">
                          <div class="card">
                              <img src="/assets/frontend/images/home/future_activites_1.png" class="card-img-top" alt="card-img-top">
                              <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  <a class="future_activites_link">Read More</a>
                              </div>
                          </div>
                      </div>

                      <div class="col-12 future_activites_main_div">
                          <div class="card">
                              <img src="/assets/frontend/images/home/future_activites_2.png" class="card-img-top" alt="card-img-top">
                              <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  <a class="future_activites_link">Read More</a>
                              </div>
                          </div>
                      </div>

                      <div class="col-12 future_activites_main_div">
                          <div class="card">
                              <img src="/assets/frontend/images/home/future_activites_3.png" class="card-img-top" alt="card-img-top">
                              <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  <a class="future_activites_link">Read More</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="white_section supply_chain_partner text-light bg-light pb-md-5 pb-3">
          <div class="container py-md-4 py-3">
              <div class="row d-flex justify-content-center position-relative">
                  <div class="col-12">
                      <div class="content_img_div p-md-0 p-3">
                          <h2 class="product_heading text-light text-center pt-md-5 pt-3">Supply Chain Partner</h2>
                          <br class="d-md-block d-none">
                          <div class="d-flex justify-content-center spply-chn-content_div">
                              <p class="col-md-9 sply_chn_content text-md-center pb-md-5 pb-3">
                                  We are Preferred Best Exporters for Korea, Brazil, Thailand, USA, 
                                  Australia, Japan, Saudi Arabia, UAE, Bangladesh and Sri Lanka.
                              </p>
                          </div>
                          <div class="three_boxes_div col-md-11 row row-cols-1 row-cols-md-3">
                              <div class="col ">
                                  <div class="spply_chn_box">
                                      <img src="/assets/frontend/images/home/chemical_list.png" alt="" class="spply_chn_box_img">
                                      <h5 class="spply_chn_title my-md-5">Chemical List</h5>
                                      <a href="" class="spply_chn_btn">Download</a>
                                  </div>
                              </div>

                              <div class="col ">
                                  <div class="spply_chn_box">
                                      <img src="/assets/frontend/images/home/partner_with_us.png" alt="" class="spply_chn_box_img">
                                      <h5 class="spply_chn_title my-md-5">Partner With Us</h5>
                                      <a href="enquire.php" class="spply_chn_btn">Connect Now</a>
                                  </div>
                              </div>

                              <div class="col ">
                                  <div class="spply_chn_box">
                                      <img src="/assets/frontend/images/home/certificate.png" alt="" class="spply_chn_box_img">
                                      <h5 class="spply_chn_title my-md-5">Certificate</h5>
                                      <a href="" class="spply_chn_btn">View</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="white_section code_of_conduct bg-light">
          <div class="container text-center pb-md-5 py-3 pt-md-4">
              <h2 class="col-12 product_heading text-center pb-md-3">CODE of <span class="our">CONDUCT</span></h2>
              <p class="col-12 code_of_content_div pb-md-3">
                  Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                  totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae 
                  dicta sunt explicabo Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
              </p>
              <a href="" class="col-12 spply_chn_btn">Read More</a>
          </div>
      </section>

  </main>

@endsection