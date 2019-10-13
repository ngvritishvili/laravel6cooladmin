@extends('layouts.apps')
@section('content')
    @include('layouts.header')
    <div>


        <!-- catalog main -->
        <div class="catalog_main mb-2">
            <h1 class="catalog_title align-items-center">Catalog</h1>
            <img class="catalog_banner" src="/assets/images/slide1.jpg" alt="catalog main img">
        </div>
        <div class="container col-lg-12 row mb-lg-5 mx-auto">


            <div class="col-3 mw-100">

                @foreach($categories as $category)

                    <div class="side-navbar col-3 mt-2 catalog_categories mw-100">
                        <div class="sidebar-header">
                            <h3>{{$category->translate($locale)->name}}</h3>
                        </div>
                        <div class="nav-menu">
                            <div class="nav-item">
                                <li><a href="#CategoryDropdown" aria-expanded="false" data-toggle="collapse"> <i
                                            class="icon-interface-windows"></i>{{ $category->sub->translate($locale)->name }}</a>
                                    <ul id="CategoryDropdown" class="collapse list-unstyled ">
                                        @foreach($products as $product)
                                            <li><a href="#">{{ $product->translate($locale)->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="container col-9">
                <div class="row card-deck">
                    <p class="mt-2  mr-1 text-center col-3 category_titles catalog_categories">TIME</p>
                    <p class="mt-2  mr-1 text-center col-3 category_titles catalog_categories">PRICE</p>
                    <p class="mt-2  mr-1 text-center col-3 category_titles catalog_categories">IO'S CHOICE</p>

                    <div class="col-3 mt-2  mr-1 text-center  sortable-card">
                        <div class="col-3 mt-2 ">
                            <img src="https://picsum.photos/250">
                        </div>
                        <div class=" col-3 mt-2">
                            <img src="https://picsum.photos/250">
                        </div>

                        <div class=" col-3 mt-2">
                            <img src="https://picsum.photos/250">
                        </div>

                    </div>
                    <div class="col-3 mt-2  mr-1 text-center  sortable-card">

                        <div class="mt-2">
                            <img src="https://picsum.photos/250">
                        </div>

                        <div class="mt-2">
                            <img src="https://picsum.photos/250">
                        </div>

                        <div class="mt-2">
                            <img src="https://picsum.photos/250">
                        </div>
                    </div>
                    <div class="col-3 mt-2  mr-1 text-center  sortable-card">

                        <div class="mt-2">
                            <img src="https://picsum.photos/250">
                        </div>

                        <div class="mt-2">
                            <img src="https://picsum.photos/250">
                        </div>

                        <div class="mt-2">
                            <img src="https://picsum.photos/250">
                        </div>
                    </div>
                </div>
            </div>

        </div>


            <!-- catalog main end -->
            <!-- filter categoris -->
{{--            <main class="catalog_page">--}}
{{--                <aside>--}}
{{--                    <ul class="main_category">--}}
{{--                        <li class="category_title" onclick="filterSelection('category')">category</li>--}}
{{--                        <li class="category_list" onclick="filterSelection('main_room')">Main Room</li>--}}
{{--                        <li class="category_list sub_category">Sliping Room--}}
{{--                            <ul class="sub_category_content">--}}
{{--                                <li onclick="filterSelection('sliping_room')">Sub Category</li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="category_list" onclick="filterSelection('category4')">Category #4</li>--}}
{{--                        <li class="category_list" onclick="filterSelection('category5')">Category #5</li>--}}
{{--                    </ul>--}}
{{--                    <ul class="main_category">--}}
{{--                        <li class="category_title" onclick="filterSelection('category')">style</li>--}}
{{--                        <li class="category_list" onclick="filterSelection('main_room')">Main Room</li>--}}
{{--                        <li class="category_list sub_category">Sliping Room--}}
{{--                            <ul class="sub_category_content">--}}
{{--                                <li onclick="filterSelection('sliping_room')">Sub Category</li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="category_list" onclick="filterSelection('category4')">Category #4</li>--}}
{{--                        <li class="category_list" onclick="filterSelection('category5')">Category #5</li>--}}
{{--                    </ul>--}}
{{--                    <ul class="main_category">--}}
{{--                        <li class="category_title" onclick="filterSelection('category')">material</li>--}}
{{--                        <li class="category_list" onclick="filterSelection('main_room')">Main Room</li>--}}
{{--                        <li class="category_list sub_category">Sliping Room--}}
{{--                            <ul class="sub_category_content">--}}
{{--                                <li onclick="filterSelection('sliping_room')">Sub Category</li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="category_list" onclick="filterSelection('category4')">Category #4</li>--}}
{{--                        <li class="category_list" onclick="filterSelection('category5')">Category #5</li>--}}
{{--                    </ul>--}}
{{--                </aside>--}}
{{--                <div class="categories_wrapper">--}}
{{--                    <div class="categories_header">--}}
{{--                        <h1 class="filterByTime">Time</h1>--}}
{{--                        <h1 class="filterByPrice">Price</h1>--}}
{{--                        <h1 class="filterByChoice">io’s choice</h1>--}}
{{--                    </div>--}}
{{--                    <ul class="catalog" id="FilterContainer">--}}
{{--                        <li class="catalog_item main_room">--}}
{{--                            <img class="catalog_img" src="/assets/images/category_item.jpg" alt="catalog1">--}}
{{--                        </li>--}}
{{--                        <li class="catalog_item sliping_room">--}}
{{--                            <img class="catalog_img" src="/assets/images/category_item.jpg" alt="catalog2">--}}
{{--                        </li>--}}
{{--                        <li class="catalog_item main_room">--}}
{{--                            <img src="/assets/images/category_item.jpg" alt="catalog3">--}}
{{--                        </li>--}}
{{--                        <li class="catalog_item category4 category5 main_room">--}}
{{--                            <img src="/assets/images/category_item.jpg" alt="catalog4">--}}
{{--                        </li>--}}
{{--                        <li class="catalog_item sliping_room">--}}
{{--                            <img src="/assets/images/category_item.jpg" alt="catalog5">--}}
{{--                        </li>--}}
{{--                        <li class="catalog_item category5">--}}
{{--                            <img src="/assets/images/category_item.jpg" alt="catalog6">--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <!-- popup slider -->--}}
{{--                    <div class="category_popup">--}}
{{--                        <span class="close">&times;</span>--}}
{{--                        <div class="popup_info">--}}
{{--                            <div class="popup_slider">--}}
{{--                                slider--}}
{{--                            </div>--}}
{{--                            <div class="popup_content">--}}
{{--                                <div class="about_content">--}}
{{--                                    <h1 class="popup_title">Name of the topic</h1>--}}
{{--                                    <h2 class="sub_title">Category / Subcategory</h1>--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor--}}
{{--                                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices--}}
{{--                                            gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>--}}
{{--                                </div>--}}
{{--                                <div class="add_info">--}}
{{--                                    <span class="share">share:</span>--}}
{{--                                    <h2>Do you like our works?</h2>--}}
{{--                                    <ul>--}}
{{--                                        <li><span>Contact:</span> sales@iostudio.ge</li>--}}
{{--                                        <li><span>Call:</span> +995 551 200 656</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <!-- popup slider -->--}}
{{--                </div>--}}
{{--            </main>--}}
    </div>
    @include('layouts.footer')
@endsection
