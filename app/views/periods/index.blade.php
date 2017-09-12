@extends('layouts.default')

@section('content')
<hr class="separator invisible">
<hr class="separator invisible">

<div class="innerLR">
		<form enctype="application/x-www-form-urlencoded" method="post">
		<div class="widget widget-heading-simple widget-body-white">
		<h2 class="pull-left"></h2>
		<div class="widget-body">
		<h3 class="pull-left">Lapsos Acad&eacute;micos</h3>		
		<hr class="separator invisible">
		<hr class="separator invisible">
		<table class="dynamicTable colVis table">
			<thead>
				<tr>
					<th class="center">A&ntilde;o Escolar</th>
					<th class="center">Nombre</th>
					<th class="center">Fecha Inicial</th>
					<th class="center">Fecha Final</th>
				</tr>
			</thead>
			<tbody>
			<?php $periods = Periods::where('status','=', 'A')->get(); ?>
			@foreach($periods as $p)
				<tr>
					<?php $year = Year::find($p->id_year);?>
					<td align="center">{{ $year->name }}</td>
					<td align="center">{{ $p->period_name }}</td>
					<td align="center">{{ $p->fromdate }} </td>
					<td align="center">{{ $p->todate }} </td>
				</tr>
					@endforeach	

			</tbody>
		</table>		
	</div></div>
</form>
</div>
@stop
