@extends('layouts.apps')
@section('content')
    @include('layouts.header')
    <div>


        <!-- catalog main -->
        <div class="catalog_main mb-2">
            <h1 class="catalog_title align-items-center">Catalog</h1>
            <img class="catalog_banner" src="/assets/images/slide1.jpg" alt="catalog main img">
        </div>
        <div class="container-fluid">

            <div class="row">

                <div class="col-sm-3 " style="min-width: 250px">

                    @foreach($categories as $category)

                        <div class="side-navbar  mt-2 catalog_categories ">
                            <div class="sidebar-header">
                                <h3>{{$category->translate($locale)->name}}</h3>
                            </div>
                            @foreach($category->sub()->get() as $subCategory)

                                <div class="nav-menu ">
                                    <div class="nav-item">
                                        <li><a href="#subid{{ $subCategory->id }}" aria-expanded="false"
                                               data-toggle="collapse"> <i
                                                    class="icon-interface-windows  mr-3"></i>{{ $subCategory->translate($locale)->name }}
                                            </a>
                                            <ul id="subid{{ $subCategory->id }}" class="collapse list-unstyled ">

                                            @foreach($subCategory->products as $one)

                                                    <li>
                                                        <a data-toggle="modal" data-target="#id{{$one->id}}" href=""
                                                           style="margin-left: 30px">
                                                            {{ $one->translate('en')->name }}
                                                        </a>
                                                    </li>

                                                @endforeach
                                            </ul>
                                        </li>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
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
                                <img src="/images/products/{{$product->images->first()->image}}" class="img-thumbnail "
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
                    <div id="random_div" class="col-sm-12 row text-center" >
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
    @include('layouts.footer')
@endsection
