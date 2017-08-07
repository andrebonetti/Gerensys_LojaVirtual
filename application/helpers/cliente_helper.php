<?php
	
	function cliente_GetPosts(){
		
		$ci = get_instance();
		
		$data["Nome"]				= $ci->input->post("nome");		
        $data["Email"]				= $ci->input->post("email");	
        $data["Telefone"]			= $ci->input->post("telefone");
        $data["Senha"]				= $ci->input->post("senha");
        $data["SenhaConfirmacao"]	= $ci->input->post("confirma-senha");
	
		return $data;
	} 

	function cliente_ValidarDados($pCliente,$pTipo = "Incluir"){
		
		$ci = get_instance();
		
		$Id = null;
		if($pTipo == "Alterar"){
			$Id = $pCliente["Id"];
		}
	
		$validacao["IsValidado"] = true;
		$validacao["erros"]		 = array();
		
		$validacao = cliente_ValidarCampo($validacao,$pCliente["Nome"],"Nome",$Id);
		$validacao = cliente_ValidarCampo($validacao,$pCliente["Email"],"Email",$Id);
		$validacao = cliente_ValidarCampo($validacao,$pCliente["Telefone"],"Telefone",$Id);
		
		$validacao = cliente_validarSenha($validacao,$pCliente);
		
		return $validacao;
	}
	
	function cliente_ValidarCampo($pValidacao,$pCampo,$pCampoNome,$pId){
		
		$ci = get_instance();
		
		if($pCampo != ""){
			$dataCliente["$pCampoNome"] = $pCampo;
			
			if($pId != null){
				$dataCliente["!Id"] = $pId;
			}
			
			if( count($ci->Cliente_model->Listar($dataCliente)) > 0 ){
				
				$pValidacao["IsValidado"] = false;
				array_push($pValidacao["erros"],"Ja existe um usuario com este ".$pCampoNome." ({$pCampo})");
				
			}	
		}
		else{
			
			$pValidacao["IsValidado"] = false;
			array_push($pValidacao["erros"],"O campo '".$pCampoNome."' 頯brigat�rio");
			
		}
		
		return $pValidacao;
	}

	function cliente_validarSenha($pValidacao,$pCliente){
		
		if($pCliente["Senha"] != $pCliente["SenhaConfirmacao"]){
			
			$pValidacao["IsValidado"] = false;
			array_push($pValidacao["erros"],"As senhas nao se correspondem");
			
		}
		
		return $pValidacao;
	}
	
	function cliente_validarLogin($pCliente){
		
		$ci = get_instance();
		
		$validacao["IsValidado"] = true;
		$validacao["erros"]		 = array();
		
		if($pCliente["Email"] != ""){
			
			$data["Email"] = $pCliente["Email"];
			
			$cliente = $ci->Cliente_model->Listar($data);
			
			if(empty($cliente)){
				
				$validacao["IsValidado"] = false;
				array_push($validacao["erros"],"Nao foi encontrado nenhum usuario com este Email");
				
			}
		}
		else{
			
			$validacao["IsValidado"] = false;
			array_push($validacao["erros"],"O campo 'Email' 頯brigatorio");
			
		}
		
		if($pCliente["Senha"] != ""){
			
			if($validacao["IsValidado"] == true){
				
				$data["Senha"]   = md5($pCliente["Senha"]);
				$data["IsBusca"] = true;
				
				$cliente = $ci->Cliente_model->Listar($data);
				
				if(empty($cliente)){
					
					$validacao["IsValidado"] = false;
					array_push($validacao["erros"],"Senha incorreta");
					
				}
				else{
					
					$validacao["Cliente"] = $cliente;
				}
				
			}
			
		}
		else{
			
			$validacao["IsValidado"] = false;
			array_push($validacao["erros"],"O campo 'Senha' 頯brigatorio");
			
		}
			
		return $validacao;
	}
	
	function cliente_validarSessao(){
		
		$ci = get_instance();

		$dataCliente["Id"] = $ci->session->userdata("ClienteId");
        
        $cliente = array();
        if( !empty($dataCliente["Id"])){
            $dataCliente["IsBusca"] = true;
		    $cliente = $ci->Cliente_model->Listar($dataCliente);
        }

		return $cliente;
	}

	function cliente_validarAlteracaoSenha($pData){
		
		$ci = get_instance();
		
		$validacao["IsValidado"] = true;
		$validacao["erros"]		 = array();
		
		if($pData["senhaAnterior"] == ""){
			$validacao["IsValidado"] = false;
			array_push($validacao["erros"],"O campo 'Senha Anterior' 頯brigat�rio");
		}
		else{
			
			$dataCliente["Id"] 		= $pData["Id"];		
			$dataCliente["Senha"] 	= md5($pData["senhaAnterior"]);
			
			if( count($ci->Cliente_model->Listar($dataCliente)) < 1 ){
				
				$validacao["IsValidado"] = false;
				array_push($validacao["erros"],"Senha Anterior Incorreta");
			}
			
		}
		
		if($pData["novaSenha"] == ""){
			$validacao["IsValidado"] = false;
			array_push($validacao["erros"],"O campo 'Nova Senha' 頯brigat�rio");
		}
		if($pData["confirmaNovaSenha"] == ""){
			$validacao["IsValidado"] = false;
			array_push($validacao["erros"],"O campo 'Confirmar Nova Senha' 頯brigat�rio");
		}
		
		if( ($pData["novaSenha"] != "") && ($pData["confirmaNovaSenha"] != "") ) {
			
			if($pData["novaSenha"] != $pData["confirmaNovaSenha"]){
				$validacao["IsValidado"] = false;
				array_push($validacao["erros"],"Senhas s㯠Diferentes");
			}
			
		}

		return $validacao;
	}

    function cliente_preencheConteudoHeader($pHeader){
        
        $ci = get_instance();
        
        $dataBuscaFavoritos["Cliente"] = $pHeader["Cliente"];
        $dataBuscaFavoritos["IsCount"] = true;
        
        $data["CountFavoritos"] = $ci->Cliente_Favoritos_model->Listar($dataBuscaFavoritos);
        
        return $data;
    }