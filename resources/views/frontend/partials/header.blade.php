@php
    $footer = DB::table('frontend_settings')->where('id', 1)->first(); // Use `first()` instead of `get()` to get a single record
    $logo = $footer->logo ?? '';
@endphp
<header id="mainHeader" class="header transparent pt-md-0 pt-3">
      <div class="container">
          <div class="d-flex flex-column">
              <div class="top_bar col-12 py-md-3 pt-2 d-md-block d-none">                
                  <ul class="mb-2 list-group list-unstyled list-group-horizontal mb-md-0 float-end">
                        <li class="nav-item dropdown office">
                            <a class="inline-box nav-link " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i
                                class="text-light fa-solid fa-language"></i>
                            <!--<div id="google_translate_element" style="/*display: inline-block;*/"></div>-->
                            <div class="gtranslate_wrapper"></div>

                            </a>
                        </li>
                      <!-- <li class="list-group-item">
                          <a class="nav-link" href="#">ENG</a>
                      </li> -->
                      <li class="list-group-item">
                          <a class="nav-link" href="#"><i class="fa fa-linkedin-in"></i></a>
                      </li>
                      <li class="list-group-item">
                          <a class="nav-link" href="#"><i class="fa fa-instagram"></i></a>
                      </li>
                      <li class="list-group-item">
                          <a class="nav-link" href="#"><i class="fa fa-x-twitter"></i></a>
                      </li>
                      <li class="list-group-item">
                          <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
                      </li>
                  </ul>
              </div>

              <div class="menu">
                  <nav class="navbar navbar-expand-lg navbar-dark pt-0">
                      <a class="navbar-brand" href="{{route('index')}}">
                          <img class="header_logo" src="{{ asset('storage/' . $logo) }}" alt="Sagar Logo"> 
                      </a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-end pb-md-3" id="navbarNav">
                          <ul class="navbar-nav gap-md-3 mb-2 mb-lg-0">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('products_category')}}">Products</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('about_us')}}">Company Profile</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('partner_with_us')}}">Partner with us</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('career')}}">Career</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="">Client</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="{{route('contact_us')}}">Contact Us</a>
                              </li>
                              <!-- <li class="list-group-item"> -->
                                <form action="{{ route('products_s') }}" method="GET" class="searchForm">
                                    <div class="search-bar">
                                        <input type="text" class="product-search" name="search" class="form-control" placeholder="Search for Product" value="{{ request('search') }}">
                                        <input type="hidden" name="category_id" id="category_id" value="">
                                        <button type="submit" class="btn search_btn me-2">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div> 
                                </form>
                                  <!-- <a class="nav-link" href="#"><i class="fa fa-search text-light"></i></a> -->
                              <!-- </li> -->
                          </ul>
                      </div>
                  </nav>
              </div>
          </div>
      </div>

      <div class="sidebar_instant_links">
          <div class="sidebar_social_media">
              <ul class="list-group-item list-unstyled mb-0 mt-1">
                  <li class="list-item">
                      <a href="" class="sidebar_social_media_link">
                          <i class="fa fa-linkedin-in"></i>                       
                      </a>
                  </li>
                  <li class="list-item">
                      <a href="" class="sidebar_social_media_link">
                          <i class="fa fa-instagram"></i>                       
                      </a>
                  </li>
                  <li class="list-item">
                      <a href="" class="sidebar_social_media_link">
                          <i class="fa fa-x-twitter"></i>                       
                      </a>
                  </li>
                  <li class="list-item">
                      <a href="" class="sidebar_social_media_link">
                          <i class="fa fa-facebook"></i>                       
                      </a>
                  </li>
              </ul>
          </div>
          <div class="newsletter">
              <div class="d-flex position-relative rotate-90">
                  <label class="file-upload-label" for="fileUpload">NewsLetter<i class="fa fa-file-arrow-down"> </i></label>
                  <input type="file" id="fileUpload" name="file" class="file-upload-input">
              </div>
          </div>
      </div>
  </header>
  