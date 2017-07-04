<?php
	class Preco_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_preco.Id",					$pData["Id"]);}	
			if(isset($pData["IdTipoPreco"])){		$this->db->where("tb_preco.Codigo",				$pData["IdTipoPreco"]);}	
			if(isset($pData["Preco"])){				$this->db->where("tb_preco.Preco",				$pData["Preco"]);}	
			if(isset($pData["Produto"]["Id"])){		$this->db->where("tb_preco.IdProduto",			$pData["Produto"]["Id"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_preco.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_preco.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_preco.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_preco.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_preco.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_preco.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_preco.IdOrigem <=",		$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Preco");
			}
			
			// TB
			$this->db->from("tb_preco");	
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_produto AS Produto", "Produto.Id = tb_preco.IdProduto","inner");
                    
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_preco.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_preco.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_preco.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_preco.*
                    ,Produto.*
                    
					,UI.Nome AS NomeUI,UI.Email AS EmailUI
					,UA.Nome AS NomeUA,UA.Email AS EmailUA
					,Origem.Descricao AS DescricaoOrigem
                    ", false);
				}
			}
			
			// RETURN
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
		
		// -- INSERT -- //
	    function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_preco", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
			
			return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_preco", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
		}
	
	}
?>