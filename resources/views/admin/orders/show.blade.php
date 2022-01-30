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
           
        </style>
    </head>
    <body>
		<div class="container"><br><br>
			<h2 style="text-align: center;" class="text-success"><b><i class="fas fa-map-marked-alt"></i> Detail Alamat</b></h2><br><br>
			<table class="table caption-top">
				<thead>
					<tr>
						<th scope="col" class="text-info">Alamat Pengiriman</th>
						<th scope="col" class="text-info">Kode Pos</th>
						<th scope="col" class="text-info">Harga Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row" class="text-danger">{{ $order->shipping_address }}</th>
						<td class="text-danger">{{ $order->zip_code }}</td>
						<td class="text-danger">{{ $order->total_price }}</td>
					</tr>
				</tbody>
			</table>
			<br><br><br><br>

			
			<h2 style="text-align: center;" class="text-success"><b><i class="fas fa-shopping-cart"></i> Detail Produk</b></h2><br><br>
			
			<div class="row justify-content-center">
				<div class="col">
					<table id="cart" class="table table-hover table-condensed">
						<thead>
							<tr>
								<th style="width: 50%" class="text-info">Product</th>
								<th style="width: 10%" class="text-info">Price</th>
								<th style="width: 8%" class="text-info">Quantity</th>
								<th style="width: 22%" class="text-center text-info">Subtotal</th>
							</tr>
						</thead>
						<tbody>

							@foreach($order->orderItems as $orderItem)
							<tr>
								<td data-th="Product">
									<div class="row">
										<div class="col-sm-3 hidden-xs">
											<!-- <img src="{{ route('products.image', ['imageName' => $orderItem->product->image_url]) }}" width="100" height="100" class="img-responsive"> -->
											<img src="{{ url('storage/img/'.$orderItem->product['image_url']) }}" width="200" height="200" class="img-responsive">
										</div>
										<div class="col-sm-9">
											<a href="{{ route('products.show', ['id' => $orderItem->product->id]) }}" style="text-decoration: none">
												<h4 class="nomargin"><b>{{ $orderItem->product->name }}</b></h4>
											</a>
										</div>
									</div>
								</td>
								<td data-th="Price" class="text-primary">
									<b>{{ $orderItem->price }}</b>
								</td>
								<td data-th="Quantity" class="text-primary">
									<b>{{ $orderItem->quantity }}</b>
								</td>
								<td data-th="Subtotal" class="text-center text-danger">
									<b>{{ $orderItem->price * $orderItem->quantity }}</b>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Style -->
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
		<script src="{{url('plugins/tinymce/jquery.tinymce.min.js')}}"></script>
		<script src="{{url('plugins/tinymce/tinymce.min.js')}}"></script>
		<script>tinymce.init({ selector:'#ckview' });</script>

		<!-- Vanila-tilt-js -->
      <script type="text/javascript" src="{{ asset('tilt/vanilla-tilt.min.js') }}" ></script>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>
@endsection