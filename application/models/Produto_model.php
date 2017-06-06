<?php
	class produto_model extends CI_Model {
		
        function Listar($pData = null,$pOrderBy = null){
        	
        	$ci = get_instance();
            
			/* -- PREENCHER ENTIDADES FILHAS -- */
            if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                    
                    /* JOIN */
                    $this->db->join("tb_unidadeapresentacao AS UN", "UN.Id = tb_produto.IdUnidadeApresentacao","inner");
                    $this->db->join("tb_grupo AS Grupo", "Grupo.Id = tb_produto.IdGrupo","left");
                    $this->db->join("tb_subgrupo AS SubGrupo", "SubGrupo.Id = tb_produto.IdSubGrupo","left");
                    $this->db->join("tb_setor AS Setor", "Setor.Id = tb_produto.IdSetor","left");
                    $this->db->join("tb_fornecedor AS Fornecedor", "Fornecedor.Id = tb_produto.IdFornecedor","left");
                    $this->db->join("tb_tipo AS Tipo", "Tipo.Id = tb_produto.IdTipo","left");
                    $this->db->join("tb_cst_csosn AS CST", "CST.Id = tb_produto.Id_CST_CSOSN","inner");
                    $this->db->join("tb_ncm_sh AS NCM", "NCM.Id = tb_produto.Id_NCM_SH","inner");
                    $this->db->join("tb_cest AS CEST", "CEST.Id = tb_produto.IdCest","left");
                    $this->db->join("tb_preco AS PRECO", "PRECO.IdProduto = tb_produto.Id and PRECO.IdTipoPreco = tb_produto.IdTipoPrecoApresentacao","inner");
                    $this->db->join("tb_tipopreco AS TipoPreco", "TipoPreco.Id = PRECO.IdTipoPreco","inner");
                    $this->db->join("tb_usuarios AS UI", "UI.Id = tb_produto.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_produto.IdUsuarioAlteracao","left");
                    $this->db->join("tb_origem AS Origem", "Origem.Id = tb_produto.IdOrigem","inner");
                    
                    /* SELECT */
                    $this->db->select("
                    tb_produto.*
                    ,UN.Codigo AS CodigoUnidadeApresentacao,UN.Descricao AS DescricaoUnidadeApresentacao
                    ,Grupo.Descricao AS DescricaoGrupo
                    ,SubGrupo.Descricao AS DescricaoSubGrupo
                    ,Setor.Descricao AS DescricaoSetor
                    ,Fornecedor.Descricao AS DescricaoFornecedor
                    ,Tipo.Descricao AS DescricaoTipo
                    ,CST.Codigo AS Codigo_CST_CSOSN,CST.UF AS UF_CST_CSOSN,CST.Aliquota AS Aliquota_CST_CSOSN
                    ,NCM.Codigo AS Codigo_NCM,NCM.Descricao AS Descricao_NCM
                    ,CEST.Codigo AS CodigoCest
                    ,PRECO.IdTipoPreco, PRECO.Preco
                    ,TipoPreco.Descricao AS TipoPrecoDescricao
                    ,UI.Nome AS NomeUsuarioInclusao
                    ,UA.Nome AS NomeUsuarioAlteracao
                    ,Origem.Descricao AS OrigemProduto
                    ", false);
                }
                  
            }
            
            // TB
            $this->db->from("tb_produto");

			/* -- RETURN -- */
            if($pData["Join"] == true){
            	
            	// IsBusca
				if(isset($pData["IsBusca"])){
	                
	                if($pData["IsBusca"] == true){
	                	$lProduto = $this->db->get()->row_array();
					}
					else{
						$lProduto = $this->db->get()->result_array();
					}
				}
				else{
					$lProduto = $this->db->get()->result_array();
				}

            	$n = 0;
            	foreach($lProduto as $itemProduto){
				
					$lProduto[$n]["Fotos"] 		= $this->Fotos_produtos_model	->Listar(array("Join" => true,"Produto" => $itemProduto),"NomeArquivo");
					$lProduto[$n]["Preco"] 		= $this->Preco_model			->Listar(array("Join" => true,"Produto" => $itemProduto),"IdTipoPreco");
					$lProduto[$n]["Promocao"] 	= $this->Promocao_model			->Listar(array("Join" => true,"Produto" => $itemProduto));
					
					//var_dump($itemProduto);
					$n++;
					
				}
				
				return $lProduto;
			}
			else{
				
				// IsBusca
				if(isset($pData["IsBusca"])){
	                
	                if($pData["IsBusca"] == true){
	                	return $this->db->get()->row_array();
					}
					else{
						return $this->db->get()->result_array();
					}
				}
				else{
					return $this->db->get()->result_array();
				}
				
			}
        }
			
		// -- INSERT -- //
	    function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_produto", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_produto", $pData);
		}	
	}	