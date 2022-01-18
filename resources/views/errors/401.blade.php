@extends('index')
@section('contenido')
<div id="error">
		<div class="error">
			<div class="error-401">
				<h1>4<span>0</span>1</h1>
			</div>
			<h2>Se requiere autorización</h2><br>
			<h5>!Algo salió mal!</h5><br>
			<h5>La petición no ha sido ejecutada porque carece de credenciales válidas de autenticación para el recurso solicitado.</h5>
		</div>
</div>
@endsection