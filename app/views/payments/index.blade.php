@extends('layouts.default')

@section('content')
<hr class="separator invisible">
<hr class="separator invisible">

<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">Representantes</h3><a class ="pull-right" href="/"><span class="btn btn-primary btn-icon glyphicons left_arrow pull-right"><i></i>Regresar</span></a>		
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>	
					<th data-class="expand" class="center"> Nro. C&eacute;dula</th>
					<th data-class="expand" class="center">Nombre</th>
					<th data-hide="phone,tablet" class="center">Apellido</th>
					<th class="center">Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php $parents = User::where('status', '=', 'A')->where('user_level', '=', '3')->get(); ?>
			@foreach($parents as $parent)
				<tr>
					<td align="center">{{ $parent->ci}} </td>
					<td align="center">{{ $parent->name}} </td>
					<td align="center">{{ $parent->lastname}} </td>
					<td align="center">
					<a class="btn btn-default btn-icon" href="/payments/viewpayment?id={{$parent->id}}"><i class="icon-search"></i> Ver Pagos</a>
					</td>
				</tr>
					@endforeach			
			</tbody>
		</table>		
	</div>
</div>
</form>
</div>
@stop
