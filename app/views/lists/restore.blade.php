@extends('layouts.default')

@section('content')
<div class="innerLR">
    <style>
#apDivcuerpo {
    position:absolute;
    width:980px;
    height:100%;
    left:9.8%;
    top:0%;
    margin-left:auto;
    margin-right:auto;
    background-color:#FFF;
    
    z-index:2;
}
    </style>
<?php

//------------------------------------------------------------------------------------------
//  Definiciones


    //  Conexión con la Base de Datos.
    
    $db_server          = "localhost"; 
    $db_name            = "uesjt"; 
    $db_username        = "root"; 
    $db_password        = ""; 


    //  Acceso al script.
    
    $auth_user      = "root";
    $auth_password  = "";


    //  Nombre del archivo.

    $filename           = "judas.sql";


//------------------------------------------------------------------------------------------
//  No tocar
    error_reporting( E_ALL & ~E_NOTICE );
    define( 'Str_VERS', "1.1.1" );
    define( 'Str_DATE', "18 de Marzo de 2005" );
//------------------------------------------------------------------------------------------

///////  El área protegida empieza DESPUÉS de la SIGUIENTE línea  /////
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<HTML>
 <HEAD>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <br /><br /><br /><br /><br />
    <title>Restauración de la Base de Datos</title>
    <!-- no cache headers -->
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Cache-Control" content="must-revalidate">
    <!-- end no cache headers --> 
 </HEAD>
<BODY 
    bgcolor="#D5D5D5" 
    text="#000000" 
    id="all" 
    leftmargin="25" 
    topmargin="25" 
    marginwidth="25" 
    marginheight="25" 
    link="#000020" 
    vlink="#000020" 
    alink="#000020">
    <center><h1>Restauración de la Base de Datos</h1></center><br>
    <strong>
