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
    <form action="{{ route('slide.store', $locale) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="form-control-label mt-4 mb-3 ml-3 text-bold">Upload Slide</label>
        <div class="container mt-5">
            <div class="col-">
                <div class="container border">
                    <label for="title" class="form-control-label mt-2">Slide Title</label>
                    <input id="title" class="form-control" name="title">

                    <label for="description" class="form-control-label mt-3">Slide Description</label>
                    <input id="description" class="form-control mb-3" name="description">

                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary mt-4" type="submit">Upload</button>
            </div>
        </div>
    </form>


    <p class="form-control-plaintext ml-5 text-center text-bold">SLIDES LIST</p>

    <div class="col-12 row container">
            @foreach($slides as $slide )

                    <div class="col-6 pull-right">
                <form action="{{route('slide.destroy', [  $locale, $slide->id ?? '']) }}" method="post" class="mb-5">
                    @csrf
                    @method('delete')
                    <div class="container border">
                        <label for="title" class="form-control-label mt-2">Slide Title</label>
                        <button class="btn btn-danger pull-right"
                                onclick="document.getElementById('remove-image').submit();">Remove
                        </button>
                        <input id="title" class="form-control" name="title" value="{{ $slide->title }}">

                        <label for="description" class="form-control-label mt-3">Slide Description</label>
                        <input id="description" class="form-control mb-3" name="description"
                               value="{{ $slide->description }}">

                        <img class="profile-pic" src="/images/slides/{{ $slide->image }}"/>
                    </div>
                </form>
                    </div>

            @endforeach
    </div>

    <form id="remove-image" action="{{ route('slide.destroy', [  $locale, $slide->id ?? '' ] ) }}" method="post">
        @csrf
        @method('delete')
    </form>

    @include('admin.layouts.footer')
@endsection
