<?php  

if (isset($_GET['year'])) { 

  $year = Year::find($_GET['year']);

};?>

<?php 

$user = User::find(Auth::user()->id);
$date = date('d/m/Y');
$url = "/logo.jpg";

$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Documento sin título</title>
</head>

<body>
<table width="700px;" border="0">

<tr>

  <td width="100" align="left" style="font:20px Verdana, Geneva, sans-serif; font-weight:bold;">';  
    if($url != "")
      $html .= '<img src="'.$_SERVER['DOCUMENT_ROOT'].$url.'" width="100" height="200"/>';    
    $html .='
  </td>
  <td align="left" style="font:12px Verdana, Geneva, sans-serif; "><table width="100%" border="0"  >
<tr>
  <td align="right"><strong> Fecha: '.$date.'</strong></td>
</tr>

<tr>
  <td align="right"><strong>Generado por: '.$user->name.' '.$user->lastname.'</strong></td>
</tr>
<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>
<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>

<tr>
  <td align="right" width="250"><strong>U. E. San Judas Tadeo</strong></td>
</tr>

<tr>
  <td align="right"><strong>RIF J-30275984-4</strong></td>
</tr>

<tr>
  <td align="right"><strong>Juan Griego, Calle Bolívar</strong></td>
</tr>

<tr>
  <td align="right"><strong>Telf: (0295) 253-0115</strong></td>
</tr>

<tr>
  <td align="right"><strong>Email: uesanjudastadeo1@gmail.com</strong></td>
</tr>

</table>
</td>
<tr>
  <td colspan="2" align="center" style="font:16px Verdana, Geneva, sans-serif; font-weight:bold;">Alumnos que estudiaron en el <strong color="#00000">'.$year->name.'</strong></td>
</tr>
</tr>

<tr>
  <td colspan="2" align="center" style="font:20px Verdana, Geneva, sans-serif; font-weight:bold;">
  </td>
</tr>

<tr> 

</tr>

</table>
  <table width="322px;" align="center" border="0" cellpadding="0" cellspacing="0" style=" page-break-inside: auto;">
                     <tr>
                      <td width="50" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>Estudiante</strong></td>
                      <td width="30" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-left:1px #000 solid;"><strong>Grado</strong></td>
                      </tr>';

 
$stuc = 0; 
$student = '';
$stuc = User::where('user_level', '=', '4')->where('status', '=', 'D')->count();
if ($stuc > 0){
    $stu = User::where('user_level', '=', '4')->where('status', '=', 'D')->get();
    $c = 0;
    foreach ($stu as $st){
    $catt = 0;
    $catt = Attendances::where('id_year', '=', $year->id)->where('id_student', '=', $st->id)->count();
    if ($catt > 0){
        if ($c == 0){
    $student = $st->id;
    $c = 1;
}else{
    $student .= ','.$st->id.'';
}
}
}
            $estudiante = explode(',', $student);

                    foreach ($estudiante as $estu){
                    $es = User::find($estu);
                    $gr =  Grades::find($es->id_grade);
                      $html .='
                     <tr>
                        <td width="50" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>'.$es->name.' '.$es->lastname.'</strong></td>
                        <td width="35" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-right:1px #000 solid;"><strong>'. $gr->name_grade .'</strong></td>
                      </tr>
                   ';

                  };?>
<?php 
}

    $html .= '</table>
  
<blockquote>&nbsp;</blockquote>
</body>
</html>';
//echo($html);
PDF::load($html, 'letter', 'portrait')->download('Estudiantes Desactivados'.$year->name);

?>