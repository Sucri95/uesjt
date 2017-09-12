<?php
class AssigmentController extends BaseController
{
	public function viewclass()
	{
		if (Auth::check()) {
		return View::make('assigments/classevaluation');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function view()
	{
		if (Auth::check()) {
		return View::make('assigments/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function classevaluation()
	{
		if (Auth::check()) {
		$assigment = new Assigments;
		$assigment->activity = Input::get('activity');
		$assigment->objective = Input::get('objective');
		$assigment->date = Input::get('date');
		$assigment->id_grade = Input::get('id_grade');
		$assigment->id_subjet = Input::get('id_subjet');
		$assigment->id_period = Input::get('id_period');

		if ($assigment->activity == '' || $assigment->objective == '' || $assigment->date == '' || $assigment->id_grade == '' 
		|| $assigment->id_subjet == '' || $assigment->id_period == '' ) {

			return Redirect::to('/assigments/classevaluation?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo');    
    	
    	}else{
		
		$assigment->save();
		return Redirect::to('/?msg='.utf8_encode("Evaluación Registrada").'&titulo='.utf8_encode('Información'));
    	
    	};	
	
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}