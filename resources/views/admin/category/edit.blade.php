@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.header')
<form action="{{ route('category.update', [$locale, $category->id]) }}" method="post">
    @csrf
    @method('patch')
    <div class="container mt-3">

        <label class=" no-border">Edit Category Name</label>
        <input class="form-control " name="categoryen" value="{{ $category->translate('en')->name }}">
        <input class="form-control mt-2"  name="categoryka" value="{{ $category->translate('ka')->name }}">

        <button type="submit" class="btn btn-warning mt-2">{{ $attributes->translate($locale)->edit }}</button>

    </div>
</form>
    @include('admin.layouts.footer')
@endsection
