<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create New User - Tutorial CRUD Laravel 11 @ qadrlabs.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                <h4>Edit Product</h4>

                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <form action="{{ route('products.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="row">
                                    <div class="column mb-3">
                                        <label id="id">ID</label>
                                        <input type="text" class="form-control @error('id') is-invalid @enderror"
                                            name="id" value="{{ old('id', $item->id) }}" required>

                                        <!-- error message untuk id -->
                                        @error('id')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name', $item->name) }}" required>

                                        <!-- error message untuk name -->
                                        @error('name')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="available_status">Status</label>
                                        <select class="form-control @error('available_status') is-invalid @enderror"
                                            name="available_status" value="{{ old('available_status', $item->available_status) }}" required>
                                            <option value="AVAILABLE">Available</option>
                                            <option value="UNAVAILABLE">Unavailable</option>
                                        </select>

                                        <!-- error message untuk name -->
                                        @error('available_status')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="description">Description</label>
                                        <input type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description', $item->description) }}" required>

                                        <!-- error message untuk name -->
                                        @error('description')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="price">Price</label>
                                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                                            name="price" value="{{ old('price', $item->price) }}" required>

                                        <!-- error message untuk name -->
                                        @error('price')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="photos">Photos</label>
                                        <input type="text" class="form-control @error('photos') is-invalid @enderror"
                                            name="photos" value="{{ old('photos', $item->photos) }}" required>

                                        <!-- error message untuk name -->
                                        @error('photos')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="barcode">Barcode</label>
                                        <input type="text"
                                            class="form-control @error('barcode') is-invalid @enderror" name="barcode"
                                            value="{{ old('barcode', $item->barcode) }}" required>

                                        <!-- error message untuk name -->
                                        @error('barcode')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="max_stock">Max Stock</label>
                                        <input type="number"
                                            class="form-control @error('max_stock') is-invalid @enderror"
                                            name="max_stock" value="{{ old('max_stock', $item->max_stock) }}" required>

                                        <!-- error message untuk name -->
                                        @error('max_stock')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="max_count">Max Count</label>
                                        <input type="number"
                                            class="form-control @error('max_count') is-invalid @enderror"
                                            name="max_count" value="{{ old('max_count', $item->max_count) }}" required>

                                        <!-- error message untuk name -->
                                        @error('max_count')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- <div class="column mb-3">
                                        <label id="subcategory_id">Division</label>
                                        <select class="form-control @error('subcategory_id') is-invalid @enderror"
                                            name="subcategory_id" value="{{ old('subcategory_id', $item->subcategory_id) }}" required>
                                            <option value=""> -- Select One --</option>
                                            @foreach ($item as $value)
                                                <option value="{{ $value->subcategory_id }}">
                                                    {{ $value->subcategory_id }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <!-- error message untuk name -->
                                        @error('subcategory_id')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('products.index') }}" class="btn btn-md btn-secondary">Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
