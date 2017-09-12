<?php
class StudentController extends BaseController
{
	public function createstudent()
	{
		if (Auth::check()) {
		return View::make('students/create');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function creator()
	{
		if (Auth::check()) {
		$student = new User;
		$very = User::where('ci','=',  Input::get('ci'))->count();
			if ($very > 0){
			return Redirect::to('/createstudent?msg='.utf8_encode("Cédula Repetida").'&titulo='.utf8_encode('Información'));
			}else{ 
				if (Input::get('nacionalidad') == "V-") {
					$student->ci = 'V-'.Input::get('ci');
				}
				if (Input::get('nacionalidad') == "E-") {
					$student->ci = 'E-'.Input::get('ci');
				}
			
		}
		$student->name = Input::get('name');
		$student->lastname = Input::get('lastname');
		$student->gender = Input::get('gender');
		$student->age = Input::get('age');
		$student->birthdate = Input::get('birthdate');
		$student->er_number = Input::get('er_number');
		$student->allergies = Input::get('allergies');
		$student->medicines = Input::get('medicines');
		$student->back_medical = Input::get('back_medical');
		$student->address = Input::get('address');
		$student->id_grade = Input::get('id_grade');
		$student->status = 'A';
		$student->user_level = 4;
		$student->status_login = 'D';
		
		if ($student->name == '' || $student->lastname == '' || $student->ci == '' || $student->gender == '' 
		|| $student->age == '' || $student->birthdate == '' || $student->er_number == '' || $student->allergies == '' || $student->medicines == ''
		|| $student->back_medical == '' || $student->address == '' || $student->id_grade == '') {

			return Redirect::to('/createstudent?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo');    
    	
    	}else{
    	
    	list($desechar,$extension) = explode('.',Input::file('document')->getClientOriginalName());
  		Input::file('document')->move($_SERVER["DOCUMENT_ROOT"]."/assets/images/fotoscarnet/",($student->name.''.$student->lastname.''.$student->id_grade.'.'.$extension));
  		$student->document = "../../../assets/images/fotoscarnet/".($student->name."".$student->lastname."".$student->id_grade).".".$extension;
       	$student->save();

		return Redirect::to('/?msg='.utf8_encode("Estudiante Registrado").'&titulo='.utf8_encode('Información'));
    	};
		
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function edit()
	{
		if (Auth::check()) {
		return View::make('students/updatestudent');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function medical()
	{
		if (Auth::check()) {
		return View::make('students/medical');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function editor()
	{
		if (Auth::check()) {
		
		$student = User::findOrFail(Input::get('id'));
		$student->name = Input::get('name');
		$student->lastname = Input::get('lastname');
		$student->ci = Input::get('ci');
		$student->gender = Input::get('gender');
		$student->age = Input::get('age');
		$student->birthdate = Input::get('birthdate');
		$student->er_number = Input::get('er_number');
		$student->allergies = Input::get('allergies');
		$student->medicines = Input::get('medicines');
		$student->back_medical = Input::get('back_medical');
		$student->address = Input::get('address');
		$student->id_grade = Input::get('id_grade');
		if(Input::file('logo_modif') != null)
  		{
  			list($desechar,$extension) = explode('.',Input::file('logo_modif')->getClientOriginalName());
  			Input::file('logo_modif')->move($_SERVER["DOCUMENT_ROOT"]."/assets/images/fotoscarnet/",($student->name.''.$student->lastname.''.$student->id_grade.'.'.$extension));
  			$student->document = "../../../assets/images/fotoscarnet/".($student->name."".$student->lastname."".$student->id_grade).".".$extension;
  		}
		$student->save();

		return Redirect::to('/?msg='.utf8_encode("Estudiante Actualizado").'&titulo='.utf8_encode('Información'));
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function delete()
	{
		if (Auth::check()) {
		$id = Request::get('id');
		$student = User::find($id);
		$student->status = 'D';
		$student->save();
		
		return Redirect::to('/?msg='.utf8_encode("Estudiante Desactivado").'&titulo='.utf8_encode('Información'));
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}