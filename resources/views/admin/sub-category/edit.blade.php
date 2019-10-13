@extends('admin.layouts.app')
@section('content')
@include('admin.layouts.header')
<form action="{{ route('sub-category.update', [$locale, $subCategory->id]) }}" method="post">
    @csrf
    @method('patch')
    <div class="container mt-3">

        <label class=" no-border">{{ $attributes->translate($locale)->edit_sub_category }}</label>
        <input class="form-control " name="subcategoryen" value="{{ $subCategory->translate('en')->name }}">
        <input class="form-control mt-2"  name="subcategoryka" value="{{ $subCategory->translate('ka')->name }}">

        <button type="submit" class="btn btn-warning mt-2">{{ $attributes->translate($locale)->edit }}</button>

    </div>
</form>
@include('admin.layouts.footer')
@endsection
