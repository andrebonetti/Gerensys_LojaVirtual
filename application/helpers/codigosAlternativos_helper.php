<?php	
	
	function codigosAlternativos_Salvar($pData,$pParametros){
		
        if($pParametros["Acao"] == "Incluir"){
        	codigosAlternativos_Incluir($pData,$pParametros);
		}
		if($pParametros["Acao"] == "Alterar"){
			codigosAlternativos_Alterar($pData,$pParametros);
		}
        
		return $pData;			
	}
	
	function codigosAlternativos_Incluir($pData,$pParametros){
	
		$ci = get_instance();
	
		date_default_timezone_set('America/Sao_Paulo');
		$pData["IdUsuarioInclusao"] = 1;//TEMP
    	$pData["DataInclusao"] 		= date('Y-m-d H:i');
    	$pData["IdOrigem"] 			= 1;
		
		$ci->CodigosAlternativos_model -> Incluir($pData);
		
	}
	
	function codigosAlternativos_Alterar($pData,$pParametros){
	
		$ci = get_instance();
	
		date_default_timezone_set('America/Sao_Paulo');
		$pData["IdUsuarioAlteracao"] 	= 1;//TEMP
    	$pData["DataAlteracao"] 		= date('Y-m-d H:i');
    	$pData["IdOrigem"] 				= 1;
		
		$ci->CodigosAlternativos_model -> Alterar($pData);
		
	}