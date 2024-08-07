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

                        <form action="{{ route('products.update', $item->product_code) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="row">
                                    <div class="column mb-3">
                                        <label id="product_code">ID</label>
                                        <input type="text" class="form-control @error('product_code') is-invalid @enderror"
                                            name="product_code" value="{{ old('product_code', $item->product_code) }}" required>

                                        <!-- error message untuk id -->
                                        @error('product_code')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="product_name">Name</label>
                                        <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                            name="product_name" value="{{ old('product_name', $item->product_name) }}" required>

                                        <!-- error message untuk name -->
                                        @error('product_name')
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
                                        <label id="product_description">Description</label>
                                        <input type="text"
                                            class="form-control @error('product_description') is-invalid @enderror"
                                            name="product_description" value="{{ old('product_description', $item->product_description) }}" required>

                                        <!-- error message untuk name -->
                                        @error('product_description')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="product_price">Price</label>
                                        <input type="number" class="form-control @error('product_price') is-invalid @enderror"
                                            name="product_price" value="{{ old('product_price', $item->product_price) }}" required>

                                        <!-- error message untuk name -->
                                        @error('product_price')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="column mb-3">
                                        <label id="product_photos">Photos</label>
                                        <input type="text" class="form-control @error('product_photos') is-invalid @enderror"
                                            name="product_photos" value="{{ old('product_photos', $item->product_photos) }}" required>

                                        <!-- error message untuk name -->
                                        @error('product_photos')
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
