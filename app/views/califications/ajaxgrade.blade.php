<?php
	$id = $_GET['rep'];
	$stud = '';
  $cont = 0;
      $students = User::where('status', '=', 'A')->where('user_level', '=', '4')->where('id_grade', '=', $id)->get();
      
      foreach ($students as $stu) {
        if ($cont == 0) {
        
          $stud = ''.$stu->id.'-'.$stu->name.' '.$stu->lastname.'';
          $cont = 1;

        }else{

          $stud .= ','.$stu->id.'-'.$stu->name.' '.$stu->lastname.'';
        }
 
      }
  

    echo $stud;
    
?>