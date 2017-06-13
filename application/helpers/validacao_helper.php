<?php

 	function ValidarBaseDados($pCampo,$pTabela,$pData,$pValidacao){
 		
 		$ci = get_instance();
 		
 		if($pTabela == "tb_cst_csosn"){
			
			if($pData["CodigoCompleto"] != null)
			{
				if(empty($ci->Cst_Csosn_model->Listar($pData))){
					$pValidacao["IsValidado"] = false;
					
					array_push($pValidacao["lMensagem"],$pCampo.": ".$pData["CodigoCompleto"]." não encontrado na base de dados");
				}
			}
			else{
				$pValidacao["IsValidado"] = false;
				
				array_push($pValidacao["lMensagem"],"O campo ". $pCampo." não pode estar vazio");
			}
			
		}
		
		if($pTabela == "tb_unidadeapresentacao"){
			
			if(empty($ci->Sys_UnidadeApresentacao_model->Listar($pData))){
				$pValidacao["IsValidado"] = false;
				
				array_push($pValidacao["lMensagem"],$pCampo.": ".$pData["Descricao"]." não encontrada na base de dados");
			}
			
		}
		
		if($pTabela == "tb_sys_ncm_sh"){
			
			if($pData["Id"] != null)
			{
			
				if(empty($ci->Sys_Ncm_Sh_model->Listar($pData))){
					$pValidacao["IsValidado"] = false;
					
					array_push($pValidacao["lMensagem"],$pCampo.": ".$pData["Descricao"]." não encontrada na base de dados");
				}
			
			}
			else{
				$pValidacao["IsValidado"] = false;
				
				array_push($pValidacao["lMensagem"],"O campo '". $pCampo."' não pode estar vazio");
			}
			
		}

    	return $pValidacao;
	}

	function ValidarCampo($pCampo,$pValor,$pValidacao){
		
		if($pValor == null){
			$pValidacao["IsValidado"] = false;
			
			array_push($pValidacao["lMensagem"],"O campo '". $pCampo."' não pode estar vazio");
		}
		
		return $pValidacao;
	}