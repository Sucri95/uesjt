<?php
 /**
 * 
 */
 class Moneda 
 {
 	
	public static  function format($amount){

			$resp = number_format($amount, 2, '.', ',');

			return  $resp;
 	}
}