@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-edit"></i> Edit Product
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="panel panel-bordered">
            <form style="padding: 5px 15px 5px 15px;" action="{{ route('products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" value="{{ $product->description }}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" id="price" value="{{ $product->price }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <div id="preview-image">
                        <img src="{{ Voyager::image($product->image) }}" alt="Preview Image">
                    </div>
                    <input type="file" name="image" id="image" class="form-control-image">
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required onchange="setType(this)">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style="display:none;">
                    <input type="hidden" name="type" value="">
                </div>

                <div class="form-group" id="rim-specific-fields" style="display:none;">
                    <label for="diameter">Diameter:</label>
                    <input type="text" name="diameter" id="diameter" value="{{ $rim->diameter }}" class="form-control">

                    <label for="width">Width:</label>
                    <input type="text" name="width" id="width" value="{{ $rim->width }}" class="form-control">

                    <label for="bolt_pattern">Bolt Pattern:</label>
                    <input type="text" name="bolt_pattern" id="bolt_pattern" value="{{ $rim->bolt_pattern }}"
                        class="form-control">

                    <label for="offset">Offset:</label>
                    <input type="text" name="offset" id="offset" value="{{ $rim->offset }}" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

<script>
    let input = document.getElementById("image");
    let preview = document.getElementById("preview-image");
    input.addEventListener("change", function() {
        let reader = new FileReader();
        reader.onload = function() {
            preview.innerHTML = '<img src="' + reader.result + '" alt="Preview Image">';
        };
        reader.readAsDataURL(this.files[0]);
    });

    window.onload = function() {
        let selectedOptionValue = document.getElementById("category_id").value;
        let selectedOption = @json($categories).find(
            (category) => category.id === parseInt(selectedOptionValue)
        );

        document.querySelector('input[name="type"]').value = selectedOption.name;

        if (selectedOption.name === 'Rims') {
            document.querySelector('#rim-specific-fields').style.display = 'block';
        } else {
            document.querySelector('#rim-specific-fields').style.display = 'none';
        }
    }
</script>
