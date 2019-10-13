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

    <form action="{{ route('product.update', [$locale, $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="container mt-3">

            <label class=" no-border  mt-4">{{ $attributes->translate($locale)->edit_product_name }}</label>
            <input class="form-control " name="productnameen" value="{{ $product->translate('en')->name }}">
            <input class="form-control mt-2" name="productnameka" value="{{ $product->translate('ka')->name }}">

            <label class=" no-border mt-4">{{ $attributes->translate($locale)->edit_product_description }}</label>
            <input class="form-control " name="descriptionen" value="{{ $product->translate('en')->description }}">
            <input class="form-control mt-2" name="descriptionka" value="{{ $product->translate('ka')->description }}">

            <label class=" no-border  mt-4">{{ $attributes->translate($locale)->edit_product_price }}</label>
            <input class="form-control " name="productprice" value="{{ $product->price }}">

            <div class="mt-3">
                <label
                    class=" mt-3">{{ $attributes->translate($locale)->edit_product_images }}</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input name="image[]" type="file" class="custom-file-input" id="inputGroupFile01"
                               aria-describedby="inputGroupFileAddon01" multiple>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
            </div>
            @foreach($product->images as $one)
                <div class="form-group  mt-4 img-wrap ">
                    <span onclick="document.getElementById('remove-image').submit();" class="close x">&times;</span>
                    <img class="profile-pic" src="/images/products/{{ $one->image }}"/>

                </div>
            @endforeach
            <div class="container mb-lg-5 mt-lg-5">
                <button type="submit" class="btn btn-warning mt-2 mb-lg-5">{{ $attributes->translate($locale)->save_changes }}</button>
            </div>
        </div>
    </form>


        <form id="remove-image" action="{{ route('image.destroy', [  $locale, $one->id ?? '' ] ) }}" method="post">
            @csrf

            @method('delete')
        </form>

    @include('admin.layouts.footer')
@endsection
