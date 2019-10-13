@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.header')

    <form action="{{ route('category.store', $locale) }}" method="post">
        @csrf

        <div class="container mt-5">
            <label for="category" class="">{{ $attributes->translate($locale)->name }}</label>
            <input id="category" name="categoryen" class="form-control mt-2" placeholder="English" required>
            <input id="category" name="categoryka" class="form-control mt-2" placeholder="ქართულად" required>

            <button type="submit" class="btn btn-primary mt-3">{{ $attributes->translate($locale)->create }}</button>
        </div>
    </form>
    @include('admin.layouts.footer')
@endsection
