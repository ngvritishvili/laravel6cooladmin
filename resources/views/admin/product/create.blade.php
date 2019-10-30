@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.header')

    @if($errors->all())
        <div class="notification error closeable">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <a class="close"></a>
        </div>
    @endif

    <form action="{{ route('product.store', $locale) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="container mt-5">

            <div class="">
                <select class="dropdown btn btn-warning" name="id" required>
                    <option class="dropdown-item" value="" selected disabled>Select Category</option>

                    @foreach($subCategories as $sub)
                        <option class="dropdown-item"
                                value="{{ $sub->id }}">{{ $sub->translate($locale)->name }}</option>
                    @endforeach
                </select>
            </div>


            <label for="productName" class="mt-4">{{ $attributes->translate($locale)->product_name }}</label>
            <input id="productName" name="productnameen" class="form-control mt-2" placeholder="English" required>
            <input id="productName" name="productnameka" class="form-control mt-2" placeholder="ქართულად" required>

            <label for="productDescription" class="mt-4">{{ $attributes->translate($locale)->product_description }}
                En</label>
            <textarea id="productDescription" name="productdescriptionen" class="form-control mt-2"
                      placeholder="English" required></textarea>
            <label for="productDescription" class="mt-4">{{ $attributes->translate($locale)->product_description }}
                Ge</label>
            <textarea id="productDescription" name="productdescriptionka" class="form-control mt-2"
                      placeholder="ქართულად" required></textarea>

            <label for="productStyle" class="mt-3">{{ $attributes->translate($locale)->style }}</label>
            <input id="productStyle" name="productstyleen" class="form-control mt-2" placeholder="English" required>
            <input id="productStyle" name="productstyleka" class="form-control mt-2" placeholder="ქართულად" required>

            <label for="productMaterial" class="mt-3">{{ $attributes->translate($locale)->material }}</label>
            <div class=" row container ">
                <select class=" form-control col-9">
                    <option value="" selected disabled>Select Material</option>
                    {{--                @foreach()--}}
                    <option value=""></option>
                    {{--                @endforeach--}}
                </select>
                <button class="btn btn-warning col-2 ml-4">Add Material in List</button>
            </div>

            <input id="productMaterial" name="productmaterialen" class="form-control mt-2" placeholder="English"
                   required>
            <input id="productMaterial" name="productmaterialka" class="form-control mt-2" placeholder="ქართულად"
                   required>

            <label for="productPrice" class="mt-3">{{ $attributes->translate($locale)->product_price }}</label>
            <input id="productPrice" name="price" class="form-control mt-2" placeholder="$" required>

            <div class="mt-3">
                <label
                    class=" mt-4">{{ $attributes->translate($locale)->product_image }}</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input name="images[]" type="file" class="custom-file-input" id="inputGroupFile01"
                               aria-describedby="inputGroupFileAddon01" required multiple>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-5">{{ $attributes->translate($locale)->create }}</button>
        </div>
    </form>
    @include('admin.layouts.footer')
@endsection
