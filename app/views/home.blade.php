@extends('layouts.default')

@section('content')
<hr class="separator invisible" />
<div class="innerLR">

 <div class="row">
 <div class="col-md-12">
<form class="form-signin" role="form">
	<?php if (Auth::check()) {
		if (Auth::user()->gender == 'F') { ?>
		 <b class="form-signin-heading" style="font-family: Calibri; color: #2F0B3A; font-style: Italic; font-size: 50px;">Bienvenida, {{Auth::User()->name}}</b>
	<?php } ?>
     	<?php if (Auth::user()->gender == 'M') { ?>
		 <h2 class="form-signin-heading">Bienvenido, {{Auth::User()->name}}</h2>
	<?php } ?>
          <hr class="separator invisible" />
        <hr class="separator invisible" />
       <div class="col-md-12 center"><img src="../../../Fondo.jpg" style:"height: 90px; weight: 90px;"></div>
	<?php }else{ ?>
	 <h2  class="form-signin-heading" style="font-family: Calibri; color: #2F0B3A; font-style: Italic; font-style: Bold; font-size: 50px;">Bienvenido</h2>
	 <hr class="separator invisible" />
	 <hr class="separator invisible" />
	 <hr class="separator invisible" />

	 <div id="carousel" class="carousel slide" data-ride="carousel">
		
	<!-- Indicators -->
	<ol class="carousel-indicators invisible">
		<li data-target="#carousel" data-slide-to="0" class="active"></li>
		<li data-target="#carousel" data-slide-to="1"></li>
		<li data-target="#carousel" data-slide-to="2"></li>
		<li data-target="#carousel" data-slide-to="3"></li>
		<li data-target="#carousel" data-slide-to="4"></li>
	</ol>
	<!-- // Indicators END -->
	
	<!-- Items -->
	<div class="carousel-inner">
	
				<!-- Item -->
		<div class="item active">
			<img src="../../../front.jpg" alt="First Slide"/>
			<div class="carousel-caption">
				<p>U. E. "San Judas Tadeo"</p>
				<p>Nos encontramos ubicados en la calle Bol&iacute;var de Juan Griego, Edo. Nueva Esparta - Venezuela</p>
			</div>
		</div>
		<!-- // Item END -->
				<!-- Item -->
		<div class="item">
			<img src="../../../escudo.jpg" alt="Second Slide"/>
			<div class="carousel-caption">
				<p>Escudo hecho por nuestros estudiantes</p>
				<p>Cultivamos el amor por nuestro plantel, a trav&eacute;s de actividades recreativas</p>
			</div>
		</div>
		<!-- // Item END -->
				<!-- Item -->
		<div class="item">
			<img src="../../../cartelera.jpg" alt="Third Slide" />
			<div class="carousel-caption">
				<p>Cartelera</p>
				<p>Fomentamos la cultura de prevenci&oacute;n</p>
			</div>
		</div>
		<!-- // Item END -->
				<!-- Item -->
		<div class="item">
			<img src="../../../cancha.jpg" alt="Fourth Slide" />
			<div class="carousel-caption">
				<p>Cancha</p>
				<p>Hacer deporte es necesario, contamos con una cancha para la educaci&oacute;n f&iacute;sica</p>
			</div>
		</div>
		<!-- // Item END -->
				<!-- Item -->
		<div class="item">
			<img src="../../../al.jpg" alt="Fifth Slide" />
			<div class="carousel-caption">
				<p>Aulas de clases</p>
				<p>Contamos con 8 aulas con pupitres para la comodidad de nuestros alumnos</p>
			</div>
		</div>
		<!-- // Item END -->
				
	</div>
	<!-- // Items END -->
	
	<!-- Navigation -->
	<a class="left carousel-control" href="#carousel" data-slide="prev">
		 <span class="glyphicon glyphicon-chevron-left"></span>
  	</a>

  	<a class="right carousel-control" href="#carousel" data-slide="next">
    	 <span class="glyphicon glyphicon-chevron-right"></span>
  	</a>
	<!-- // Navigation END -->
	
</div>
	 <?php } ?>
       

      </form>
      </div>
      </div>
      </div>
@stop