<?php
    @set_time_limit( 0 );

    echo( "- Base de Datos: '$db_name' en '$db_server'.<br>" );
    $error = false;

    if ( !@function_exists( 'gzopen' ) ) {
        $hay_Zlib = false;
        echo( "- Ya que no está disponible Zlib, usaré el BackUp de la Base de Datos: '$filename'<br>" );
    }
    else {
        $hay_Zlib = true;
        $filename = $filename . ".gz";
        echo( "- Ya que está disponible Zlib, usaré el BackUp de la Base de Datos: '$filename'<br>" );
    }

    if( !$file = @fopen( $filename,"r" ) ) { 
        echo ("<br>- No se encuentra o no se puede abrir: '$filename'.<br>");
        $error = true;
    }
    else { 
        if( fseek($file, 0, SEEK_END)==0 )
            $filesize_comprimido = ftell( $file );
        else { 
           echo ("<br>- No se puede obtener las dimensiones de '$filename'.<br>");
           $error = true;
        }
          fclose( $file );
    }

    if ( !$error ) {
        if( $hay_Zlib ) {
            if ( !$file = @gzopen( $filename, "rb" ) ) { 
                echo( "<br>- No se encontró o no se pudo abrir: '$filename'.<br>" );
                $error = true;
            }
            else {
                gzrewind( $file );
            }
        }
        else {
            if ( !$file = @fopen( $filename, "rb" ) ) { 
                echo( "<br>- No se encontró o no se pudo abrir: '$filename'.<br>" );
                $error = true;
            }
            else {
                rewind( $file );
            }
        }
    }

    if (!$error) { 
        $dbconnection = @mysql_connect( $db_server, $db_username, $db_password ); 
        if ($dbconnection) 
            $db = mysql_select_db( $db_name );
        if ( !$dbconnection || !$db ) { 
            echo( "<br>" );
            echo( "-  La conexión con la Base de datos ha fallado: ".mysql_error()."<br>" );
            $error = true;
        }
        else {
            echo( "<br>" );
            echo( "- Se ha establecido conexión con la Base de datos.<br>" );
        }
    }

    if (!$error) { 
        $result = mysql_query('SHOW TABLES');
            if (!$result) {
                    print "<br>- Error, se pudo obtener la lista de las tablas.<br>";
                    print '<br>- MySQL Error: ' . mysql_error(). '<br>';
                    $error = true;
            }
            else {
                    // $count es el número de tablas en la base de datos
                    $count = mysql_num_rows($result);
                    if( !$count ) {
                            echo "- No ha sido necesario borrar la estructura de la Base de datos, estaba vacía.<br>";
                    }
                    else {
                            while ($row = mysql_fetch_row($result)) {
                                    $deleteIt = mysql_query("DROP TABLE $row[0]");
                                    if( !$deleteIt ) {
                                    echo( "<br>" );
                                            print "- Lo siento, error al borrar la tabla $row[0].<br>";
                                            $error = true;
                                            break;
                                    }
                            }
                            echo "- Se ha borrado la estructura de la Base de Datos.<br>";
                    }
                    mysql_free_result($result);
            }
    }

    if( !$error ) { 
        $query = "";
        $last_query = "";
        $total_queries = 0;
        $total_lineas = 0;
    
            $t_start = time();

            while( 1 ) {
                if( $hay_Zlib )
                    $seacabo = gzeof( $file ) OR $error;
                else
                    $seacabo = feof( $file ) OR $error;
                if( $seacabo )
                    break;
                if( $hay_Zlib )
                    $statement = gzgets( $file );
                else
                    $statement = fgets( $file );
                    
            $statement = trim( $statement );
            $total_lineas++;
            // no se procesan comentarios ni lineas en blanco
            if ( $statement=="--" || $statement=="" || strpos ($statement, "#") === 0) { 
                continue;
            }
            // pasa a query
            $query .= $statement;
            // ejecuta query si esta completo
            if( preg_match( '{/}', $statement ) ) { 
                if ( !mysql_query( $query, $dbconnection) ) { 
                    echo(" <br>" );
                    echo("- Error en statement: $statement<br>" );
                    echo("- Query: $query<br>");
                    echo("- MySQL: ".mysql_error()."<br>" );
                    $error = true;
                    break;
                }
                $last_query = $query;
                $query = "";
                $total_queries++;
            }
        }

            if( $hay_Zlib )
                $file_offset = gztell($file);
        else
            $file_offset = ftell($file);
        $qry = file_get_contents($filename);
        echo $qry;

        mysql_query($qry, $dbconnection,$enlace);

        echo( "<pre>" );
        echo( "- Líneas procesadas......................... $total_lineas<br>" );
        echo( "- Queries procesadas........................ $total_queries<br>" );
        echo( "- Último Query procesado.................... '$last_query'<br>" );
            if( $hay_Zlib ) {
            echo( "- Base de Datos comprimida.................. $filesize_comprimido bytes<br>");
            echo( "- Base de Datos descomprimida y procesada... $file_offset bytes<br>" );
        }
        else {
            echo( "- Base de Datos procesada................... $file_offset bytes<br>" );
        }
        echo( "</pre>" );
            $t_now = time();
            $t_delta = $t_now - $t_start;
            if( !$t_delta )
                $t_delta = 1;
            $t_delta = floor(($t_delta-(floor($t_delta/3600)*3600))/60)." minutos y "
            .floor($t_delta-(floor($t_delta/60))*60)." segundos.";
            echo( "- He completado la restauración de la Base de Datos en $t_delta<br>" );
    }

    if ( $dbconnection )
        mysql_close();
    if ( $file )
        if( $hay_Zlib )
            gzclose($file);
       else
    fclose($file);


//------------------------------------------------------------------------------------------
//  END
?>


<?php
///////  El área protegida acaba ANTES de la ANTERIOR línea  /////
    
?>
<table>
<tr>
<td>
<br>
</td>
</tr>
</table>
</div>
@stop
