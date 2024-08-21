@extends('frontend.layouts.app')

@section('page.title', 'Saagar')

@section('page.description', 'description')

@section('page.type', 'website')

@section('page.content')
@php
    if (!empty($page->content)) {
        $data = $page->content;
        $decoded_data = json_decode($data);

        //echo '<pre>';
        //print_r($decoded_data);
        //echo '</pre>';


        //exit();
        $about_content = $decoded_data->about_content ?? '';
        $core_content = $decoded_data->core_content ?? '';
        $policy_content = $decoded_data->policy_content ?? '';
        $about2_content1 = $decoded_data->about2_content1 ?? '';
        $about2_content2 = $decoded_data->about2_content2 ?? '';
        $mnv_description1 = $decoded_data->mnv_description1 ?? '';
        $mnv_description2 = $decoded_data->mnv_description2 ?? '';
        $about_image = $decoded_data->about_image ?? '';
        $core_image = $decoded_data->core_image ?? '';
        $policy_image = $decoded_data->policy_image ?? '';
        $mnv_image1 = $decoded_data->mnv_image1 ?? '';
        $mnv_image2 = $decoded_data->mnv_image2 ?? '';
        $mnv_bg_image1 = $decoded_data->mnv_bg_image1 ?? '';
        $mnv_bg_image2 = $decoded_data->mnv_bg_image2 ?? '';
        $about2_image1 = $decoded_data->about2_image1 ?? '';
        $about2_image2 = $decoded_data->about2_image2 ?? '';
        $teams = $decoded_data->team ?? '';


    } else {
        // If content is empty, set default empty values
        $about_content = '';
        $core_content = '';
        $policy_content = '';
        $about2_content1 = '';
        $about2_content2 = '';
        $mnv_description1 = '';
        $mnv_description2 = '';
        $about_image = '';
        $core_image = '';
        $policy_image = '';
        $mnv_image1 = '';
        $mnv_image2 = '';
        $mnv_bg_image1 = '';
        $mnv_bg_image2 = '';
        $about2_image1 = '';
        $about2_image2 = '';
        $teams = '';
    }
@endphp

