<h1>Thank for your order : {{$email}}</h1>
<p>This is list product you have ordered</p>
	<table>
		<thead>
			<tr>
				<td>Product name</td>
				<td>Quantity</td>
				<td>Price</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($listProduct as $product)
				<tr>
					<td>{{$product['name']}}</td>
					<td>{{$product['quantity']}}</td>
					<td>{{$product['price']}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	

