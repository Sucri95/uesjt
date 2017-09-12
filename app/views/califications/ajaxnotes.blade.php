<?php

	$stu = $_GET['stu'];
  $per = $_GET['per'];
  $sub = $_GET['sub'];
  $gra = $_GET['gra'];

      $nota = Califications::where('id_period', '=', $per)
      ->where('id_student', '=', $stu)
      ->where('id_subjet', '=', $sub)
      ->where('id_grado', '=', $gra)
      ->count();
      
    if ($nota == 0) {
        echo "";
      }else{
      $notas = Califications::where('id_period', '=', $per)
      ->where('id_student', '=', $stu)
      ->where('id_subjet', '=', $sub)
      ->where('id_grado', '=', $gra)
      ->get();
        
      echo "Excelente,Muy bien,Bien,Regular,Debe mejorar|A,B,C,D,E|01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20|".$notas[0]['cualitative'].",".$notas[0]['cuantitative'].",".$notas[0]['continue_eval'].",".$notas[0]['id']."";
      }      
?>