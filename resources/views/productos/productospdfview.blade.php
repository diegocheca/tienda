<!DOCTYPE html>
<html>
<head>
	<title>productos</title>
</head>
<body>

<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>codigo de barra</th>
			<th>descricpion</th>
		</tr>
	</thead>
	<tbody>
		@foreach($productos as $producto)
		<tr>
			<td>{{ $producto->id }}</td>
			<td>{{ $producto->codigo_barras }}</td>
			<td>{{ $producto->descripcion }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
</body>
</html>