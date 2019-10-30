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

        <button onclick="window.location='{{ route("product.create", $locale) }}'"
                class="btn btn-primary mb-3">{{ $attributes->translate($locale)->create_product }}
        </button>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">{{ $attributes->translate($locale)->products }}</span>
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
                        @foreach($products as $product)

                            <form method="post" action="{{ route('product.destroy',[  $locale, $product->id]) }}">
                                @csrf
                                {{ method_field('delete') }}

                                <tbody>
                                <tr>

                                    <td>{{$product->id }}</td>
                                    <td>{{$product->translate($locale)->name}}</td>
                                    <td>{{$product->created_at}}</td>
                                    <td class="row pull-right mr-2">
                                        {{Form::open(['method' => 'post', 'route' => ['product.update',  $locale, $product->id] ])}}
                                        @csrf
                                        @method('patch')
                                        <button type="submit" value="{{ $product->id }}" name="favorite"
                                                class="mr-4"><span style='font-size:17px; font-weight: bold; color: {{ ($product->favorite == 1) ? '#d1d102' : '#1c1c0c' }} ; cursor: pointer'>&#9733;</span></button>
                                        {{ Form::close()  }}

                                    </td>
                                    <td class="row pull-right mr-2">

                                        {{Form::open(['method' => 'delete', 'route' => ['product.destroy',  $locale, $product->id] ])}}
                                        <button type="submit"
                                                class="btn btn-sm btn-danger delete mr-1">{{ $attributes->translate($locale)->delete }}
                                        </button>
                                        {{ Form::close()  }}
                                    </td>

                                    <td class="row pull-right mr-2">


                                        <a href="{{ route('product.edit', [ $locale, $product->id]) }}"
                                           class="btn btn-sm btn-warning mr-1">{{ $attributes->translate($locale)->edit }}</a>




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
