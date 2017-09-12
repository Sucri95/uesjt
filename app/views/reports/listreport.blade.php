<?php  

if (isset($_GET['grado'])) { 

  $grado = Grades::find($_GET['grado']);

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
  <td colspan="2" align="center" style="font:16px Verdana, Geneva, sans-serif; font-weight:bold;">Lista de Útiles <strong color="#00000">'.$grado->name_grade.'</strong></td>
</tr>
</tr>

<tr>
  <td colspan="2" align="center" style="font:20px Verdana, Geneva, sans-serif; font-weight:bold;">
  </td>
</tr>

<tr> 

</tr>

</table>
      '; ?>
      

<?php  

        
                     $html .= '<table width="322px;" align="center" border="0" cellpadding="0" cellspacing="0" style=" page-break-inside: auto;">
                     <tr>
                      <td width="60" height="20" align="center" style="background-color: #2F0B3A; font-size:13px; border-right:1px #000 solid; color:#FFF; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Útil Escolar</strong></td>
                      <td width="35" height="20" align="center" style="background-color: #2F0B3A; font-size:13px; border-right:1px #000 solid; color:#FFF; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Cantidad</strong></td>
                      </tr>';

                    

                    $list = Lists::all();
                    foreach ($list as $lis) {
                      $html .='
                     <tr>
                        <td width="60" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>'.$lis->list_name.'</strong></td>
                        <td width="35" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-right:1px #000 solid;"><strong>'. $lis->quantity .'</strong></td>
                      </tr>
                   ';

                  };?>
<?php 

    $html .= '</table>
  
<blockquote>&nbsp;</blockquote>
</body>
</html>';
//echo($html);
PDF::load($html, 'letter', 'portrait')->download('Lista de Útiles '.$grado->name_grade);

?>