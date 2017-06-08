<?php

	function produtos_getPosts(){
        
		$ci = get_instance();
        
        /*$data["Descricao"] 	= $ci->input->post("descricao");	
        $data["Valor"]		= valor_decimal($ci->input->post("valor"));		
        $data["Ano"]        = $ci->input->post("ano");	
        $data["Mes"]  		= $ci->input->post("mes");
		$data["DataCompra"]  		= dataPtBrParaMysql($ci->input->post("dataCompra"));*/
      
		return $data;	
    
    }
    
    function Listar_TabelasFilhas(){
        	
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
