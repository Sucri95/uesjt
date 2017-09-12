<?php  

if (isset($_GET['year']) && isset($_GET['grado']) && isset($_GET['student'])) { 
  
  $year =  Year::find($_GET['year']);
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
  <td colspan="2" align="center" style="font:16px Verdana, Geneva, sans-serif; font-weight:bold;">Boletín de <strong color="#00000">'.$student->name.' '. $student->lastname .' del año escolar '.$year->name.'</strong></td>
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
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>1er Lapso</strong></td>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>2do Lapso</strong></td>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>3er Lapso</strong></td>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>Nota Final</strong></td>
  </tr>';
  $totalprom = 0;
  $totalmat = 0;

  $materia = Subjets::all();
  foreach ($materia as $mat) {
      $nota[0] = '';
      $nota[1] = '';
      $nota[2] = '';
    $sum = 0;
    $con = 0;
    $yearperi = Periods::where('id_year', '=', $year->id)->orderby('period_name','ASC')->get(); 
    $i = 0;
    foreach ($yearperi as $peri) {
     
      $cali = Califications::where('id_grado', '=', $grado->id)->where('id_period', '=', $peri->id)->where('id_student','=', $student->id)->where('id_subjet', '=', $mat->id)->get();
      foreach ($cali as $cal) {
        $nota[$i] = $cal->continue_eval;
        $sum = $sum + $cal->cuantitative;
        $con = $con + 1;
      }
       $i = $i + 1; 
    }  

  $prom = 0;
  $letra = 'E';
  if ($con > 0) {
    $prom = $sum / 3;
    if ($prom <= 20 && $prom >= 19) {
      $letra = 'A';
    }
    if ($prom < 19 && $prom >= 17) {
      $letra = 'B';
    }
    if ($prom < 17 && $prom >= 14) {
      $letra = 'C';
    }
    if ($prom < 14 && $prom >= 10) {
      $letra = 'D';
    }
    if ($prom < 10 && $prom >= 01) {
      $letra = 'E';
    }
  }

$totalmat = $totalmat + 1;
$totalprom = $totalprom + $prom;
$html .= '
<tr>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>'. $mat->name_sub .'</strong></td>
  <td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $nota[0].'</strong></td>
  <td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $nota[1].'</strong></td>
  <td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $nota[2].'</strong></td>
  <td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>' .$letra. '</strong></td>
</tr>
';

      }

      ?>
<?php 
  $prom1 = 0;
  $letra1 = 'E';
  if ($totalmat > 0) {
    $prom1 = $totalprom / $totalmat;
    if ($prom1 <= 20 && $prom1 >= 19) {
      $letra1 = 'A';
    }
    if ($prom1 < 19 && $prom1 >= 17) {
      $letra1 = 'B';
    }
    if ($prom1 < 17 && $prom1 >= 14) {
      $letra1 = 'C';
    }
    if ($prom1 < 14 && $prom1 >= 10) {
      $letra1 = 'D';
    }
    if ($prom1 < 10 && $prom1 >= 01) {
      $letra1 = 'E';
    }
  }

       $html .= '
  <tr>
  <td colspan="3" width="150" height="20" align="center" style="font-size:16px; border-left:1px #000 solid; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>Promedio</strong></td>
  <td colspan="2" height="20" width="100" align="center" style="font-size:16px; border-left:1px #000 solid; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $letra1.'</strong></td>
  </tr>

       </table>
  
<blockquote>&nbsp;</blockquote>
</body>
</html>';
//echo($html);
PDF::load($html, 'letter', 'portrait')->download('Boletín'.$student->ci.' - '.$student->name);

?>