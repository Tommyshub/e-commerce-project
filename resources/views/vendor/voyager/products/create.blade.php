@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus"></i> Add New Product
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="panel">
            <form style="padding: 5px 15px 5px 15px;" action="{{ route('voyager.products.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf


                <div class="form-group" class="py-20">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control-image" id="thumbnail" name="thumbnail">
                </div>

                <div class="form-group">
                    <label for="images">Images</label>
                    <input type="file" class="form-control-image" id="images" name="images[]" multiple>
                </div>

                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required onchange="setType(this)">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" style="display:none;">
                    <input type="hidden" name="type" value="">
                </div>

                <div class="form-group" id="rim-specific-fields" style="display:none;">
                    <label for="diameter">Diameter:</label>
                    <input type="text" name="diameter" id="diameter" value="" class="form-control">

                    <label for="width">Width:</label>
                    <input type="text" name="width" id="width" value="" class="form-control">

                    <label for="bolt_pattern">Bolt Pattern:</label>
                    <input type="text" name="bolt_pattern" id="bolt_pattern" value="" class="form-control">

                    <label for="offset">Offset:</label>
                    <input type="text" name="offset" id="offset" value="" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection

<script>
    function setType(element) {
        let categories = @json($categories);
        let selectedOption = categories.find(
            (category) => category.id === parseInt(element.value)
        );
        document.querySelector('input[name="type"]').value = selectedOption.name;

        if (selectedOption.name === 'Rims') {
            document.querySelector('#rim-specific-fields').style.display = 'block';
        } else {
            document.querySelector('#rim-specific-fields').style.display = 'none';
        }
    }
</script>
