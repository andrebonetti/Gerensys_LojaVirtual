<?php
	class Produto_Destaques_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
			
			// TB
			$this->db->from("tb_produto_destaques");	
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_produto_destaques.Id",					$pData["Id"]);}	
			if(isset($pData["IdTipoPreco"])){		$this->db->where("tb_produto_destaques.Codigo",				$pData["IdTipoPreco"]);}	
			if(isset($pData["Produto"]["Id"])){		$this->db->where("tb_produto_destaques.IdProduto",			$pData["Produto"]["Id"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_produto_destaques.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_produto_destaques.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_produto_destaques.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_produto_destaques.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_produto_destaques.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_produto_destaques.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_produto_destaques.IdOrigem <=",		$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("tb_produto_destaques.Ordem");
			}
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$query_select = "";
                	
                	$this->db->join("tb_produto AS Produto", "Produto.Id = tb_produto_destaques.IdProduto","inner");
                    
                    $query_select = "tb_produto_destaques.*,Produto.*";
                    
                    if ( (isset($pData["IsAdm"])) && ($pData["IsAdm"] == true) ){
						
                		$this->db->join("tb_usuarios AS UI", "UI.Id = tb_produto_destaques.IdUsuarioInclusao","inner");
                    	$this->db->join("tb_usuarios AS UA", "UA.Id = tb_produto_destaques.IdUsuarioAlteracao","left");
                    	$this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_produto_destaques.IdOrigem","inner");
                		
                		/* SELECT */
	                    $query_select = $query_select."
						,UI.Nome AS NomeUI,UI.Email AS EmailUI
						,UA.Nome AS NomeUA,UA.Email AS EmailUA
						,Origem.Descricao AS DescricaoOrigem";
					}
                	
                    // --- SELECT ---
                    $this->db->select($query_select, false);
				}
			}
			
			// ----- RETURN ----- 
			// -- IsBusca --
			if( (isset($pData["IsBusca"])) && ($pData["IsBusca"] == true) ){
				
                $data = $this->db->get()->row_array();
                
			}
			else{
				
				$data = $this->db->get()->result_array();
				
			}
			
			// -- lJoin --
			if( (isset($pData["lJoin"])) && ($pData["lJoin"] == true) ){
            	
            	if( (isset($pData["IsBusca"])) && ($pData["IsBusca"] == true) ){
            		
            		$pData["Produto"]["Id"] = $data["IdProduto"];
					$data["Produto"]	= $this->Produto_model	->Listar($pData["Produto"]);
					
				}
				else{
					
					$n = 0;
					foreach($data as $itemData){
						
						$pData["Produto"]["Id"] = $itemData["IdProduto"];
						$data[$n]["Produto"]	= $this->Produto_model	->Listar($pData["Produto"]);
						
						$n++;
					}
					
				}
				
			}
			
            return $data;    
	    }
		
		// -- INSERT -- //
	    function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_produto_destaques", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
			
			return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_produto_destaques", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
		}
	
	}
?>