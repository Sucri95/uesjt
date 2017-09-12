<?php
class PeriodController extends BaseController
{
	public function create()
	{
		if (Auth::check()) {
		return View::make('periods/createyear');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function creatoryear()
	{
		if (Auth::check()) {
		$year = new Year;
        $year->name = Input::get('name');
        $year->status = 'A';

        $very = Year::where('status','=', 'A')->count();
        if ($very > 0) {
        	$very1 = Year::where('status','=', 'A')->get();
        	$oldyear = Year::find($very1[0]['id']);
        	$oldyear->status = 'D';
        	$oldyear->save();
        	$allperiod = Periods::where('id_year', '=', $oldyear->id)->get();
        	foreach ($allperiod as $p) {
        		$period = Periods::find($p->id);
        		$period->status = 'D';
        		$period->save();
        	}
        }

        if ($year->name == '') {
        	return Redirect::to('/createyear?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo'); 

        }else{

        $year->save();
        
        $period1 = new Periods;
        $period1->period_name= '1er Lapso';
        $period1->fromdate = Input::get('fromdate1');
        $period1->todate = Input::get('todate1');
        $period1->status = 'A';
        $period1->id_year = $year->id;
	
		$period2 = new Periods;
        $period2->period_name= '2do Lapso';
        $period2->fromdate = Input::get('fromdate2');
        $period2->todate = Input::get('todate2');
        $period2->status = 'A';
        $period2->id_year = $year->id;
		
		$period3 = new Periods;
        $period3->period_name= '3er Lapso';
        $period3->fromdate = Input::get('fromdate3');
        $period3->todate = Input::get('todate3');
        $period3->status = 'A';
        $period3->id_year = $year->id;

        }if ($period1->period_name == '' || $period1->fromdate == '' || $period1->todate == '' 
        || $period2->period_name == '' || $period2->fromdate == '' || $period2->todate == ''
        || $period3->period_name == '' || $period3->fromdate == '' || $period3->todate == '') {

        	   	return Redirect::to('/createyear?msg='.utf8_encode("Debe llenar todos los campos obligatorios").'&titulo='.utf8_encode('ALERTA').'&cl=gritter-rojo'); 
        	
        }else{


	  	$period3->save();
		$period2->save();
		$period1->save();
		

        }
		
		return Redirect::to('/?msg='.utf8_encode("Año Escolar Registrado").'&titulo='.utf8_encode('Información'));	
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function view()
	{
		if (Auth::check()) {
		return View::make('periods/index');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}
}