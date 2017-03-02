<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Pet'shop</title>

<body>

	Petshop - Lista de clientes
	<hr>
	
	@foreach ($clientes as $e) 
	
	<a href="/clientes/{{$e->id}}"> {{$e->nome}} </a><br>
	
	@endforeach
	
	
</body>
    
    
</html>



