<?php
class ParentController extends BaseController
{
	public function createparent()
	{
		if (Auth::check()) {
		return View::make('parents/createparent');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function creator()
	{
		
		
		if (Auth::check()) {
			$parent = new User;
			$very = User::where('ci','=',  Input::get('ci'))->count();
			if ($very > 0){
			return Redirect::to('/createparent?msg='.utf8_encode("Cédula Repetida").'&titulo='.utf8_encode('Información'));
			}else{ 
			if (Input::get('nacionalidad') == "Venezolana") {
					$parent->ci = 'V-'.Input::get('ci');
				}
				if (Input::get('nacionalidad') == "Extranjero") {
					$parent->ci = 'E-'.Input::get('ci');
			}
		}

		$parent->name = Input::get('name');
		$parent->lastname = Input::get('lastname');
		$parent->email = Input::get('email');
		$parent->username = Input::get('email');
		$parent->gender = Input::get('gender');
		$parent->age = Input::get('age');
		$parent->birthdate = Input::get('birthdate');
		$parent->phone = Input::get('phone');
		$parent->address = Input::get('address');
		$parent->status = 'A';
		$parent->user_level = 3;
		$parent->status_login = 'A';
		$parent->password = Hash::make(Input::get('password'));
		$parent->passcode = Input::get('password');
		
		$studentparents = new StudentParents;
		$studentparents->student_id = Input::get('idstudent');

		if ($parent->name == '' || $parent->lastname == '' || $parent->ci == '' || $parent->gender == '' 
		|| $parent->age == '' || $parent->birthdate == '' || $parent->email == '' || $parent->phone == '' 
		|| $parent->address == '' || $parent->password == '' || $studentparents->student_id == '') {

			return Redirect::to('/createparent?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo');    
    	
    	}else{
    	
    		$parent->save();
    		$studentparents->parent_id = $parent->id;
    		$studentparents->save();
			return Redirect::to('/?msg='.utf8_encode("Representante Registrado").'&titulo='.utf8_encode('Información'));
    	
    	};

		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function edit()
	{
		if (Auth::check()) {
		return View::make('parents/updateparent');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function index()
	{
		if (Auth::check()) {
		return View::make('parents/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function editor()
	{
		if (Auth::check()) {
		$parent = User::findOrFail(Input::get('id'));
		$parent->name = Input::get('name');
		$parent->lastname = Input::get('lastname');
		$parent->email = Input::get('email');
		$parent->age = Input::get('age');
		$parent->birthdate = Input::get('birthdate');
		$parent->phone = Input::get('phone');
		$parent->address = Input::get('address');
		$parent->password = Hash::make(Input::get('password2'));
		$parent->save();
		$studentparents = new StudentParents;
		$studentparents->student_id = Input::get('idstudent');
		$studentparents->parent_id = $parent->id;
		$studentparents->save();

		return Redirect::to('/?msg='.utf8_encode("Representante Actualizado").'&titulo='.utf8_encode('Información'));
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function delete()
	{
		if (Auth::check()) {
		$id = Request::get('id');
		$parent = User::find($id);
		$parent->status = 'D';
		$parent->save();
		
		return Redirect::to('/?msg='.utf8_encode("Representante Desactivado").'&titulo='.utf8_encode('Información'));
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}
}