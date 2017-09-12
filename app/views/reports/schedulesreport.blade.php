<?php  

if (isset($_GET['grado'])) { 
  
  $grade = Grades::find($_GET['grado']);

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

<table width="700;" border="0">

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
  <td colspan="2" align="center" style="font:16px Verdana, Geneva, sans-serif; font-weight:bold;"> Horario de <strong color="#00000">'.$grade->name_grade.'</strong></td>
</tr>

</tr>

<tr>
  <td colspan="2" align="left" style="font:20px Verdana, Geneva, sans-serif; font-weight:bold;">
  </td>
</tr>
</table>
  <table width="322px;" align="center" border="0" cellpadding="0" cellspacing="0" style=" page-break-inside: auto;">
  <tr>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-left:1px #000 solid;"><strong>Hora / Día</strong></td>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>Lunes</strong></td>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>Martes</strong></td>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>Miércoles</strong></td>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>Jueves</strong></td>
  <td width="100" height="20" align="center" style="background-color: #2F0B3A; font:13px Verdana, Geneva, sans-serif; color:#FFF; border-right:1px #000 solid;"><strong>Viernes</strong></td>
  </tr>';

$html .= '
<tr>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>7:30 - 8:15</strong></td>
';
  $monday1 = Schedules::where('day', '=', '1')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
  if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
  $mat = Subjets::find($monday12[0]['id_subjet']);
  $html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
  }
  $monday1 = Schedules::where('day', '=', '2')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
  if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
  $mat = Subjets::find($monday12[0]['id_subjet']);
  $html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
  }
  $monday1 = Schedules::where('day', '=', '3')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
  if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
  $mat = Subjets::find($monday12[0]['id_subjet']);
  $html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
  }
  $monday1 = Schedules::where('day', '=', '4')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
  if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
  $mat = Subjets::find($monday12[0]['id_subjet']);
  $html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
  }
  $monday1 = Schedules::where('day', '=', '5')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
  if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '1')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
  $mat = Subjets::find($monday12[0]['id_subjet']);
  $html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
  } 
$html .= '</tr>';

$html .= '
<tr>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>8:15 - 9:00</strong></td>
';
$monday1 = Schedules::where('day', '=', '1')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '2')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '3')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '4')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '5')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '2')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$html .= '</tr>';

$html .= '
<tr>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>9:00 - 9:30</strong></td>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Recreo</strong></td>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Recreo</strong></td>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Recreo</strong></td>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Recreo</strong></td>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Recreo</strong></td>

';

$html .= '</tr>';

$html .= '
<tr>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>9:30 - 10:15</strong></td>
';
$monday1 = Schedules::where('day', '=', '1')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '2')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '3')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '4')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '5')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '4')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}           
$html .= '</tr>';

$html .= '
<tr>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>10:15 - 11:00</strong></td>
';
$monday1 = Schedules::where('day', '=', '1')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '2')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '3')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '4')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '5')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '5')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}                      
$html .= '</tr>';

$html .= '
<tr>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>11:00 - 11:45</strong></td>
';
$monday1 = Schedules::where('day', '=', '1')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '1')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '2')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '2')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '3')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '3')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '4')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '4')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}
$monday1 = Schedules::where('day', '=', '5')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->count(); 
if($monday1 > 0){$monday12 = Schedules::where('day', '=', '5')->where('module', '=', '6')->where('id_grade', '=', $grade->id)->where('status', '=', 'A')->get(); 
$mat = Subjets::find($monday12[0]['id_subjet']);
$html .='<td width="100" align="center" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid;"><strong>'. $mat->name_sub.'</strong></td>';
}                               
$html .= '</tr>';

$html .= '
<tr>
  <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>11:45 - 12:30</strong></td>
    <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Hora Recreativa</strong></td>
    <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Hora Recreativa</strong></td>
    <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Hora Recreativa</strong></td>
    <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Hora Recreativa</strong></td>
    <td width="100" align="center" height="20" style="font-size:13px; border-right:1px #000 solid; border-top:1px #000 solid; border-bottom:1px #000 solid; border-left:1px #000 solid;"><strong>Hora Recreativa</strong></td>

';                                  
$html .=  '</tr>
</table> 
<blockquote>&nbsp;</blockquote>
</body>
</html>';
//echo($html);
PDF::load($html, 'letter', 'landscape')->download('Horario'.$grade->name_grade);
?>
