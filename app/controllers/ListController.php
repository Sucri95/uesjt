<?php
class ListController extends BaseController
{
	public function createlist()
	{
		if (Auth::check()) {
		return View::make('lists/createlist');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function create()
	{
		if (Auth::check()) {
		return View::make('list/createlist');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function creator()
	{
		if (Auth::check()) {
		$list = new Lists;
		$list->list_name = Input::get('list_name');
		$list->quantity = Input::get('quantity');

		if ($list->list_name == '' || $list->quantity == '' ) {

			return Redirect::to('/createlist?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo');    
    	
    	}else{
		
		$list->save();
		return Redirect::to('/?msg='.utf8_encode("Útil Registrado").'&titulo='.utf8_encode('Información'));
    	
    	};		
		
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}