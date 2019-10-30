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
        <form action="{{ route('info.store', $locale) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container mt-5">
                <div class="col-">

                    <div class="">
                        <label
                            class="form-control-label">{{ ($attribute != null) ? $attribute->translate($locale)->title : 'Title' }}</label>
                        <input class="form-control" placeholder="English"
                               name="title"

                               value="{{ old('title', ($infoWithImages != null) ? $infoWithImages->title : '') }}">

                    </div>

                    <div class="">
                        <label
                            class="form-control-label mt-4">{{ ($attribute != null) ? $attribute->translate($locale)->description : 'Description' }}</label>
                        <textarea class="md-textarea form-control" rows="4" cols="7"
                                  name="site_description"
                                  placeholder="English"
                        >{{ ($infoWithImages != null) ? $infoWithImages->description : '' }}</textarea>
                    </div>

                    <div class="">
                        <label
                            class="form-control-label mt-4">{{ ($attribute != null) ? $attribute->translate($locale)->meta_words : 'Meta Words' }}</label>
                        <textarea class="md-textarea form-control" rows="4" cols="7"
                                  name="meta_words"
                                  placeholder="English"
                        >{{ ($infoWithImages != null) ? $infoWithImages->meta_words : '' }}</textarea>
                    </div>

                    <div class="">
                        <label
                            class="form-control-label mt-4">{{ ($attribute != null) ? $attribute->translate($locale)->logo : 'Logo' }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input name="logo" type="file" class="custom-file-input" id="inputGroupFile01"
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <img class="profile-pic" src="/images/info/{{ $infoWithImages->logo ?? '' }}"/>
                    </div>

                    <div class="border mt-4 mb-2 mr-2">
                        <label
                            class="form-control-label mt-4">Banner (og:image)</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input name="banner" type="file" class="custom-file-input" id="inputGroupFile01"
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>

                        </div>
                        <img class="profile-pic" src="/images/info/{{ $infoWithImages->banner ?? '' }}"/>
                    </div>

                    <div class="">
                        <label
                            class="form-control-label mt-4">Favicon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input name="favicon" type="file" class="custom-file-input" id="inputGroupFile01"
                                       aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <img class="profile-pic" src="/images/info/{{ $infoWithImages->favicon ?? '' }}"/>

                    </div>

                    <div class="">
                        <label class="form-control-label mt-2">Phone</label>
                        <input type="tel" class="form-control" placeholder="Tel" name="phone"
                               value="{{ old('phone', ($infoWithImages != null) ? $infoWithImages->phone : '') }}">
                    </div>
                    <div class="">
                        <label class="form-control-label  mt-2">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email"
                               value="{{ old('email', ($infoWithImages != null) ? $infoWithImages->email : '' )  }}">
                    </div>

                    <div class="">
                        <label class="form-control-label  mt-2">Facebook</label>
                        <input type="text" class="form-control" placeholder="FB" name="fb"
                               value="{{ old('fb', ($infoWithImages != null) ? $infoWithImages->fb : '') }}">
                    </div>

                    <button class="btn btn-primary mt-4" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>

    @include('admin.layouts.footer')
@endsection
