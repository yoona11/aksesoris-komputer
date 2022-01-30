@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">	
<div class="mt-4 container col-md-8">
	<div class="row mt-4">
		<div class="col-md-4 offset-md-8">
			<div class="form-group">
				<select id="order_field" class="form-control">
					<option value="" disabled selected>Urutkan</option>
					<option value="best_seller">Best Seller</option>
					<option value="terbaik">Terbaik (Berdasarkan Rating)</option>
					<option value="termurah">Termahal</option>
					<option value="termahal">Termurah</option>
					<option value="terbaru">Terbaru</option>
				</select>
			</div>
		</div>
	</div>
	<div id="product-list">
		@foreach($products as $idx => $product)

			@if ($idx == 0 || $idx % 4 == 0)
				<div class="row mt-4">
			@endif

			<div class="col">
				<div class="card">
					<img src="{{ url('storage/img/'.$product->image_url) }}" class="img-thumbnail" >
					<div class="card-body">
						
						<h5 class="card-title">
							<a href="{{ route('products.show', ['id' => $product->id]) }}" style="text-decoration: none;">
								{{ $product->name }}
							</a>
						</h5>
						<p class="card-text">
							Rp. {{ $product->price }}
						</p>
						<a href="{{ route('carts.add', ['id' => $product->id]) }}" class="btn btn-primary">Beli Sekarang</a>
					</div>
				</div>
			</div>

			@if ($idx > 0 && $idx % 4 == 3)
				</div>
			@endif
		@endforeach
	</div>
</div>

<!-- Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
		$('#order_field').change(function(){
			// window.location.href = '/products?order_by=' + $(this).val();
			$.ajax({
				type: 'GET',
				url: '/products',
				data: {
					order_by: $(this).val(),
				},
				dataType:'json',
				success: function(data) {
					var products = '';
					$.each(data, function(idx, product) {
						if(idx == 0 || idx % 4 == 0) {
							products += '<div class="row mt-4">';
						}

						products +=
							'<div class="col">' +
								'<div class="card">' +
								  '<img src="/storage/img/' + product.image_url + '" class="img-thumbnail" alt="...">' +
								   '<div class="card-body">' +
								     '<h5 class="card-title text-center">' +
								       '<a href="/products/' + product.id + '" style="text-decoration: none">' +
								         product.name +
								        '</a>' +
								     '</h5>' +
								     '<p class="card-text text-center">' +
								     	product.price +
								     '</p>' +
								     '<a href="/carts/add/' + product.id + '"class="btn btn-primary d-grid gap-2">Beli</a>' +
								    '</div>' +
								'</div>' +
							'</div>';

						if(idx > 0 && idx % 4 == 3) {
							products += '</div>';
						}
					});

					//update element
					$('#product-list').html(products);
				},
				error: function(data) {
					alert('Unable to handle request');
				}
			});
		});
	});
</script>
@endsection