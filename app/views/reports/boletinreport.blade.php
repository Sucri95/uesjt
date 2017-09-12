<?php  

if (isset($_GET['year']) && isset($_GET['periodo']) && isset($_GET['grado']) && isset($_GET['student'])) { 
  
  $year =  Year::find($_GET['year']);
  $period = Periods::find($_GET['periodo']);
  $grado = Grades::find($_GET['grado']);
  $student = User::find($_GET['student']);

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
  <td colspan="2" align="center" style="font:16px Verdana, Geneva, sans-serif; font-weight:bold;">Boletín de <strong color="#00000">'.$student->name.' '. $student->lastname .' del '.$period->period_name.' '.$year->name.'</strong></td>
</tr>

</tr>

<tr>
  <td colspan="2" align="left" style="font:20px Verdana, Geneva, sans-serif; font-weight:bold;">
  </td>
</tr>
</table>
      '; ?>


<?php  


  $html .= '<table width="322px;" align="center" border="0" cellpadding="0" cellspacing="0" style=" page-break-inside: auto;">
  <tr>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-left:1px #000 solid;"><strong>Materia</strong></td>
  <td width="150" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>Calificación Cualitativa</strong></td>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>Calificación Literal</strong></td>
  </tr>';
  $sum = 0;
  $con = 0;
  $cali = Califications::where('id_grado', '=', $grado->id)->where('id_period', '=', $period->id)->where('id_student','=', $student->id)->get();
foreach ($cali as $cal) {
                $student = User::find($cal->id_student);
                $subjet = Subjets::find($cal->id_subjet);
                $sum = $sum + $cal->cuantitative;
                $con = $con + 1;

$html .= '
<tr>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>'. $subjet->name_sub .'</strong></td>
  <td width="150" align="center" height="20"style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $cal->cualitative .'</strong></td>
  <td width="100" align="center" height="20"style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $cal->continue_eval.'</strong></td>
</tr>
';

       };?>
<?php 
  $prom = 0;
  $letra = 'E';
  if ($con > 0) {
    $prom = $sum / $con;
    if ($prom <= 20 && $prom >= 19) {
      $letra = 'A';
    }
    if ($prom <= 18 && $prom >= 17) {
      $letra = 'B';
    }
    if ($prom <= 16 && $prom >= 14) {
      $letra = 'C';
    }
    if ($prom <= 13 && $prom >= 10) {
      $letra = 'D';
    }
    if ($prom <= 09 && $prom >= 01) {
      $letra = 'E';
    }
  }

       $html .= '
  <tr>
  <td width="150" align="center" height="20" style="font-size:13px; border-left:1px #000 solid; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>Promedio</strong></td>
  <td colspan="2" width="100" align="center" style="font-size:13px; border-left:1px #000 solid; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $letra.'</strong></td>
  </tr>

       </table>
  
<blockquote>&nbsp;</blockquote>
</body>
</html>';
//echo($html);
PDF::load($html, 'letter', 'portrait')->download('Boletín'.$student->ci.' - '.$student->name);

?>