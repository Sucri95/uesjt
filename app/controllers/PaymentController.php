<?php
class PaymentController extends BaseController
{
	public function createpayment()
	{
		if (Auth::check()) {
		return View::make('payments/createpayment');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function index()
	{
		if (Auth::check()) {
		return View::make('payments/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function creator()
	{
		if (Auth::check()) {
		$payment = new Payments;
		$payment->month = Input::get('month');
		$payment->pay_mode = Input::get('pay_mode');
		$payment->pay_date = Input::get('pay_date');
		$payment->amount = Input::get('amount');
		$payment->bill_number = Input::get('bill_number');
		$payment->comments = Input::get('comments');
		$payment->id_parent = Input::get('id_parent');
		
		

		if ($payment->month == '' || $payment->pay_mode == '' || $payment->pay_date == '' 
		||	$payment->amount == '' || $payment->bill_number == '' || $payment->id_parent == '' ) {
			
			return Redirect::to('/payments/createpayment?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo');    
    	
		}
		$payment->save();
		$payparent = new PayParents;
		$payparent->id_parent = Input::get('id_parent');
		$payparent->id_payment = $payment->id;
		$payparent->save();
		
		return Redirect::to('/?msg='.utf8_encode("Pago Realizado").'&titulo='.utf8_encode('Información'));
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function view()
	{
		if (Auth::check()) {
		return View::make('payments/viewpayment');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

}