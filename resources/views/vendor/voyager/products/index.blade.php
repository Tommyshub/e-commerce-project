@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-basket"></i> Products
    </h1>
    <a href="{{ route('voyager.products.create') }}" class="btn btn-success">
        <i class="voyager-plus"></i> <span>Add New</span>
    </a>
    <button id="bulk_delete" class="btn btn-danger"><i class="voyager-trash"></i> <span>Bulk Delete</span></button>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="panel panel-bordered">
            <div class="panel-body">
                <form method="get" class="form-search">
                    <div id="search-input">
                        <input type="text" class="form-control" name="s" placeholder="Search" value="">
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" class="select_all">
                                <input type="hidden" class="selected_ids" name="selected_ids">
                            </th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($products) && !empty($products))
                            @foreach ($products as $product)
                                <tr>
                                    <td><input type="checkbox" class="product_checkbox" value="{{ $product->id }}"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        @foreach ($product->images as $image)
                                            @if ($image !== null)
                                                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}"
                                                    style="width:50px">
                                            @else
                                                <p>No Image</p>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('voyager.products.show', $product->id) }}"
                                            class="btn btn-sm btn-warning view">
                                            View
                                        </a>
                                        <a href="{{ route('voyager.products.edit', $product->id) }}"
                                            class="btn btn-sm btn-primary edit">
                                            Edit
                                        </a>
                                        <form action="{{ route('voyager.products.destroy', $product->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">No products found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
