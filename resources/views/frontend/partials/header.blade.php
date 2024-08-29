@php
    $footer = DB::table('frontend_settings')->where('id', 1)->first(); // Use `first()` instead of `get()` to get a single record
    $logo = $footer->logo ?? '';
@endphp
<header id="mainHeader" class="header pt-md-0 py-3">
      <div class="container">
          <div class="d-flex flex-column">
              <div class="top_bar col-12 pt-md-3 pt-2 d-lg-block d-none">                
                  <ul class="mb-2 list-group list-unstyled list-group-horizontal mb-md-0 float-end position-relative">
                        <li class="nav-item dropdown google_translate_desktop">
                            <a class="inline-box nav-link " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <!-- <i class="text-light fa-solid fa-language"></i> -->
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
                    <nav class="navbar d-none d-lg-inline navbar-expand-lg navbar-dark py-lg-0">
                        <div class="container px-md-0">
                            <a class="navbar-brand" href="{{route('index')}}">
                                <img class="header_logo" src="{{ asset('storage/' . $logo) }}" alt="Sagar Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                                <span class="navbar-toggler-icon"></span>
                            </button>                           
                           
                          <!-- N A V B A R     S T A R T -->
                          
                            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
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
                                <form action="{{ route('products_s') }}" method="GET" class="searchForm position-relative">
                                    <div class="search-icon-wrapper">
                                        <button type="button" class="btn search-icon" onclick="toggleSearchBar()">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                    <div class="search-bar d-none">
                                        <input type="text" class="product-search" name="search" class="form-control" placeholder="Search for Product" value="{{ request('search') }}">
                                        <input type="hidden" name="category_id" id="category_id" value="">
                                        <button type="submit" class="btn search_btn search_btn_2">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                    <!-- <a class="nav-link" href="#"><i class="fa fa-search text-light"></i></a> -->
                                <!-- </li> -->
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <nav class="navbar d-lg-none d-block">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="{{route('index')}}">
                                <img class="header_logo" src="{{ asset('storage/' . $logo) }}" alt="Sagar Logo">
                            </a>
                            <li class="nav-item dropdown google_translate_tab">
                                <a class="inline-box nav-link " data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <!-- <i class="text-light fa-solid fa-language"></i> -->
                                    <!--<div id="google_translate_element" style="/*display: inline-block;*/"></div>-->
                                    <div class="gtranslate_wrapper"></div>
                                </a>
                            </li> 
                            <form action="{{ route('products_s') }}" method="GET" class="searchForm position-relative">
                                <div class="search-icon-wrapper">
                                    <button type="button" class="btn search-icon" onclick="toggleSearchBar2()">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                                <div class="search-bar-for-tab d-none">
                                    <input type="text" class="product-search" name="search" class="form-control" placeholder="Search for Product" value="{{ request('search') }}">
                                    <input type="hidden" name="category_id" id="category_id" value="">
                                    <button type="submit" class="btn search_btn search_btn_2">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span class="fa fa-bars"></span>
                            </button>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                                <div class="offcanvas-header">
                                    <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5> -->
                                    <img class="header_logo" src="images/header_logo_2.png" alt="Sagar Logo">
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav gap-lg-3 mb-2 mb-lg-0">
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
                                        <li class="nav-item d-flex justify-content-md-start justify-content-center">
                                            <ul class="mb-2 list-group list-unstyled list-group-horizontal mb-md-0 float-end">
                                                <!-- <li class="list-group-item">
                                                    <a class="nav-link" href="#">ENG</a>
                                                </li> -->
                                                <li class="px-2">
                                                    <a class="nav-link" href="#"><i class="fa fa-linkedin-in"></i></a>
                                                </li>
                                                <li class="px-2">
                                                    <a class="nav-link" href="#"><i class="fa fa-instagram"></i></a>
                                                </li>
                                                <li class="px-2">
                                                    <a class="nav-link" href="#"><i class="fa fa-x-twitter"></i></a>
                                                </li>
                                                <li class="px-2">
                                                    <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>                                
                                </div>
                            </div>
                        </div>
                    </nav>
              </div>
          </div>
      </div>

  </header>
  