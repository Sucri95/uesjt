@extends('layouts.default')

@section('content')

<?php if (isset($_GET['id'])) {
	$parent = User::find($_GET['id']);
}?>

<hr class="separator invisible">
<hr class="separator invisible">
<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">{{$parent->name}} {{$parent->lastname}}</h3><a class="btn btn-primary btn-icon glyphicons left_arrow pull-right" href="/payments/index" ><i class="icon-search"></i>Regresar</a>		
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>
					<th class="center">Fecha</th>
					<th class="center">Mes</th>
					<th class="center">Monto</th>
					<th class="center">N&uacute;mero de Factura</th>
					<th class="center">Asunto</th>

				</tr>
			</thead>
			<tbody>
			<?php  $pay = Payments::where('id_parent', '=', $parent->id)->get(); ?>
			@foreach($pay as $payment)
				<tr>
					<td align="center">{{ $payment->pay_date }}    </td>
					<td align="center">{{ $payment->month }}       </td>
					<td align="center">{{ $payment->amount }}Bs</td>
					<td align="center">{{ $payment->bill_number }} </td>
					<td align="center">{{ $payment->comments }}    </td>
				</tr>
					@endforeach			
			</tbody>
		</table>
		<hr class="separator invisible">
		<hr class="separator invisible">	
	</div></div>
</form>
</div>
@stop
