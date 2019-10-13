@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.header')

    <div class="container mt-3">

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <span class="form-control-label">Message from {{ $message->name }} on : {{ $message->created_at }} </span>
                </div>

                <div class="container">

                    <article class="articles mt-4">{{ $message->description }}</article>

                </div>


            </div>

        </div>

        <form action="{{ route("contact.destroy", [$locale, $message->id ]) }}" method="post">
            @csrf
            @method('delete')
            <button
                onclick="window.location='{{ route("contact.destroy", [$locale, $message->id ]) }}'"
                class="btn btn-primary mb-3 mr-4 pull-right">Delete
            </button>
        </form>
    </div>
    @include('admin.layouts.footer')
@endsection
