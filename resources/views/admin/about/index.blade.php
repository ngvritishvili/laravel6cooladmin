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

    <div class="content-inner">
        <form action="{{ route('about.store', $locale) }}" method="POST">
            @csrf
            <div class="container mt-5">
                <div class="col-">

                    <div class="">
                        <label
                            class="form-control-label">{{ ($attributes != null) ? $attributes->translate($locale)->title : 'Title' }}</label>
                        <input class="form-control" placeholder="English"
                               name="titleen" required
                               value="{{ old('titleen', ($about != null) ? $about->translate('en')->title : '') }}">

                        <input class="form-control mt-3" placeholder="ქართული"
                               name="titleka" required
                               value="{{ old('titleka', ($about != null) ? $about->translate('ka')->title : '') }}">
                    </div>

                    <div class="">
                        <label
                            class="form-control-label mt-4">{{ ($attributes != null) ? $attributes->translate($locale)->description : 'Article' }} En</label>
                        <textarea class="md-textarea form-control" rows="4" cols="7"
                                  name="articleen"
                                  placeholder="English" required
                        >{{ ($about != null) ? $about->translate('en')->article : '' }}</textarea>

                        <label
                            class="form-control-label mt-4">{{ ($attributes != null) ? $attributes->translate($locale)->description : 'Article' }} Ge</label>
                        <textarea class="md-textarea form-control mt-3" rows="4" cols="7"
                                  name="articleka"
                                  placeholder="ქართული" required
                        >{{ ($about != null) ? $about->translate('ka')->article : '' }}</textarea>
                    </div>

                    <button class="btn btn-warning mt-4" type="submit">{{ $attributes->translate($locale)->edit }}</button>
                </div>
            </div>
        </form>
    </div>

    @include('admin.layouts.footer')
@endsection
