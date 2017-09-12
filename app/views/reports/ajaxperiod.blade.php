<?php
	$id = $_GET['rep'];
	$cont = Periods::where('id_year', '=', $id)->count();
  if ($cont > 0 ) {
    $co = 0;
    $cont1 = Periods::where('id_year', '=', $id)->get();
    foreach ($cont1 as $periodo) {
      if ($co == 0) {
        $stud = ''.$periodo->id.'-'.$periodo->period_name.'';
        $co = 1;
      }else{
        $stud .= ','.$periodo->id.'-'.$periodo->period_name.'';
      }
    }
  }else{
    $stud = '';
  }

    echo $stud;
    
?>