<main class="about_us_page">

    <section class="banner" id="product_categories_banner_img">
        <div class="container ">
            <div class="banner_heading_div text-center">
                <h2 class="text-light banner_heading_text">About Us</h2>
                <ul class="list-group list-unstyled list-group-horizontal banner_heading_breadcrumb">
                    <li class="list-group-item"><a href=""><i class="fa fa-house text-light"></i></a></li>
                    <li class="list-group-item"><a href="{{route('index')}}">Home</a></li> >
                    <li class="list-group-item">
                        <p class="mb-0">About Us</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="white_section about_us">
        <div class="container py-md-5">
            <div class="row about_us_story_div">
                <div class="col-md-7 pe-md-4">
                    <h2 class="product_heading text-start pb-md-1"><span class="our">ABOUT </span>US</h2>
                    {!! $about_content !!}
                </div>
                <div class="col-md-5 saagar_speciality_chemical_machines float-end">
                    @if (!empty($about_image))
                        <img src="{{ asset('storage/' . $about_image) }}" alt="Chemical Process" class="img-fluid rounded">
                    @endif
                    <div class="about_info_box info-box text-start text-light p-md-4 up_and_down">
                        <h4>100k+</h4>
                        <p>Lorem Ipsum</p>
                        <hr>
                        <h4>12M</h4>
                        <p>Lorem Ipsum Lans</p>
                    </div>
                </div>
            </div>


            <div class="col-md-12 background_blue_img my-md-5 p-md-5 cor_values">
                <h2 class="product_heading text-start text-light pb-md-1">Cor Values</h2>
                <div class="row">
                    <div class="col-md-7 text-light pe-md-4 pt-md-3">
                        {!! $core_content !!}
                    </div>
                    <div class="col-md-5">
                        @if (!empty($core_image))
                            <img src="{{ asset('storage/' . $core_image) }}" alt="Chemical Process"
                                class="img-fluid rounded">
                        @endif
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row-reverse col-md-12">
                <div class="col-md-7 ps-md-5">
                    <h2 class="col-md-12 product_heading text-start pb-md-3 float-start"><span class="our"> COMPANY
                        </span>POLICY</h2>
                    {!! $policy_content !!}
                </div>
                <div class="col-md-5">
                    @if (!empty($policy_image))
                        <img src="{{ asset('storage/' . $policy_image) }}" alt="Chemical Process" class="img-fluid rounded">
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if (!empty($teams))
        <section class="blue_section management_team">
            <div class="container py-md-5">
                <h2 class="vission_heading product_heading py-md-3 text-light">MANAGEMENT<span class="purple_color">
                        TEAM</span></h2>

                @foreach ($teams as $index => $team)
                    <div class="col-md-12 row align-items-center">
                        <div class="col-md-3">
                            <img src="{{ isset($team->image) ? asset('storage/' . $team->image) : '' }}"
                                alt="{{ isset($team->name) ? $team->name : '' }}" class="img-fluid profile_img">
                        </div>
                        <div class="col-md-9 text-light">
                            <h5 class="name_and_position pb-md-3">{{ isset($team->name) ? $team->name : '' }}</h5>
                            {{ isset($team->description) ? $team->description : '' }}
                        </div>
                    </div>
                    @if ($index < count($teams) - 1)
                        <hr class="col-md-9 float-end text-light py-md-2">
                    @endif
                @endforeach
            </div>
        </section>
    @endif


    <section class="white_section  partnership">
        <div class="container pt-md-5">
            <div class="row align-items-center">
                <div class="col-md-7 pe-md-5">
                    {!! $about2_content1 !!}
                </div>
                @if (!empty($about2_image1))
                    <div class="col-md-5">
                        <img class="right_img what_we_do_img ps-md-3 mt-md-0"
                            src="{{ asset('storage/' . $about2_image1) }}">
                    </div>
                @endif
            </div>
        </div>

        <div class="container pt-md-5">
            <div class="d-flex flex-row-reverse align-items-center justify-content-between">
                <div class="col-md-6 ps-md-4">
                    {!! $about2_content2 !!}
                </div>
                @if (!empty($about2_image1))
                    <div class="col-md-5">
                        <img class="right_img what_we_do_img pe-md-3" src="{{ asset('storage/' . $about2_image2) }}">
                    </div>
                @endif
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
                            <div class="sscl_img_div"> <img src="/assets/frontend/images/home/funnel.png" alt=""
                                    class="sscl_img"></div>
                            <p class="sscl_content mt-md-3">Product</p>
                        </div>
                        <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                            <div class="sscl_img_div"> <img src="/assets/frontend/images/home/competitve_pricing.png"
                                    alt="" class="sscl_img"></div>
                            <p class="sscl_content mt-md-3">Competitve Pricing</p>
                        </div>
                        <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                            <div class="sscl_img_div"> <img src="/assets/frontend/images/home/packaging.png" alt=""
                                    class="sscl_img"></div>
                            <p class="sscl_content mt-md-3">Packaging</p>
                        </div>
                        <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                            <div class="sscl_img_div"> <img src="/assets/frontend/images/home/commitment.png" alt=""
                                    class="sscl_img"></div>
                            <p class="sscl_content mt-md-3">Commitment</p>
                        </div>
                        <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                            <div class="sscl_img_div"> <img src="/assets/frontend/images/home/delivery.png" alt=""
                                    class="sscl_img"></div>
                            <p class="sscl_content mt-md-3">Delivery</p>
                        </div>
                        <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                            <div class="sscl_img_div"> <img src="/assets/frontend/images/home/customised_solutions.png"
                                    alt="" class="sscl_img"></div>
                            <p class="sscl_content mt-md-3">Customised Solutions</p>
                        </div>
                        <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                            <div class="sscl_img_div"> <img src="/assets/frontend/images/home/compliances.png" alt=""
                                    class="sscl_img"></div>
                            <p class="sscl_content mt-md-3">Compliances</p>
                        </div>
                        <div class="col-md-3 sscl_contents_main_div text-center pb-md-5">
                            <div class="sscl_img_div"> <img src="/assets/frontend/images/home/customer_support.png"
                                    alt="" class="sscl_img"></div>
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
                    <div class="text-light p-md-5" style="background-image: url('{{ asset('storage/' . $mnv_bg_image1) }}'); background-size: cover; background-position: center; border-radius: 20px; height: 345px;">
                        <div class="vission_img_div">
                            <img src="{{ asset('storage/' . $mnv_image1) }}" alt="" class="vission_img">
                        </div>
                        <h2 class="vission_heading product_heading py-md-3 text-light"><span
                                class="purple_color">OUR</span> VISSION</h2>
                        {!! $mnv_description1 !!}
                    </div>
                </div>
                <div class="col">
                    <div class="text-light p-md-5" style="background-image: url('{{ asset('storage/' . $mnv_bg_image2) }}'); background-size: cover; background-position: center; border-radius: 20px; height: 345px;">
                        <div class="mission_img_div">
                            <img src="{{ asset('storage/' . $mnv_image2) }}" alt="" class="mission_img">
                        </div>
                        <h2 class="mission_heading product_heading py-md-3 text-light"><span
                                class="purple_color">OUR</span> MISSION</h2>
                        {!! $mnv_description2 !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection