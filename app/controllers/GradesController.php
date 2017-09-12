<?php
class GradesController extends BaseController
{
	public function index()
	{
		if (Auth::check()) {
		return View::make('grades/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function viewstudentbygrade()
	{
		if (Auth::check()) {
		return View::make('grades/viewstudentbygrade');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}