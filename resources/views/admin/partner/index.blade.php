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
    <form action="{{ route('partner.store', $locale) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label class="form-control-label mt-4 mb-3 ml-3 text-bold">Upload Partner</label>
        <div class="container mt-5">
            <div class="col-">
                <div class="container border">
                    <div class="input-group mb-2 mt-2">
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


    <p class="form-control-plaintext ml-5 text-center text-bold">Partner List</p>

    <div class="col-12 row container">
        @foreach($partners as $partner )

            <div class="col-6 pull-right">
                <form action="{{route('partner.destroy', [  $locale, $partner->id ?? '']) }}" method="post" class="mb-5">
                    @csrf
                    @method('delete')
                    <div class="container border">
                        <button class="btn btn-danger pull-right"
                                onclick="document.getElementById('remove-image').submit();">Remove
                        </button>
                        <img class="profile-pic" src="/images/partners/{{ $partner->image }}"/>
                    </div>
                </form>
            </div>

        @endforeach
    </div>

    <form id="remove-image" action="{{ route('partner.destroy', [  $locale, $partner->id ?? '' ] ) }}" method="post">
        @csrf
        @method('delete')
    </form>

    @include('admin.layouts.footer')
@endsection
