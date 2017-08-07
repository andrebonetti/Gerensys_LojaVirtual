<?php
	class produto_model extends CI_Model {
		
        function Listar($pData = null){
        	
        	$ci = get_instance();
        	
        	// TB
            $this->db->from("tb_produto");
            
			// WHERE		
			if(isset($pData["Id"])){								$this->db->where("tb_produto.Id",							$pData["Id"]);}	
			if(isset($pData["!Id"])){								$this->db->where("tb_produto.Id !=",						$pData["!Id"]);}	
			if(isset($pData["Codigo"])){							$this->db->where("tb_produto.Codigo",						$pData["Codigo"]);}	
			if(isset($pData["Descricao"])){							$this->db->like("tb_produto.Descricao",						$pData["Descricao"]);}	
			if(isset($pData["UnidadeApresentacao"]["Id"])){			$this->db->where("tb_produto.IdUnidadeApresentacao",		$pData["UnidadeApresentacao"]["Id"]);}	
			if(isset($pData["Grupo"]["Id"])){						$this->db->where("tb_produto.IdGrupo",						$pData["Grupo"]["Id"]);}	
			if(isset($pData["Grupo"]["SubGrupo"]["Id"])){			$this->db->where("tb_produto.IdSubGrupo",					$pData["Grupo"]["SubGrupo"]["Id"]);}	
			if(isset($pData["Setor"]["Id"])){						$this->db->where("tb_produto.IdSetor",						$pData["Setor"]["Id"]);}	
			if(isset($pData["Cor"]["Id"])){							$this->db->where("tb_produto.IdCor",						$pData["Cor"]["Id"]);}	
			if(isset($pData["Marca"]["Id"])){						$this->db->where("tb_produto.IdMarca",						$pData["Marca"]["Id"]);}	
			if(isset($pData["Fornecedor"]["Id"])){					$this->db->where("tb_produto.IdFornecedor",					$pData["Fornecedor"]["Id"]);}	
			if(isset($pData["Tipo"]["Id"])){						$this->db->where("tb_produto.IdTipo",						$pData["Tipo"]["Id"]);}	
			if(isset($pData["MediaClassificacao"])){				$this->db->where("tb_produto.MediaClassificacao",			$pData["MediaClassificacao"]);}	
			if(isset($pData["EstoqueTotal"])){						$this->db->where("tb_produto.EstoqueTotal",					$pData["EstoqueTotal"]);}	
			if(isset($pData["NumeroMaximoParcelas"])){				$this->db->where("tb_produto.NumeroMaximoParcelas",			$pData["NumeroMaximoParcelas"]);}	
			if(isset($pData["JurosAPartirDe"])){					$this->db->where("tb_produto.JurosAPartirDe",				$pData["JurosAPartirDe"]);}	
			if(isset($pData["PorcentagemJuros"])){					$this->db->where("tb_produto.PorcentagemJuros",				$pData["PorcentagemJuros"]);}	
			if(isset($pData["PorcentagemJuros"])){					$this->db->where("tb_produto.PorcentagemJuros",				$pData["PorcentagemJuros"]);}	
			if(isset($pData["CST_CSOSNId_NCM_SHIdCest"]["Id"])){	$this->db->where("tb_produto.Id_CST_CSOSNId_NCM_SHIdCest",	$pData["CST_CSOSNId_NCM_SHIdCest"]["Id"]);}	
			if(isset($pData["TipoPrecoApresentacao"]["Id"])){		$this->db->where("tb_produto.IdTipoPrecoApresentacao",		$pData["TipoPrecoApresentacao"]["Id"]);}	
			if(isset($pData["Detalhes"])){							$this->db->like("tb_produto.Detalhes",						$pData["Detalhes"]);}	
			if(isset($pData["Informacoes_Adicionais"])){			$this->db->like("tb_produto.Informacoes_Adicionais",		$pData["Informacoes_Adicionais"]);}	
			if(isset($pData["PesoLiquido"])){						$this->db->where("tb_produto.PesoLiquido",					$pData["PesoLiquido"]);}	
			if(isset($pData["PesoBruto"])){							$this->db->where("tb_produto.PesoBruto",					$pData["PesoBruto"]);}	
			
			if(isset($pData["IdUsuarioInclusao"])){					$this->db->where("tb_produto.IdUsuarioInclusao",			$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){				$this->db->where("tb_produto.IdUsuarioAlteracao",			$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){					$this->db->where("tb_produto.DataInclusao >=",				$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){					$this->db->where("tb_produto.DataInclusao <=",				$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){					$this->db->where("tb_produto.DataAlteracao >=",				$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){					$this->db->where("tb_produto.DataAlteracao <=",				$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){						$this->db->where("tb_produto.IdOrigem <=",					$pData["Origem"]["Id"]);}
				
			// --- JOIN ---
            if( (isset($pData["Join"])) && ($pData["Join"] == true) ){
                
            	$query_select = "";
            	
            	$this->db->join("tb_produto_preco AS Preco", "Preco.IdProduto = tb_produto.Id and Preco.IdTipoPreco = tb_produto.IdTipoPrecoApresentacao","inner");
            	$this->db->join("tb_produto_fotos AS Fotos", "Fotos.IdProduto = tb_produto.Id and Fotos.Ordem = 1","left");
                $this->db->join("tb_produto_fotos AS Fotos2", "Fotos2.IdProduto = tb_produto.Id and Fotos2.Ordem = 2","left");
            	$this->db->join("tb_produto_promocao AS Promocao", "Promocao.IdProduto = tb_produto.Id","left");// -- ADD Vigencia --
            	
                //tb_cliente_favoritos
            	$query_select = "tb_produto.*
            	,Preco.IdTipoPreco, Preco.Preco
            	,Fotos.NomeArquivo AS FotoPrincipal
                ,Fotos2.NomeArquivo AS FotoSecundaria
            	,Promocao.PorcentagemDesconto AS PromocaoPorcentagemDesconto
            	,Promocao.PrecoFixoDesconto AS PromocaoPrecoFixoDesconto";
            	
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
                    
                    if ( (isset($pData["ClienteLogado"])) && ( !empty($pData["ClienteLogado"])) ){
                    
                        $this->db->join("tb_cliente_favoritos AS Favoritos", "Favoritos.IdProduto = tb_produto.Id AND Favoritos.IdCliente = {$pData["ClienteLogado"]["Id"]}","left");
                        
                        $query_select = $query_select."
                        ,Favoritos.Id AS IdFavorito";
                        
                    }
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
			
			// ----- Count -----
			if( (isset($pData["IsCount"])) && ($pData["IsCount"] == true) ){
				return $this->db->count_all_results();  
			}	
			
			// ----- RETORNO -----*/
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