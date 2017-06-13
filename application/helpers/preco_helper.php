<?php

	function preco_Salvar($pData,$pParametros){
		
        if($pParametros["Acao"] == "Incluir"){
        	preco_Incluir($pData,$pParametros);
		}
		if($pParametros["Acao"] == "Alterar"){
			preco_Alterar($pData,$pParametros);
		}
        
		return $pData;			
	}
	
	function preco_Incluir($pData,$pParametros){
	
		$ci = get_instance();
		
		// Transaction BEGIN
        //$ci->db->trans_begin();
		
		//PREPARA $data
		$data = array();
		
		$data["IdTipoPreco"]		= $pData["TipoPreco"]["Id"];
        $data["Preco"]				= $pData["Preco"];
        $data["IdProduto"]			= $pData["IdProduto"];
        
		date_default_timezone_set('America/Sao_Paulo');
		$data["IdUsuarioInclusao"] 	= 1;//TEMP
    	$data["DataInclusao"] 		= date('Y-m-d H:i');
    	$data["IdOrigem"]	 		= 1;
		
		$ci->Preco_model -> Incluir($data);
		
	}
	
	function preco_Alterar($pData,$pParametros){
	
		$ci = get_instance();
	
		date_default_timezone_set('America/Sao_Paulo');
		$data["IdUsuarioAlteracao"] = 1;//TEMP
    	$data["DataAlteracao"] = date('Y-m-d H:i');
    	$data["IdOrigem"] = 1;
		
		$ci->Preco_model -> Alterar($pData);
		
	}