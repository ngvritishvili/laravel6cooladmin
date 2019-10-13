
@extends('layouts.apps')
@section('content')
    @include('layouts.header')
<div class="about_main ">
    <h1 class="about_title">About</h1>
    <img src="/assets/images/slide1.jpg" alt="about main img">
</div>
<!-- about main end -->
<!-- section about -->
<section class="about_content">
    <h1 class="about_content_title">{{ $about->translate($locale)->title }}</h1>
    <p>{{ $about->translate($locale)->article }}</p>
</section>

    @include('layouts.footer')
@endsection
