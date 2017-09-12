<?php
class CalificationController extends BaseController
{
	public function view()
	{
		if (Auth::check()) {
			if (Auth::user()->user_level == 2) {
				
				return View::make('califications/classcalification');
			}else{

				return	Redirect::to('/?msg='.utf8_encode("No tiene permiso para realizar esta acción").'&titulo='.utf8_encode('Información'));
			}
		}else{

			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function ajaxgrade()
	{
		if (Auth::check()) {
		return View::make('califications/ajaxgrade');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function ajaxnotes()
	{
		if (Auth::check()) {
		return View::make('califications/ajaxnotes');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function index()
	{
		if (Auth::check()) {
		return View::make('califications/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function viewnotes()
	{
		if (Auth::check()) {
		return View::make('califications/viewnotes');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function indexsubjet()
	{
		if (Auth::check()) {
		return View::make('califications/indexsubjet');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function viewstudentbygrade()
	{
		if (Auth::check()) {
		return View::make('califications/viewstudentbygrade');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function viewadmin()
	{
		if (Auth::check()) {
		return View::make('calificationsadmin/classcalification');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}
		public function indexadmin()
	{
		if (Auth::check()) {
		return View::make('calificationsadmin/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function continueval()
	{
		if (Auth::check()) {
		$calification = new Califications;
       	$calification->continue_eval = Input::get('continue_eval');
		$calification->cualitative = Input::get('cualitative');
		$calification->cuantitative = Input::get('cuantitative');
		$calification->id_grado = Input::get('id_grado');
		$calification->id_subjet = Input::get('id_subjet');
		$calification->id_student = Input::get('id_student');
		$calification->id_period = Input::get('id_period');
		$very = 0;
		$very = Califications::where('id_grado', '=', $calification->id_grado)
		->where('id_subjet', '=', $calification->id_subjet)
		->where('id_student', '=', $calification->id_student)
		->where('id_period', '=', $calification->id_period)->count();

		if ($very > 0 ) {
			return Redirect::to('/?msg='.utf8_encode("El estudiante ya fue calificado para ese periodo").'&titulo='.utf8_encode('Información'));
		}

		if ($calification->continue_eval == '' || $calification->cualitative == '' || $calification->cuantitative == '' || $calification->id_grado == '' 
		|| $calification->id_subjet == '' || $calification->id_period == '' || $calification->id_student == '' ) {

			return Redirect::to('/?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo');    
    	
    	}else{
		
		$calification->save();
		return Redirect::to('/?msg='.utf8_encode("Calificación Registrada").'&titulo='.utf8_encode('Información'));
    	
    	};		

		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function edit()
	{
		if (Auth::check()) {
		return View::make('califications/updatecalification');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function editor()
	{
		if (Auth::check()) {
		$calification = Califications::find(Input::get('id_ca'));
		$calification->continue_eval = Input::get('continue_eval');
		$calification->cualitative = Input::get('cualitative');
		$calification->cuantitative = Input::get('cuantitative');
		$calification->id_grado = Input::get('id_grado');
		$calification->id_subjet = Input::get('id_subjet');
		$calification->id_student = Input::get('id_student');
		$calification->id_period = Input::get('id_period');
		$calification->save();

			return Redirect::to('/califications/updatecalification?idsub='.$calification->id_subjet.'&idgrado='.$calification->id_grado.'&id='.$calification->id_student.'&msg='.utf8_encode("Nota Actualizada").'&titulo='.utf8_encode('Información'));
		
		}else{

			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}