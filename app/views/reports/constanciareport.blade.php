<?php  

if (isset($_GET['student']) && isset($_GET['grado']) && isset($_GET['period']) && isset($_GET['direct'])) { 
 
  $student = User::find($_GET['student']);
  $period = Year::find($_GET['period']);
  $grado = Grades::find($_GET['grado']);
  $direct = User::find($_GET['direct']);

};?>

<?php 

$user = User::find(Auth::user()->id);
$date = date('d/m/Y');
$dia = date('d');
$mes = date('m');
$anno = date('Y');
$url = "/logo.jpg";

$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Documento sin título</title>
</head>

<body>

<table width="700px;" style="page-break-inside: auto;" border="0">

<tr>

  <td width="100" align="left" style="font:20px Verdana, Geneva, sans-serif; font-weight:bold;">';  
    if($url != "")
      $html .= '<img src="'.$_SERVER['DOCUMENT_ROOT'].''.$url.'" width="100" height="200"/>';    
    $html .='
  </td>

<td align="left" style="font:12px Verdana, Geneva, sans-serif; "><table width="100%" style="page-break-inside: auto;" border="0"  >
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
</tr>

<tr>
  <td colspan="2" align="center" style="font:16px Verdana, Geneva, sans-serif; font-weight:bold;"> CONSTANCIA DE ESTUDIOS </td>
</tr>

<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>
<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>

<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>
<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>

<tr>
  <td colspan="2" align="left" style="font:20px Verdana, Geneva, sans-serif; font-weight:bold;">
  </td>
</tr>

<tr> <td colspan="2">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="page-break-inside: auto;">
<tr>
  <td style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quien suscribe, Profesora '.$direct->name.' '.$direct->lastname.', titular de la cédula de identidad N° '.$direct->ci.', en mi carácter como 
  <strong>Director del Plantel</strong> hago constar que el alumno: <strong>'.$student->name.' '.$student->lastname.'</strong>, C.I. <strong>'.$student->ci.'</strong>, estudia en nuestro plantel el
   <strong>'.$grado->name_grade.'</strong> de Educación Primaria, durante el año escolar <strong>'.$period->name.'</strong>.</td>
</tr>
</table>
</td></tr>
<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>
<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>

<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>
<tr>
  <td align="right" width="250"><strong></strong></td>
</tr>
<tr>
 <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Constancia que se expide a los <strong>'.$dia.'</strong> días del mes de <strong>'.$mes.'</strong> del año <strong>'.$anno.'</strong>.</td>

</tr>
</table>
      '; ?>

 
<?php 

    $html .= '
  
<blockquote>&nbsp;</blockquote>
</body>
</html>';
//echo($html);
PDF::load($html, 'letter', 'portrait')->download('Constancia de '.$student->name.''.$student->lastname.''.$student->ci);

?>