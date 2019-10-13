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

    <div class="container mt-3">

        <form action="{{ route("destroyAll", $locale) }}" method="post">
            @csrf
        <button onclick="window.location='{{ route("destroyAll", $locale) }}'" class="btn btn-primary mb-3">{{ $attributes->translate($locale)->clearAllMessages }}
        </button>
        </form>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">{{ $attributes->translate($locale)->messages }}</span>
                </div>

                <div class="table-stats order-table ">
                    <table class="table">
                        <thead>
                        <tr>

                            <th>{{ $attributes->translate($locale)->name }}</th>
                            <th>{{ $attributes->translate($locale)->email }}</th>
                            <th>{{ $attributes->translate($locale)->description }}</th>
                            <th>{{ $attributes->translate($locale)->createdAt }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        @foreach($messages as $one)

                            <form method="post" action="{{ route('contact.destroy',[  $locale, $one->id]) }}">
                                @csrf
                                {{ method_field('delete') }}
                                <tbody>
                                <tr>
                                    <td>{{$one->name}}</td>
                                    <td>{{$one->email}}</td>
                                    <td>{{Str::limit(strip_tags($one->description),15,'...')}}</td>
                                    <td>{{$one->created_at}}</td>
                                    <td class="row pull-right mr-2">
                                        <a href="{{ route('contact.show', [ $locale, $one->id]) }}"
                                           class="btn btn-sm btn-primary mr-1">Read</a>
                                        <button type="submit"
                                                class="btn btn-sm btn-danger delete">Delete</button>
                                    </td>
                                </tr>
                                </tbody>
                            </form>
                        @endforeach
                    </table>
                </div>


            </div>

        </div>


    </div>




    @include('admin.layouts.footer')
@endsection
