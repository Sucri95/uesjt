<?php
class ScheduleController extends BaseController
{
	public function create()
	{
		if (Auth::check()) {
		return View::make('/schedules/createschedule');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function sortbygrade()
	{
		if (Auth::check()) {
		return View::make('/schedules/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function scheduleshow()
	{
		if (Auth::check()) {
		return View::make('/schedules/showschedule');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function creator()
	{
		if (Auth::check()) {
		$schedule = new Schedules;
		$schedule->day = Input::get('day');
		$schedule->module = Input::get('module');
		$schedule->id_grade = Input::get('id_grade');
		$schedule->id_subjet = Input::get('id_subjet');
		$schedule->status = 'A';
		$very = Schedules::where('day', '=', $schedule->day)->where('module', '=', $schedule->module)->where('id_grade', '=', $schedule->id_grade)->where('status', '=', 'A')->count();
		if ($very > 0) {
			return Redirect::to('/schedules/showschedule?idgrade='.$schedule->id_grade.'&msg='.utf8_encode("Choque de Horario").'&titulo='.utf8_encode('Información').'&cl=gritter-rojo');
		}
		if ($schedule->day == '' || $schedule->module == '' || $schedule->id_grade == '' || $schedule->id_subjet == '') {

			return Redirect::to('/schedules/showschedule?idgrade='.$schedule->id_grade.'&msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo');    
    	
    	}else{
		
		$schedule->save();
		return Redirect::to('/schedules/showschedule?idgrade='.$schedule->id_grade.'&msg='.utf8_encode("Horario Registrado").'&titulo='.utf8_encode('Información'));
    	
    	};	
		
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}
	public function deletemodule()
	{
		if (Auth::check()) {
		$schedule = Schedules::find(Request::get('id'));
		$schedule->status = 'D';
		$schedule->save();
		return Redirect::to('/schedules/showschedule?idgrade='.$schedule->id_grade.'&msg='.utf8_encode("Horario eliminado").'&titulo='.utf8_encode('Información'));
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}