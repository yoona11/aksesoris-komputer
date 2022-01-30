@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Edit Products</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link rel="stylesheet" href="{{ URL::asset('css/main.css'); }}">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Edit Product</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-row">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                        </div>
                        <div class="form-row">
                            <div class="name">Nama Product</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="name" value="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Harga</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="number" name="price" value="{{ $product->price }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="name">Upload Gambar</div>
                            <div class="value">
                                <div><span>{{ $product->image_url }}</span></div><br>
                                <div class="input-group js-input-file">
                                    <input type="file" name="image_url" class="form-control" value="{{$product->image_url}}">
                                </div>
                                <div class="label--desc">Upload your Image Product. Max file size 50 MB</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Deskripsi</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="description" placeholder="Description Products" value="{{ $product->description }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
@endsection