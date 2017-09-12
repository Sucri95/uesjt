<?php
class BackrestoreController extends BaseController
{
	public function backups()
	{
		if (Auth::check()) {
		return View::make('lists/backup');
		}else{
			return	Redirect::to('/?msg='.utf8_encode("Necesita Iniciar Session para Realizar esta Acción").'&titulo='.utf8_encode('Información'));
		}
	}

	public function restores()
	{
		
		$filename = 'judas.sql';
		// NOMBRE DEL HOST
		$mysql_host = 'localhost';
		// USUARIO MYSQL
		$mysql_username = 'root';
		// PASSWORD MYSQL
		$mysql_password = '';
		// NOMBRE DE LA BASE DE DATOS
		$mysql_database = 'uesjt';

		//////////////////////////////////////////////////////////////////////////////////////////////
		// TE CONECTAS AL SERVIDOR MYSQL
		$conn = mysqli_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysqli_error());
		// CREAS LA BASE DE DATOS SI NO EXISTE Y LUEGO LA SELECCIONAS
		mysqli_query($conn, "CREATE DATABASE  IF NOT EXISTS tester" ) or die('Error connecting to MySQL server: ' . mysqli_error($conn));
		mysqli_select_db($conn, $mysql_database) or die('Error selecting MySQL database: ' . mysqli_error($conn));

		// PROCESO PARA LEER EL RESPALDO DE LA BASE DE DATOS COMO SI FUESE UN STRING PARA ROMPERLO Y METER QUERY POR QUERY
		$templine = '';
		$lines = file($filename);
		foreach ($lines as $line)
		{
		    if (substr($line, 0, 2) == '--' || $line == '')
		        continue;
		    $templine .= $line;
		    if (substr(trim($line), -1, 1) == ';')
		    {
		        mysqli_query($conn, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error($conn) . '<br /><br />');
		        $templine = '';
		    }
		}
		return	Redirect::to('/?msg='.utf8_encode("Su base de datos ha sido restaurada exitosamente").'&titulo='.utf8_encode('Información').'&cl=gritter-verde');
		
		
	}

 	public function judas()
	{ 
		//
 	}

}