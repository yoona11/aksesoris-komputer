@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Daftar Product</h3>
			<div>
				<a href="{{ route('admin.products.create') }}" class="btn btn-danger" style="float: right;">Add Product</a>
			</div><br><br>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th style="width: 300px;">Nama</th>
					<th scope="col">Price</th>
					<th scope="col">Image</th>
					<th scope="col">Created at</th>
					<th>Opsi</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($products as $product)
				<tr>
					<td>{{ $product['id'] }}</td>
					<td>{{ $product['name'] }}</td>
					<td>{{ $product['price'] }}</td>
					<td>{{ $product['image_url'] }}</td>
					<td>{{ $product['created_at'] }}</td>

					<td>
						<a href="{{ route('admin.products.show', $product->id) }}" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
						<a href="{{ route('admin.products.edit', $product->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
						<a href="/admin/hapus/{{ $product->id }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		</tbody>
		</table>
	</div>
</div>
</div>
</div>

<!-- Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">

@endsection