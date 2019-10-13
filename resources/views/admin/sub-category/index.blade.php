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


    <form id="subCategoryStore" action="{{ route('sub-category.store', ['locale' => $locale, 'id' => $category->id]) }}"
          method="post">
        @csrf
        <div class="container mt-3">

            <div class="col-8">
                <input value="{{ $category->id }}" name="mainCategoryId" hidden>
                <label>{{ $category->translate($locale)->name }}</label>

            </div>
            <div class="col-8 row">
                <div class="col-1">
                </div>
                <div class="col-8">
                    <label class="mt-4">{{ $attributes->translate($locale)->edit_sub_category }} : {{ $category->translate($locale)->name }}</label>

                    <input name="subCategoryen" class="form-control col-" placeholder="English">
                    <input name="subCategoryka" class="form-control mt-2" placeholder="ქართულად">

                    <button onclick="document.getElementById('subCategoryStore').submit();"
                            class="btn btn-primary mt-2" type="submit">{{ $attributes->translate($locale)->create }}
                    </button>

                </div>

            </div>


        </div>

    </form>

    <div class="container mt-3">


        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="card-title">{{ $attributes->translate($locale)->sub_categories }}</span>
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
                        @foreach($SubCategories as $SubCategory)

                            <form method="post" action="{{ route('sub-category.destroy',[  $locale, $SubCategory->id]) }}">
                                @csrf
                                {{ method_field('delete') }}
                                <tbody>
                                <tr>
                                    <td>{{ $SubCategory->id }}</td>
                                    <td>{{ $SubCategory->translate($locale)->name}}</td>
                                    <td>{{ $SubCategory->created_at}}</td>
                                    <td class="row pull-right mr-2">
                                        <a href="{{ route('sub-category.edit', [ $locale, $SubCategory->id]) }}"
                                           class="btn btn-sm btn-warning mr-1">{{ $attributes->translate($locale)->edit }}</a>
                                        <button type="submit"
                                                class="btn btn-sm btn-danger delete">{{ $attributes->translate($locale)->delete }}
                                        </button>
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
