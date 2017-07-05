<?php
	class produto_model extends CI_Model {
		
        function Listar($pData = null){
        	
        	$ci = get_instance();
        	
        	// TB
            $this->db->from("tb_produto");
			
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_produto.Id",					$pData["Id"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_produto.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_produto.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_produto.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_produto.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_produto.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_produto.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_produto.IdOrigem <=",		$pData["Origem"]["Id"]);}
				
			// --- JOIN ---
            if( (isset($pData["Join"])) && ($pData["Join"] == true) ){
                
            	$query_select = "";
            	
            	$this->db->join("tb_produto_preco AS Preco", "Preco.IdProduto = tb_produto.Id and Preco.IdTipoPreco = tb_produto.IdTipoPrecoApresentacao","inner");
            	$this->db->join("tb_produto_fotos AS Fotos", "Fotos.IdProduto = tb_produto.Id and IsPrincipal = 1","left");
            	
            	$query_select = "tb_produto.*
            	,Preco.IdTipoPreco, Preco.Preco
            	,Fotos.NomeArquivo AS FotoPrincipal";
            	
                if ( (isset($pData["IsDescricao"])) && ($pData["IsDescricao"] == true) ){
                	
                	$this->db->join("tb_grupo AS Grupo", "Grupo.Id = tb_produto.IdGrupo","left");
            		$this->db->join("tb_subgrupo AS SubGrupo", "SubGrupo.Id = tb_produto.IdSubGrupo","left");
            		$this->db->join("tb_setor AS Setor", "Setor.Id = tb_produto.IdSetor","left");
            		$this->db->join("tb_marca AS Marca", "Marca.Id = tb_produto.IdMarca","left");
            		$this->db->join("tb_tipo AS Tipo", "Tipo.Id = tb_produto.IdTipo","left");
            		
            		$query_select = $query_select."
            		,Grupo.Descricao AS DescricaoGrupo
            		,SubGrupo.Descricao AS DescricaoSubGrupo
            		,Setor.Descricao AS DescricaoSetor
            		,Marca.Descricao AS DescricaoMarca
            		,Tipo.Descricao AS DescricaoTipo";
				}
                
                if ( (isset($pData["IsAdm"])) && ($pData["IsAdm"] == true) ){
					
            		$this->db->join("tb_grupo AS Grupo", "Grupo.Id = tb_produto.IdGrupo","left");
            		$this->db->join("tb_subgrupo AS SubGrupo", "SubGrupo.Id = tb_produto.IdSubGrupo","left");
            		$this->db->join("tb_setor AS Setor", "Setor.Id = tb_produto.IdSetor","left");
            		$this->db->join("tb_marca AS Marca", "Marca.Id = tb_produto.IdMarca","left");
            		$this->db->join("tb_tipo AS Tipo", "Tipo.Id = tb_produto.IdTipo","left");
            		$this->db->join("tb_produto_preco AS Preco", "Preco.IdProduto = tb_produto.Id and Preco.IdTipoPreco = tb_produto.IdTipoPrecoApresentacao","inner");
            		$this->db->join("tb_tipopreco AS TipoPreco", "TipoPreco.Id = Preco.IdTipoPreco","inner");

					$this->db->join("tb_sys_unidadeapresentacao AS UN", "UN.Id = tb_produto.IdUnidadeApresentacao","inner");
					$this->db->join("tb_cst_csosn AS CST", "CST.Id = tb_produto.Id_CST_CSOSN","inner");
                	$this->db->join("tb_sys_cst_csosn_origem AS CST_Origem", "CST_Origem.Id = CST.IdCst_Csosn_Origem","inner");
                	$this->db->join("tb_sys_cst_csosn_situacaotributaria AS CST_ST", "CST_ST.Id = CST.IdCst_Csosn_SituacaoTributaria","inner");
                	$this->db->join("tb_sys_estado AS UF_CST", "UF_CST.Id = CST.IdEstado","inner");
                	$this->db->join("tb_sys_ncm_sh AS NCM", "NCM.Id = tb_produto.Id_NCM_SH","inner");
                	$this->db->join("tb_sys_cest AS CEST", "CEST.Id = tb_produto.IdCest","left");
					$this->db->join("tb_usuarios AS UI", "UI.Id = tb_produto.IdUsuarioInclusao","inner");
                	$this->db->join("tb_usuarios AS UA", "UA.Id = tb_produto.IdUsuarioAlteracao","left");
                	$this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_produto.IdOrigem","inner");
                
                	$query_select = $query_select."
            		,Grupo.Descricao AS DescricaoGrupo
            		,SubGrupo.Descricao AS DescricaoSubGrupo
            		,Setor.Descricao AS DescricaoSetor
            		,Marca.Descricao AS DescricaoMarca
            		,Tipo.Descricao AS DescricaoTipo
            		,UN.Codigo AS CodigoUnidadeApresentacao,UN.Descricao AS DescricaoUnidadeApresentacao
                	,CST_Origem.Codigo AS CodigoCST_CSOSN_Origem, CST_Origem.Descricao AS DescricaoCST_CSOSN_Origem
                    ,CST_ST.Codigo AS CodigoCST_CSOSN_SituacaoTributaria, CST_ST.Descricao AS DescricaoCST__CSOSN_SituacaoTributaria
                    ,UF_CST.UF AS CodigoUF_CST_CSOSN,UF_CST.Descricao AS DescricaoUF_CST_CSOSN
                    ,CST.Aliquota AS Aliquota_CST_CSOSN
                    ,NCM.Codigo AS Codigo_NCM,NCM.Descricao AS Descricao_NCM
                    ,CEST.Codigo AS CodigoCest
                    ,UI.Nome AS NomeUsuarioInclusao
                	,UA.Nome AS NomeUsuarioAlteracao
                	,Origem.Descricao AS OrigemProduto";
            	}
				
                // --- SELECT ---
                $this->db->select($query_select, false);
            }
            
            // -- ORDER BY  --
            if(isset($pData["OrderBy"])){
            	
            	if( !isset($pData["OrderByRegra"])){
					$pData["OrderByRegra"] = "asc";
				}
            	
            	$this->db->order_by($pData["OrderBy"],$pData["OrderByRegra"]);
            }
            
            // -- LIMIT  --
            if(isset($pData["Limite"])){
            	
            	if( isset($pData["OffSet"]) ){
					$this->db->limit($pData["Limite"],$pData["OffSet"]);
				}
				else{
					$this->db->limit($pData["Limite"]);
				}
            	
			}
			
			// ----- RETURN -----
			// -- IsBusca --
			if( (isset($pData["IsBusca"])) && ($pData["IsBusca"] == true) ){
				
                $lProduto = $this->db->get()->row_array();
                
			}
			else{
				
				$lProduto = $this->db->get()->result_array();
				
			}
			
            if( (isset($pData["lJoin"])) && ($pData["lJoin"] == true) ){
            	
            	// IsBusca
				if( (isset($pData["IsBusca"])) && ($pData["IsBusca"] == true) ){
					
	                if( isset($pData["lJoinCompleto"]) && $pData["lJoinCompleto"] == true ){
							
						$lProduto["Fotos"] 					= $this->Produto_Fotos_model				->Listar(array("Join" => true,"Produto" => $lProduto));
						$lProduto["Precos"] 				= $this->Produto_Preco_model				->Listar(array("IsBusca" => true, "Join" => true,"Produto" => $lProduto));
						$lProduto["Promocao"] 				= $this->Produto_Promocao_model				->Listar(array("Join" => true,"IsVigente" => true,"Produto" => $lProduto));
						
						if ( (isset($pData["IsDescricao"]) && $pData["IsDescricao"] == true ) or (isset($pData["IsAdm"]) && $pData["IsAdm"] == true )  ){
							$lProduto["CodigosAlternativos"]= $this->Produto_CodigosAlternativos_model	->Listar(array("Join" => true,"Produto" => $lProduto));
							$lProduto["Comentarios"] 		= $this->Produto_Comentarios_model			->Listar(array("Join" => true,"Produto" => $lProduto));
						}
					
					}
					else{
						
						$lProduto["Fotos"] 					= $this->Produto_Fotos_model				->Listar(array("Produto" => $lProduto));
						$lProduto["Precos"] 					= $this->Produto_Preco_model				->Listar(array("IsBusca" => true,"Produto" => $lProduto));
						$lProduto["Promocao"] 				= $this->Produto_Promocao_model				->Listar(array("Produto" => $lProduto));
						
						if ( (isset($pData["IsDescricao"]) && $pData["IsDescricao"] == true ) or (isset($pData["IsAdm"]) && $pData["IsAdm"] == true )  ){
							$lProduto["CodigosAlternativos"]= $this->Produto_CodigosAlternativos_model	->Listar(array("Produto" => $lProduto));
							$lProduto["Comentarios"] 		= $this->Produto_Comentarios_model			->Listar(array("Produto" => $lProduto));
						}
						
					}
				}
				else{
					
					$n = 0;
	            	foreach($lProduto as $itemProduto){
						
						if( isset($pData["IsJoinCompleto"]) && $pData["IsJoinCompleto"] == true ){
							
							$lProduto[$n]["Fotos"] 					= $this->Produto_Fotos_model				->Listar(array("Join" => true,"Produto" => $itemProduto));
							$lProduto[$n]["Precos"] 					= $this->Produto_Preco_model				->Listar(array("IsBusca" => true, "Join" => true,"Produto" => $itemProduto));
							$lProduto[$n]["Promocao"] 				= $this->Produto_Promocao_model				->Listar(array("Join" => true,"IsVigente" => true,"Produto" => $itemProduto));
							
							if ( (isset($pData["IsDescricao"]) && $pData["IsDescricao"] == true ) or (isset($pData["IsAdm"]) && $pData["IsAdm"] == true )  ){
								$lProduto[$n]["CodigosAlternativos"]= $this->Produto_CodigosAlternativos_model	->Listar(array("Join" => true,"Produto" => $itemProduto));
								$lProduto[$n]["Comentarios"] 		= $this->Produto_Comentarios_model			->Listar(array("Join" => true,"Produto" => $itemProduto));
							}
						
						}
						else{
							
							$lProduto[$n]["Fotos"] 					= $this->Produto_Fotos_model				->Listar(array("Produto" => $itemProduto));
							$lProduto[$n]["Precos"] 					= $this->Produto_Preco_model				->Listar(array("IsBusca" => true,"Produto" => $itemProduto));
							$lProduto[$n]["Promocao"] 				= $this->Produto_Promocao_model				->Listar(array("Produto" => $itemProduto));
							
							if ( (isset($pData["IsDescricao"]) && $pData["IsDescricao"] == true ) or (isset($pData["IsAdm"]) && $pData["IsAdm"] == true )  ){
								$lProduto[$n]["CodigosAlternativos"]= $this->Produto_CodigosAlternativos_model	->Listar(array("Produto" => $itemProduto));
								$lProduto[$n]["Comentarios"] 		= $this->Produto_Comentarios_model			->Listar(array("Produto" => $itemProduto));
							}
							
						}
						
						$n++;
						
					}
				}
				
				
			}
			
			return $lProduto;
        }
        
		// -- INSERT -- //
	    function Incluir($pData){
	    	
	        $pData["Id"] = null;
			$this->db->insert("tb_produto", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
			
			return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_produto", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
		}	
	}	