@extends('layouts.app')

@section('content')
<!DOCTYPE html>
    <html>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


        <style>

            h1 {
                font-size:30px;
                font-weight:bold;
                border:5px #fff solid;
                display:inline-block;
                padding:5px 20px
            }
        </style>
    </head>
    <body>
		<div class="container">
			<table  id="cart" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width: 50%; font-size: 24px" class="text-info">Product</th>
						<th style="width: 10%; font-size: 24px" class="text-info">Price</th>
						<th style="width: 8%; font-size: 24px" class="text-info">Quantity</th>
						<th style="width: 22%; font-size: 24px" class="text-center text-danger">Subtotal</th>
						<th style="width: 10%; font-size: 24px"></th>
					</tr>
				</thead>
				<tbody>
					
					<?php $total = 0 ?>

					@if(session('cart'))
					@foreach(session('cart') as $id =>$product)

					<?php $total += $product['price'] * $product['quantity'] ?>

					<tr>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-3 hidden-xs" data-tilt>
									<!-- <img src="{{ route('products.image', ['imageName' => $product['image_url']]) }}" width="100" height="100" class="img-responsive"> -->
									<img src="{{ url('storage/img/'.$product['image_url']) }}" width="100" height="100" class="img-responsive" style="border-radius: 60px">
								</div>
								<div class="col-sm-9">
									<h4 class="nomargin text-primary"><b>{{ $product['name'] }}</b></h4>
								</div>
							</div>
						</td>
						<td data-th="Price" class="text-primary"><b>Rp. {{ $product['price'] }}</b></td>
						<td data-th="Quantity">
							<input type="number" value="{{ $product['quantity'] }}" class="form-control quantity" />
						</td>
						<td data-th="Subtotal" class="text-center text-danger"><b>Rp. {{ $product['price'] * $product['quantity'] }}</b></td>
						<td class="actions" data-th="">
							<button class="btn btn-warning btn-sm update-cart" data-id="{{ $id }}">Update</button>
							<button class="btn btn-danger btn-sm mt-2 remove-from-cart" data-id="{{ $id }}">Remove</button>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
				<tfoot>
					
					<tr>
						<td>
							<a href="{{ url('/products') }}" class="btn btn-warning"><i class="fas fa-arrow-circle-left"></i> Lanjutkan Belanja</a>
							<a href="{{ route('admin.orders.create') }}" class="btn btn-primary">Lanjut Ke Pembayaran <i class="fas fa-arrow-circle-right"></i></a>
						</td>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center"><strong><h4><span class="badge bg-info text-danger">Total Rp. {{ $total }}</span></h4></strong></td>
					</tr>
				</tfoot>
			</table>
		</div>


		<!-- Jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".update-cart").click(function (e) {
					e.preventDefault();
					console.log('aaa');
					var ele = $(this);

					$.ajax({
						url: '{{ route('carts.update') }}',
						method: "patch",
						data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
						success: function (response) {
							window.location.reload();
						}
					});
				});

				$(".remove-from-cart").click(function (e) {
					e.preventDefault();

					var ele = $(this);

					if(confirm("Are you sure")) {
						$.ajax({
							url: '{{ route('carts.remove') }}',
							method: "DELETE",
							data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
							success: function (response) {
							window.location.reload();
							}
						});
					}
				});
			});
		</script>

		<!-- Vanila-tilt-js -->
      <script type="text/javascript" src="{{ asset('tilt/vanilla-tilt.min.js') }}" ></script>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>
@endsection