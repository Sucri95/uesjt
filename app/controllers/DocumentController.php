<?php
class DocumentController extends BaseController
{
	public function create()
	{
		if (Auth::check()) {
		return View::make('notifications/document');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function view()
	{
		if (Auth::check()) {
		return View::make('notifications/edits');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function creator()
	{
		if (Auth::check()) {
		$docs = new Documen;
		$docs->id_user = Input::get('id_user');
		$user = User::find($docs->id_user);
		$co = Documen::count();
  		$co = $co + 1;
		list($desechar,$extension) = explode('.',Input::file('document')->getClientOriginalName());
  		Input::file('document')->move($_SERVER["DOCUMENT_ROOT"]."/assets/images/document/",($user->name.''.$user->lastname.''.$user->ci.''.$co.'.'.$extension));
  		$docs->doc = "../../../assets/images/document/".($user->name."".$user->lastname."".$user->ci."".$co).".".$extension;

  		if ($docs->id_user == '' || $docs->doc == '') {
  			
			return Redirect::to('/notifications/document?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo');  
  		}
		$docs->save();
		return Redirect::to('/?msg='.utf8_encode("Documento Registrado").'&titulo='.utf8_encode('Información'));
		
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function delete()
	{
		if (Auth::check()) {
		$id = Request::get('id');
		$doc = Documen::find($id);
		$parent = $doc->id_user;
		$doc->delete();
		
		return Redirect::to('/notifications/edits?id='.$parent.'&msg='.utf8_encode("Documento Eliminado").'&titulo='.utf8_encode('Información'));
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}