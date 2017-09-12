<?php
class topicController extends BaseController
{
	public function index()
	{
		if (Auth::check()){ 
		
		return View::make('emails/createtopic');
		
		}else{ 
			return Redirect::to('/');
		}

	}

	public function creator()
	{
		if (Auth::check()){ 
											
				$topica['asunto'] = Input::get('asunto');
				$topica['especificaciones'] = Input::get('especificaciones');
				
						$user = User::find(Input::get('id_user'));
						$data = ['user' => $user, 'topica' => $topica];

						if(filter_var($user->email, FILTER_VALIDATE_EMAIL)){

						Mail::send('emails.mailer', $data, function($message) use ($topica, $user)
							{
    							$message->to($user->email)->subject('Tienes un mensaje nuevo de U. E. San Judas Tadeo');
							});
					}return	Redirect::to('/?msg='.utf8_encode("Mensaje enviado con éxito").'&titulo='.utf8_encode('Información'));

				}else{

					return	Redirect::to('/?msg='.utf8_encode("No tiene autorización para realizar esta acción").'&titulo='.utf8_encode('Información'));

				} 
	}

	public function view()
	{
		
		return View::make('emails/password');
		
	}

	public function backpassword()
	{

				$very = User::where('email', '=', Input::get('email'))->count();
				if ($very > 0 ) {
					$pass = User::where('email','=', input::get('email'))->get();
				}else{

					return	Redirect::to('/?msg='.utf8_encode("El correo electrónico especificado no existe").'&titulo='.utf8_encode('Información'));

				}
				$topica['asunto'] = 'Recuperación de Contraseña';
				$topica['especificaciones'] = $pass[0]['passcode'];
						
						$data = ['pass' => $pass, 'topica' => $topica];

						if(filter_var($pass[0]['email'], FILTER_VALIDATE_EMAIL)){

						Mail::send('emails.mailer', $data, function($message) use ($topica, $pass)
							{
    							$message->to($pass[0]['email'])->subject('Tienes un mensaje nuevo de U. E. San Judas Tadeo');
							});
					}
					return	Redirect::to('/?msg='.utf8_encode("Mensaje enviado con éxito, por favor revise su correo electrónico").'&titulo='.utf8_encode('Información'));

	}

}