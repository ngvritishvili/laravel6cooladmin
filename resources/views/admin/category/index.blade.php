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

        <button onclick="window.location='{{ route("category.create", $locale) }}'" class="btn btn-primary mb-3">{{ $attributes->translate($locale)->create_category }}
        </button>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">{{ $attributes->translate($locale)->categories }}</span>
                </div>

                <div class="table-stats order-table ">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ $attributes->translate($locale)->name }}</th>
                            <th>{{ $attributes->translate($locale)->createdAt }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        @foreach($categories as $category)

                            <form method="post" action="{{ route('category.destroy',[  $locale, $category->id]) }}">
                                @csrf
                                {{ method_field('delete') }}
                            <tbody>
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{$category->translate($locale)->name}}</td>
                                <td>{{$category->created_at}}</td>
                                <td class="row pull-right mr-2">
                                    <a href="{{ route('sub-category.index', [ 'locale' => $locale, 'id' => $category->id ] ) }}"
                                       class="btn btn-sm btn-secondary mr-1">{{ $attributes->translate($locale)->sub_category }}</a>
                                    <a href="{{ route('category.edit', [ $locale, $category->id]) }}"
                                       class="btn btn-sm btn-warning mr-1">{{ $attributes->translate($locale)->edit }}</a>
                                    <button type="submit"
                                       class="btn btn-sm btn-danger delete">{{ $attributes->translate($locale)->delete }}</button>
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
