<?php
class TeacherController extends BaseController
{

	public function login(){

		$userdata = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			 );

		if(Auth::attempt($userdata)){
			if (Auth::user()->user_level == 3) {
				$anio = date('Y');
				$dia = date('d');
				$mes = date('m');

				$month[0] = '';
				$month[1] = 'Enero';
				$month[2] = 'Febrero';
				$month[3] = 'Marzo';
				$month[4] = 'Abril';
				$month[5] = 'Mayo';
				$month[6] = 'Junio';
				$month[7] = 'Julio';
				$month[8] = 'Agosto';
				$month[9] = 'Septiembre';
				$month[10] = 'Octubre';
				$month[11] = 'Noviembre';
				$month[12] = 'Diciembre';

				$co = Payments::where('id_parent', '=', Auth::user()->id)->where('month', '=', $month[$mes])->count();
				
				if ($co > 0 ) {
				 	return	Redirect::to('/?msg='.utf8_encode("Bienvenido, ud está al día con el pago de matrículas").'&titulo='.utf8_encode('Información').'&cl=gritter-verde');		
				 }else{
				 	if (intval($dia) >= 5 && intval($dia) <= 10) {
				 		return	Redirect::to('/?msg='.utf8_encode("Ud. posee un retraso en el pago de matrículas, por favor dirígase al plantel para cancelar su deuda").'&titulo='.utf8_encode('Información').'&cl=gritter-amarillo');	
				 	}
				 	if (intval($dia) > 10) {
				 		return	Redirect::to('/?msg='.utf8_encode("Ud. posee un retraso de más de 10 días en el pago de matrículas, por favor dirígase al plantel para cancelar su deuda").'&titulo='.utf8_encode('Información').'&cl=gritter-rojo');
				 	}
				 		$mes = $mes - 1;
				 		$co1 = Payments::where('id_parent', '=', Auth::user()->id)->where('month', '=', $month[$mes])->count();
				 		if ($co1 > 0) {
				 			return	Redirect::to('/?msg='.utf8_encode("Bienvenido").'&titulo='.utf8_encode('Información'));	
				 		}else{
				 			return	Redirect::to('/?msg='.utf8_encode("Ud. posee un retraso de más de 30 días en el pago de matrículas, por favor dirígase al plantel para cancelar su deuda").'&titulo='.utf8_encode('Información').'&cl=gritter-rojo');
				 
				 		}
				 		return	Redirect::to('/?msg='.utf8_encode("Bienvenido").'&titulo='.utf8_encode('Información'));		
				 } 
			}else{

		return	Redirect::to('/?msg='.utf8_encode("Bienvenido").'&titulo='.utf8_encode('Información'));		
			}
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Información Suministrada Incorrecta").'&titulo='.utf8_encode('Alerta'));
		}
	}

	public function logout()
    {
        Auth::logout();
        return Redirect::to('/')->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }

	public function createteacher()
	{
		if (Auth::check()) {		
			return View::make('teachers/createteacher');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function creator()
	{
			if (Auth::check()) {
				
			$teacher = new User;
			$very = User::where('ci','=',  Input::get('ci'))->count();
			if ($very > 0){
			return Redirect::to('/createteacher?msg='.utf8_encode("Cédula Repetida").'&titulo='.utf8_encode('Información'));
			}else{ 
				if (Input::get('nacionalidad') == "Venezolana") {
					$teacher->ci = 'V-'.Input::get('ci');
				}
				if (Input::get('nacionalidad') == "Extranjero") {
					$teacher->ci = 'E-'.Input::get('ci');
				}
		}
		
		$teacher->name = Input::get('name');
		$teacher->lastname = Input::get('lastname');
		$teacher->email = Input::get('email');
		$teacher->username = Input::get('email');
		$teacher->gender = Input::get('gender');
		$teacher->age = Input::get('age');
		$teacher->birthdate = Input::get('birthdate');
		$teacher->phone = Input::get('phone');
		$teacher->address = Input::get('address');
		$teacher->type = Input::get('type');
		$teacher->degree = Input::get('degree');
		$teacher->admission_date = Input::get('admission_date');
		$teacher->years_service = Input::get('years_service');
		if ($teacher->type == 'C') {
			$teacher->id_grade = Input::get('id_grade');
		}elseif ($teacher->type == 'S') {
			$teacher->sub_id = Input::get('sub_id');
		}
		$teacher->status = 'A';
		$teacher->user_level = 2;
		$teacher->password = Hash::make(Input::get('password'));
		$teacher->passcode = Input::get('password');
		$teacher->status_login = 'A';

		if ($teacher->name == '' || $teacher->lastname == '' || $teacher->ci == '' || $teacher->gender == '' 
		|| $teacher->age == '' || $teacher->birthdate == '' || $teacher->email == '' || $teacher->phone == '' || $teacher->type == ''
		|| $teacher->degree == '' || $teacher->address == '' || $teacher->admission_date == '' || $teacher->years_service == '' || $teacher->password == '') {

			return Redirect::to('/createteacher?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo');    
    	
    	}else{
    	
    		$teacher->save();
			return Redirect::to('/?msg='.utf8_encode("Docente Registrado").'&titulo='.utf8_encode('Información'));
    	
    	};	
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function edit()
	{
		if (Auth::check()) {
			return View::make('teachers/updateteacher');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function editor()
	{
		if (Auth::check()) {
		$teacher = User::findOrFail(Input::get('id'));
		$teacher->name = Input::get('name');
		$teacher->lastname = Input::get('lastname');
		$teacher->email = Input::get('email');
		$teacher->username = Input::get('email');
		$teacher->age = Input::get('age');
		$teacher->birthdate = Input::get('birthdate');
		$teacher->phone = Input::get('phone');
		$teacher->address = Input::get('address');
		$teacher->type = Input::get('type');
		$teacher->degree = Input::get('degree');
		$teacher->admission_date = Input::get('admission_date');
		$teacher->years_service = Input::get('years_service');
		$teacher->password = Hash::make(Input::get('password2'));
		if ($teacher->type == 'C') {
			$teacher->id_grade = Input::get('id_grade');
			$teacher->sub_id = null;
		}elseif ($teacher->type == 'S') {
			$teacher->sub_id = Input::get('sub_id');
			$teacher->id_grade = null;
		}
		$teacher->save();

		return Redirect::to('/?msg='.utf8_encode("Docente Actualizado").'&titulo='.utf8_encode('Información'));
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

		public function index()
	{
		if (Auth::check()) {
		return View::make('teachers/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function delete()
	{
		if (Auth::check()) {
		$id = Request::get('id');
		$teacher = User::find($id);
		$teacher->status = 'D';
		$teacher->save();
		
		return Redirect::to('/?msg='.utf8_encode("Docente Desactivado").'&titulo='.utf8_encode('Información'));
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}