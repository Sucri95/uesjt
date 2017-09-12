<?php
class ReportController extends BaseController
{
	public function view()
	{
		if (Auth::check()) {
		return View::make('reports/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function attendancereport()
	{
		if (Auth::check()) {
		return View::make('reports/attendancereport');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function attendancereportselect()
	{
		if (Auth::check()) {
		return View::make('reports/attendancereportselect');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function disablereport()
	{
		if (Auth::check()) {
		return View::make('reports/disablereport');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function disablereportselect()
	{
		if (Auth::check()) {
		return View::make('reports/disablereportselect');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function listreport()
	{
		if (Auth::check()) {
		return View::make('reports/listreport');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function listreportselect()
	{
		if (Auth::check()) {
		return View::make('reports/listreportselect');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

		public function evaluationreport()
	{
		if (Auth::check()) {
		return View::make('reports/evaluationreport');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function evaluationreportselect()
	{
		if (Auth::check()) {
		return View::make('reports/evaluationreportselect');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function constanciareport()
	{
		if (Auth::check()) {
		return View::make('reports/constanciareport');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function constanciareportselect()
	{
		if (Auth::check()) {
		return View::make('reports/constanciareportselect');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function boletinreport()
	{
		if (Auth::check()) {
		return View::make('reports/boletinreport');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}
	public function promedioreportselect()
	{
		if (Auth::check()) {
		return View::make('reports/promedioreportselect');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function promedioreport()
	{
		if (Auth::check()) {
		return View::make('reports/promedioreport');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function graphicreport()
	{
		if (Auth::check()) {
		return View::make('reports/graphicreport');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}
	public function ajaxperiod()
	{
		if (Auth::check()) {
		return View::make('reports/ajaxperiod');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function boletinreportselect()
	{
		if (Auth::check()) {
		return View::make('reports/boletinreportselect');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

		public function schedulesreport()
	{
		if (Auth::check()) {
		return View::make('reports/schedulesreport');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function schedulesreportselect()
	{
		if (Auth::check()) {
		return View::make('reports/schedulesreportselect');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}