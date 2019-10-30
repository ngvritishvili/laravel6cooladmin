@extends('layouts.apps')
@section('content')
    @include('layouts.header')
    <form action="{{ route('search',[$locale]) }}" method="post">
        @csrf
        <div>
            <!-- catalog main -->
            <div class="catalog_main mb-2">
                <h1 class="catalog_title align-items-center">Catalog</h1>
                <img class="catalog_banner" src="/assets/images/slide1.jpg" alt="catalog main img">
            </div>
            <div class="container-fluid">

                <div class="row">

                    <div class="col-sm-3 " style="min-width: 250px">
                        <div class="sidebar-header catalog_categories">
                            <h3>{{$attribute->translate($locale)->category}}</h3>
                        </div>
                        <div class="side-navbar  catalog_categories ">
                            @foreach($categories as $category)
                                <div class="nav-menu ">
                                    <div class="nav-item">
                                        <li><a href="#subid{{ $category->id }}" aria-expanded="false"
                                               data-toggle="collapse"> <i
                                                    class="icon-interface-windows  mr-3"></i>{{ $category->translate($locale)->name }}
                                            </a>
                                            <ul id="subid{{ $category->id }}" class="collapse list-unstyled ">

                                                @foreach($category->sub()->get() as $subCategory)

                                                    <li class="">

                                                        <a data-toggle="modal" data-target="#id{{$subCategory->id}}"
                                                           href=""
                                                           style="margin-left: 30px">
                                                            {{ $subCategory->translate('en')->name }}
                                                        </a>

                                                        <input style="margin-left: 20px"
                                                               data-target="#id{{$subCategory->id}}"
                                                               class="form-check-input" type="checkbox"
                                                               value="{{ $subCategory->id }}" id="" name="subId[]">

                                                    </li>

                                                @endforeach
                                            </ul>
                                        </li>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="sidebar-header catalog_categories mt-2">
                            <h3>{{$attribute->translate($locale)->style}}</h3>
                        </div>
                        <div class="side-navbar  catalog_categories ">
                            @foreach($products as $product)
                                <li class=" row ">

{{--                                    <p type="" data-toggle="modal" data-target="#id{{$product->id}}"--}}
{{--                                       href="" class="pull-left"--}}
{{--                                       style="margin-left: 30px">--}}
{{--                                        {{ $product->translate('en')->style }}--}}
{{--                                    </p>--}}
                                    <label style="margin-left: 30px">{{ $product->translate($locale)->style }}</label>

                                    <input style="margin-left: 105px"
                                           data-target="#id{{$product->id}}"
                                           class="form-check-input pull-right" type="checkbox"
                                           value="{{ $product->id }}" id="" name="styleId[]">

                                </li>
                            @endforeach
                        </div>

                        <div class="sidebar-header catalog_categories mt-2">
                            <h3>{{$attribute->translate($locale)->material}}</h3>
                        </div>

                        <div class="checkbox">
                            <label>{{ $product->translate($locale)->material }}</label><input type="checkbox" value="" style="margin-left: 10px;">
                        </div>
                    </div>

                    <div class="container col-sm-9  mt-2 row">

                        <div class="col-sm-12 row text-center align-items-start">
                            <p class="mr-2 col" style="background-color:#f2f2f2; ">
                                <button type="submit" id="time">Time</button>
                            </p>
                            <p class="mr-2 col" style="background-color:#f2f2f2; ">
                                <button type="submit" id="price">Price</button>
                            </p>
                            <p class="mr-2 col" style="background-color:#f2f2f2; ">
                                <button type="submit" id="choice">IO's Choice</button>
                            </p>

                        </div>

                        {{--    time div starts    --}}

                        <div id="time_div" class="col-sm-12 row text-center" style="display: none">
                            <div class="col-sm-12 mb-2 img-fluid justify-content-around row no-gutters"
                                 style="min-width: 250px; ">

                                @foreach($productsTime as $product)
                                    <div class="col-4 mb-3">
                                        <img src="/images/products/{{$product->images->first()->image}}"
                                             class="img-responsive col- img-thumbnail"
                                             style="min-width: 250px; max-width: 300px; max-height: 300px;" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{--    time div ends    --}}



                        {{--    price div starts    --}}
                        <div id="price_div" class="col-sm-12 row text-center" style="display: none">
                            <div class="col-sm-12 mb-2 img-fluid justify-content-around row no-gutters"
                                 style="min-width: 250px; ">
                                @foreach($productsPrice as $product)
                                    <img src="/images/products/{{$product->images->first()->image}}"
                                         class="img-thumbnail "
                                         style="min-width: 250px; max-width: 300px; max-height: 300px;" alt="">
                                @endforeach
                            </div>
                        </div>
                        {{--    price  div ends    --}}


                        {{--    choice div starts    --}}

                        <div id="choice_div" class="col-sm-12 row text-center" style="display: none">
                            <div class="col-sm-12 mb-2 img-fluid justify-content-around row no-gutters"
                                 style="min-width: 250px; ">
                                @foreach($productsIO as $product)
                                    <img src="/images/products/{{$product->images->first()->image}}"
                                         class="img-thumbnail "
                                         style="min-width: 250px; max-width: 300px; max-height: 300px;" alt="">
                                @endforeach
                            </div>
                        </div>

                        {{--    choice div ends     --}}


                        {{--      default  start --}}
                        <div id="random_div" class="col-sm-12 row text-center">
                            <div class="col-sm-12 mb-2 img-fluid justify-content-around row no-gutters"
                                 style="min-width: 250px; ">
                                @foreach($productsRandom as $product)
                                    <img src="/images/products/{{$product->images->first()->image}}"
                                         class=" img-responsive col- img-thumbnail"
                                         style="min-width: 250px; max-width: 300px; max-height: 300px;" alt="">
                                @endforeach
                            </div>
                        </div>
                        {{--                    default  ends   --}}
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">search</button>
    </form>
    @include('layouts.footer')
@endsection
