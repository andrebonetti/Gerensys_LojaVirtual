<?php
	
	function cliente_enderecos_GetPosts(){
		
		$ci = get_instance();
		
		$data["Endereco"]		= $ci->input->post("endereco");		
        $data["Complemento"]	= $ci->input->post("complemento");	
        $data["Numero"]			= $ci->input->post("numero");
        $data["CEP"]			= $ci->input->post("cep");
        
		return $data;
	} 
    
    function cliente_enderecos_ValidarDados($pEndereco,$pTipo = "Incluir"){
		
		$Id = null;
		if($pTipo == "Alterar"){
			$Id = $pEndereco["Id"];
		}
        
        $validacao["IsValidado"] = true;
		$validacao["erros"]		 = array();
		
		$validacao = cliente_enderecos_ValidarCampo($validacao,$pEndereco["Endereco"],"Endereco",$Id);
		$validacao = cliente_enderecos_ValidarCampo($validacao,$pEndereco["Complemento"],"Complemento",$Id);
		$validacao = cliente_enderecos_ValidarCampo($validacao,$pEndereco["Numero"],"Numero",$Id);
        $validacao = cliente_enderecos_ValidarCampo($validacao,$pEndereco["CEP"],"CEP",$Id);
		
		return $validacao;
        
	} 
    
    function cliente_enderecos_ValidarCampo($pValidacao,$pCampo,$pCampoNome,$pId){
		
		$ci = get_instance();
		
		if($pCampo != ""){
		}
		else{
			
			$pValidacao["IsValidado"] = false;
			array_push($pValidacao["erros"],"O campo '".$pCampoNome."' Obrigatório");
			
		}
		
		return $pValidacao;
	}
