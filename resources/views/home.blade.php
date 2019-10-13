@extends('layouts.apps')
@section('content')
    @include('layouts.header')
    <!-- main slide -->
    <div class="main_slider">
        <div class="swiper-container main_slider_container">
            <ul class="swiper-wrapper">
                @foreach($info->slides as $slide)
                    <div class="swiper-slide main_slider_content">
                        <div class="main_slider_info">
                            <h1 class="main_slide_title">{{ $slide->title }}</h1>
                            <p>{{ $slide->description }}</p>
                        </div>
                        <img class="main_slide_img" src="/images/slides/{{ $slide->image }}" alt="slide1">
                    </div>
                @endforeach

            </ul>
        </div>
        <div class="swiper-pagination pagination"></div>

    </div>

    <!-- main slide end -->
    <!-- main_images -->
    <ul class="main_images">
        <li><img src="/assets/images/img1.jpg" alt="main_images1"></li>
        <li>
            <ul class="list_images">
                <li><img src="/assets/images/img2.jpg" alt="main_images2"></li>
                <li><img src="/assets/images/img3.jpg" alt="main_images3"></li>
            </ul>
        </li>
        <li><img src="/assets/images/img4.jpg" alt="main_images4"></li>
    </ul>
    <!-- main_images -->
    <!-- partners slides -->
    <div class="partners_slider">
        <div class="swiper-container partners_slider_container">
            <ul class="swiper-wrapper partners_wrapper" style="height: 150px">
                @foreach($info->partners as $partner)
                <li class="swiper-slide partner_slider_content">
                    <img class="partners_slide_img" src="/images/partners/{{ $partner->image }}" alt="company1">
                </li>
                @endforeach
            </ul>
        </div>

        <div class="swiper-button-next next_btn">
            <div class="img">
                <img src="/assets/images/static/next_btn.jpg" alt="next_btn">
            </div>
        </div>
        <div class="swiper-button-prev prev_btn">
            <div class="img">
                <img src="/assets/images/static/prev_btn.jpg" alt="prev_btn">
            </div>
        </div>
    </div>
    <!-- partners slides end -->
    @include('layouts.footer')
@endsection
