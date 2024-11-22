@extends('frontend.layouts.app')

@section('page.title', 'Saagar')

@section('page.description', 'description')

@section('page.type', 'website')

@section('page.content')

@php
    if (!empty($page->content)) {
        $data = $page->content;
        $decoded_data = json_decode($data, true);
        $data = $decoded_data['banner'];
    } else {
        $data = '';
    }
@endphp

<main class="what_we_do_page">
    <section class="banner" id="what_we_do_banner">
        <div class="container ">
            <div class="banner_heading_div text-center">
                <h2 class="text-light banner_heading_text">{{ $page->title }}</h2>
                <ul class="list-group list-unstyled list-group-horizontal banner_heading_breadcrumb">
                    <li class="list-group-item"><a href=""><i class="fa fa-house text-light"></i></a></li>
                    <li class="list-group-item"><a href="{{route('index')}}">Home</a></li> >
                    <li class="list-group-item">
                        <p class="mb-0">{{ $page->title }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="white_section partnership py-md-5 py-3 pb-4">

        @if(!empty($data))
            <div class="container">

                @php
                    $a = 0;
                @endphp
        
                @foreach ($data as $row)
                    @if($a == 0 || $a % 2 == 0)
                        <div class="row align-items-md-center pb-md-5 pb-5">
                            <div class="col-md-7 pe-md-3">
                                <h2 class="col-md-12 product_heading text-start pt-md-3">{{ $row['text'] }}</h2>
                                <div class="fs-14 lh-20 black_text">
                                    {!! $row['description'] !!}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img class="right_img what_we_do_img ps-md-3 w-100" src="{{ asset('storage/' . $row['image']) }}" alt="{{ $row['text'] }}">
                            </div>
                        </div>
                    @else
                        <div class="d-flex flex-md-row-reverse align-items-md-center flex-column pb-md-5 pb-5">
                            <div class="col-md-7 ps-md-3">
                                <h2 class="col-md-12 product_heading text-start pt-md-3">{{ $row['text'] }}</h2>
                                <div class="fs-14 lh-20 black_text">
                                    {!! $row['description'] !!}
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img class="right_img what_we_do_img pe-md-3 w-100" src="{{ asset('storage/' . $row['image']) }}" alt="{{ $row['text'] }}">
                            </div>
                        </div>
                    @endif
                    
                    @php
                        $a++;
                    @endphp
                @endforeach
        
            </div>
        @endif
    </section>



</main>


@endsection