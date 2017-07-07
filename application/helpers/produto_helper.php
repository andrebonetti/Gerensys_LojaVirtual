<?php

    // Validacao
    function produto_Validar($pData){
        
        $ci = get_instance();
        
        $validacao 					= array();
        $validacao["IsValidado"] 	= true;
        $validacao["lMensagem"] 	= array();

		$validacao = ValidarCampo('Código',$pData["Codigo"],$validacao);
		$validacao = ValidarCampo('Descricao',$pData["Descricao"],$validacao);
		$validacao = ValidarCampo('Preco',$pData["Preco"],$validacao);
		$validacao = ValidarBaseDados('CST/CSOSN','tb_cst_csosn',$pData["CST"],$validacao);
		$validacao = ValidarBaseDados('NCM/SH','tb_ncm_sh',$pData["Ncm_Sh"],$validacao);
        $validacao = ValidarBaseDados('Unidade de Apresentação','tb_unidadeapresentacao',$pData["UnidadeApresentacao"],$validacao);
        
		return $validacao;	
    
    }
    
    // Tabelas Filhas
    function produto_Listar_TabelasFilhas(){
        	
    	$ci = get_instance();
        
		$tabelasFilhas["lCodigosAlternativos"] 			= $ci->CodigosAlternativos_model				->Listar( array("Join" => true) );
		$tabelasFilhas["lCst_Csosn"] 					= $ci->Cst_Csosn_model							->Listar( array("Join" => true) );
		$tabelasFilhas["lFornecedor"] 					= $ci->Fornecedor_model							->Listar( array("Join" => true) );
		$tabelasFilhas["lFotos_Produtos"] 				= $ci->Fotos_produtos_model						->Listar( array("Join" => true) );
		$tabelasFilhas["lGrupo"] 						= $ci->Grupo_model								->Listar( array("Join" => true) );
		$tabelasFilhas["lPreco"] 						= $ci->Preco_model								->Listar( array("Join" => true) );
		$tabelasFilhas["lPromocao"] 					= $ci->Promocao_model							->Listar( array("Join" => true) );
		$tabelasFilhas["lSetor"] 						= $ci->Setor_model								->Listar( array("Join" => true) );
		$tabelasFilhas["lSubGrupo"] 					= $ci->SubGrupo_model							->Listar( array("Join" => true) );
		$tabelasFilhas["lTipo"] 						= $ci->Tipo_model								->Listar( array("Join" => true) );
		$tabelasFilhas["lTipoPreco"] 					= $ci->TipoPreco_model							->Listar( array("Join" => true) );
		$tabelasFilhas["lCest"] 						= $ci->Sys_Cest_model							->Listar( array("Join" => true) );
		$tabelasFilhas["lUnidadeApresentacao"] 			= $ci->Sys_UnidadeApresentacao_model			->Listar( array("Join" => true) );
		$tabelasFilhas["lCst_Csosn_Origem"] 			= $ci->Sys_Cst_Csosn_Origem_model				->Listar( array("Join" => true) );
		$tabelasFilhas["lCst_Csosn_SituacaoTributaria"] = $ci->Sys_Cst_Csosn_SituacaoTributaria_model	->Listar( array("Join" => true) );
		$tabelasFilhas["lNcm_sh"] 						= $ci->Sys_Ncm_Sh_model							->Listar( array("Join" => true) );
		
		return($tabelasFilhas);
    }
    
	// CRUD
	function produto_Salvar($pData,$pParametros){
		
		$validacao 	= produto_Validar($pData);	
			
		//VALIDACAO		
		if($validacao["IsValidado"] == true){
			
			try {
			
		        // INCLUIR
		        if($pParametros["Acao"] == "Incluir"){
		        	produto_Incluir($pData,$pParametros);
				}
				
				//ALTERAR
				if($pParametros["Acao"] == "Alterar"){
					produto_Alterar($pData,$pParametros);
				}
				
			}
			catch (Exception $ex){
				throw $ex;
			}
			
		}
		else{
			
			foreach($validacao["lMensagem"] as $itemMensagem){
					
				echo $itemMensagem;
			
			}
			
		}
        
		return $pData;			
	}
	
	function produto_Incluir($pData,$pParametros){
		
		$ci = get_instance();
		
		//PREPARA $data
		$data = array();
		
		$data["Codigo"] 					= $pData["Codigo"];
        $data["Descricao"]					= $pData["Descricao"];
        $data["IdUnidadeApresentacao"]		= $pData["UnidadeApresentacao"]["Id"];
        $data["IdFornecedor"]				= $pData["Fornecedor"]["Id"];
        $data["IdGrupo"]					= $pData["Grupo"]["Id"];
        $data["IdTipo"]						= $pData["Tipo"]["Id"];
        $data["Id_CST_CSOSN"] 				= $pData["CST"]["Id"];
        $data["Id_NCM_SH"]					= $pData["Ncm_Sh"]["Id"];
        
        $data["IdUsuarioInclusao"] = 1;//TEMP
    	date_default_timezone_set('America/Sao_Paulo');
		$data["DataInclusao"] = date('Y-m-d H:i');
    	$data["IdOrigem"] = 1;
    	
		
		$idProduto = $ci->Produto_model -> Incluir($data);
	
		if($pParametros["SalvarEntidadesFilhas"] == true){
			
			// Codigos Alternativos
			foreach($pData["CodigosAlternativos"] as $itemCodigoAlternativo){
	    		
	    		$itemCodigoAlternativo["IdProduto"] = $idProduto;
	    			
				codigosAlternativos_Salvar($itemCodigoAlternativo,array("Acao" => "Incluir"));
			}
			
			// Preco
			foreach($pData["Preco"] as $itemPreco){
	    		
	    		$itemPreco["IdProduto"] = $idProduto;
	    			
				preco_Salvar($itemPreco,array("Acao" => "Incluir"));
			}
			
		}
			
	}
	
	// OUTROS
	function produto_GetPosts(){
        
		$ci = get_instance();
        
        $data["Codigo"] 							= $ci->input->post("Codigo");	
        
        $n_codigos_alterativos 		 				= $ci->input->post("n_codigos_alterativos");	
		$data["CodigosAlternativos"] 				= array();	
		for($n = 1;$n <= $n_codigos_alterativos; $n++){
			
			$codigoAlternativo = array();
			$codigoAlternativo["Codigo"] = $ci->input->post("CodigosAlternativos".$n);
			
			if($codigoAlternativo["Codigo"] != null){
				
				array_push($data["CodigosAlternativos"],$codigoAlternativo);
				
			}

		}

        $data["Descricao"]							= $ci->input->post("Descricao");		
        $data["UnidadeApresentacao"]["Id"]			= $ci->input->post("UnidadeApresentacao");	
        $data["Fornecedor"]["Id"]					= $ci->input->post("Fornecedor");
        $data["Grupo"]["Id"]						= $ci->input->post("Grupo");
        $data["Tipo"]["Id"]							= $ci->input->post("Tipo");
        
        /* ------------------------------ CST ------------------------------ */
        $CST["CodigoCompleto"]						= $ci->input->post("CST_CSOSN");
        $CST["CST_CSOSN_Origem"]["Id"]				= $ci->input->post("CST_CSOSN_Origem_Id");
        $CST["CST_CSOSN_SituacaoTributaria"]["Id"]	= $ci->input->post("CST_CSOSN_SituacaoTributaria_Id");
        $CST["Aliquota"]							= valor_decimal($ci->input->post("Aliquota"));
        $CST["Id"]									= valor_decimal($ci->input->post("Id_CST_CSOSN"));
        
        $data["CST"] = $CST;
        
        /* ------------------------------ NCM ------------------------------ */
        $data["Ncm_Sh"]["Id"]						= $ci->input->post("Ncm_Sh_Id");
        $data["Ncm_Sh"]["Descricao"]				= $ci->input->post("Ncm_Sh");
        
        /* ------------------------------ CEST ------------------------------ */
        $data["Cest"]["Id"]							= $ci->input->post("Cest_Id");
        $data["Cest"]["Descricao"]					= $ci->input->post("Cest");
        
        /* ------------------------------ PRECO ------------------------------ */
        $data["Preco"]								= array();
        
        $preco 										= array();
        $preco["TipoPreco"]["Id"] 					= $ci->input->post("TipoPreco"); 
        $preco["Preco"] 							= valor_decimal($ci->input->post("Preco"));
        
        array_push($data["Preco"],$preco);
        
		return $data;	
    
    }

	function produto_CalcularParcela($pNumeroParcelas,$pJurosAPartirDe,$pPorcentagemJuros,$pPreco){
		
		$retorno = 0;
		
		if($pNumeroParcelas > 0){
			
			if($pJurosAPartirDe > 0){
				
				$precoFinal = $pPreco * (1 + ($pPorcentagemJuros/100));
				$retorno = $precoFinal / $pNumeroParcelas;
				
			}
			else{
				
				$retorno = $pPreco / $pNumeroParcelas;
					
			}
			
		}

		return $retorno;
	}
	
	function produto_HasSession(){
		
		/*$ci = get_instance();
		
		if( !empty($ci->session->userdata()){
			return "active";
		}*/
	}
	
	function produto_activeFiltro($pFiltro){
		
		$ci = get_instance();
		
		if( !empty($ci->session->userdata($pFiltro))){
			return "active";
		}
	}
	
	function produto_activeFiltroValor($pFiltro, $pValor){
		
		$ci = get_instance();
		
		if( !empty($ci->session->userdata($pFiltro))){
			if( $ci->session->userdata($pFiltro) == $pValor ){
				 return "active";
			}
		}
	}
	
	function produto_PreencherFiltroSession($pProdutoData){
		
		$ci = get_instance();
		
		$filtros = array();
		
		if( !empty($ci->session->userdata("IdSetor")))		{$pProdutoData["Setor"]["Id"] 				= $ci->session->userdata("IdSetor");}
		if( !empty($ci->session->userdata("IdCor")))		{$pProdutoData["Cor"]["Id"] 				= $ci->session->userdata("IdCor");}
		if( !empty($ci->session->userdata("IdGrupo")))		{$pProdutoData["Grupo"]["Id"] 				= $ci->session->userdata("IdGrupo");}
		if( !empty($ci->session->userdata("IdMarca")))		{$pProdutoData["Marca"]["Id"] 				= $ci->session->userdata("IdMarca");}
		if( !empty($ci->session->userdata("IdSubGrupo")))	{$pProdutoData["Grupo"]["SubGrupo"]["Id"] 	= $ci->session->userdata("IdSubGrupo");}
		
		return $pProdutoData;
	}
	
	function produto_PreencherBreadCrumb($pFiltro,$pValor,$pNomeFiltro,$pDescricao){
		
		$ci = get_instance();
			
		// --- Count --- 
		$sessaoFiltro			= $ci->session->userdata($pFiltro);
		
		if( !empty($sessaoFiltro)){
			
			if($sessaoFiltro == $pValor){
				
				if( empty($ci->session->userdata("breadcrumb{$pNomeFiltro}"))){
					
					$sessaoBreadCrumbCount  = $ci->session->userdata("BreadCrumbCount");
					
					if( empty($sessaoBreadCrumbCount)){//-- If NAO Existe BreadCrumb			
						$sessaoBreadCrumbCount = 1;
					
						echo $ci->session->userdata("breadcrumb1Link")." - ".$ci->session->userdata("breadcrumb1Descricao")."<br>";
					}
					else{	
						$sessaoBreadCrumbCount++;
					}
					
					$ci->session->set_userdata("BreadCrumbCount",$sessaoBreadCrumbCount);
					$ci->session->set_userdata("breadcrumb{$pNomeFiltro}","1");
					$ci->session->set_userdata("breadcrumb{$sessaoBreadCrumbCount}Link","Produtos/LimpezaFiltro/{$sessaoBreadCrumbCount}");
					$ci->session->set_userdata("breadcrumb{$sessaoBreadCrumbCount}Descricao","$pDescricao");
					$ci->session->set_userdata("breadcrumb{$sessaoBreadCrumbCount}Filtro","$pFiltro");
				}
			
			}
		}
		
	}
	
	function produto_PreencherArrayBreadCrumb(){
		
		$ci = get_instance();
		
		// --- Count --- 
		$sessaoBreadCrumbCount = $ci->session->userdata('BreadCrumbCount');
		
		$dataBreadCrumb = array();
		
		if( !empty($sessaoBreadCrumbCount)){//-- If Existe BreadCrumb	
		
			for($n = 1;$n <= $sessaoBreadCrumbCount;$n++){
				
				$bread["Link"] 		= $ci->session->userdata("breadcrumb{$n}Link");
				$bread["Descricao"] = $ci->session->userdata("breadcrumb{$n}Descricao");
				
				array_push($dataBreadCrumb,$bread);
			}	
		}
		
		return $dataBreadCrumb;
		
	}
	
	function Verifica_DestroySessao($pParametro){
		
		$ci = get_instance();
		
		if(($pParametro != "produtos_descricao")&&($pParametro != "produtos")){
			$ci->session->sess_destroy();
		}
		
	}