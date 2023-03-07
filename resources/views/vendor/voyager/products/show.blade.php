@extends('voyager::master')

@section('content')
    <div class="wrapper">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $product->name }}</h1>

                @foreach ($product->images as $image)
                    @if ($image !== null)
                        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}" class="card-img">
                    @else
                        <p>No Image</p>
                    @endif
                @endforeach

                <p class="card-text">Description: {{ $product->description }}</p>
                <p class="card-text">Price: {{ $product->price }}</p>
                <p class="card-text">Category: {{ $product->category->name }}</p>

                @if ($product->category->name === 'Rims' && isset($rim))
                    <p class="card-text">Diameter: {{ $rim->diameter }}</p <p class="card-text">Width: {{ $rim->width }}
                    </p>
                    <p class="card-text">Bolt Pattern: {{ $rim->bolt_pattern }}</p>
                    <p class="card-text">Offset: {{ $rim->offset }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection

<style>
    .wrapper {
        display: flex;
        justify-content: center;
        margin-top: 50px;

    }

    .card {
        width: 35%;
        text-align: center;
    }

    .card-img {
        max-width: 100%;
        padding: 10px;
        height: auto;
    }

    .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .card-text {
        font-size: 16px;
        margin-bottom: 20px;
    }
</style>
