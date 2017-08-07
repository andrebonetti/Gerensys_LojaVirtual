<?php

    /*function arredondarNumero($pNumero,$pCasas) {
        return number_format($pNumero, $pCasas, ",", ".");
	}*/

	function numeroEmReais($numero) {
        return "R$ " . number_format($numero, 2, ",", ".");
	}

	function numeroEmReais2($numero) {
        return number_format($numero, 2, ",", ".");
	}

    function numeroEmPorcentagem($numero) {
        return "% " . number_format($numero, 2, ",", ".")." a.m";
	}

	function no_acento_code($string){
				
			$string = preg_replace("/ /", "-", $string); 
			$string = preg_replace("/ã/", "a", $string);
			$string = preg_replace("/Ã/", "A", $string);
	        $string = preg_replace("/á/", "a", $string);
	        $string = preg_replace("/Á/", "A", $string);
	        $string = preg_replace("/â/", "a", $string);
	        $string = preg_replace("/Â/", "A", $string);
			$string = preg_replace("/é/", "e", $string);
	        $string = preg_replace("/É/", "E", $string);
	        $string = preg_replace("/ê/", "e", $string);
	        $string = preg_replace("/Ê/", "E", $string);
			$string = preg_replace("/ç/", "c", $string);
	        $string = preg_replace("/Ç/", "C", $string);	
	        $string = preg_replace("/í/", "i", $string);
	        $string = preg_replace("/Í/", "I", $string);
			$string = preg_replace("/,/", "-", $string);
	        
			return $string;
	}

	function valor_decimal($string){
	        $string = str_replace(".", "", $string);    
			$string = str_replace(",", ".", $string);     
			return $string;
	}

	function sinal_valor($valor){
	    if($valor < 0){return "negativo";};
	    if($valor > 0){return "positivo";};  
		if($valor == 0){return "none";};    
	}

	function dataPtBrParaMysql($dataPtBr) {
	$partes = explode("/", $dataPtBr);
		return "{$partes[2]}-{$partes[1]}-{$partes[0]}";
	}

	function dataMysqlParaPtBr($dataPtBr) {
	$partes = explode("-", $dataPtBr);
		return "{$partes[2]}/{$partes[1]}/{$partes[0]}";
	}
	