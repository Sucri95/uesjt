<?php
class AttendancesController extends BaseController
{
	public function index()
	{
		if (Auth::check()) {
		return View::make('attendances/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function viewstudent()
	{
		if (Auth::check()) {
		return View::make('/attendances/viewstudent');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function creator()
	{
		if (Auth::check()) {
			$idgrade = Input::get('idgrade');
			$inputs = Input::get();
			$students = User::where('status', '=', 'A')->where('user_level', '=', '4')->where('id_grade', '=', $idgrade)->get(); 
			foreach ($students as $student) {
				$nameinput1 = 'asistance_'.$student->id.'';
				$nameinput2 = 'inattendances_'.$student->id.'';
					$attendance = new Attendances;
					$attendance->assistance = $inputs[$nameinput1];
					$attendance->inattendances = $inputs[$nameinput2];
					$attendance->month = Input::get('month');
					$attendance->id_year = Input::get('id_year');
					$attendance->id_student = $student->id;
					$attendance->id_grade = $idgrade;
					$attendance->save();
			}
			return	Redirect::to('/attendances/index?msg='.utf8_encode("Asistencias Registradas").'&titulo='.utf8_encode('Información'));
		
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}