<?php
	class Produto_Comentarios_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
			
			// TB
			$this->db->from("tb_produto_comentarios");	
			
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_produto_comentarios.Id",					$pData["Id"]);}	
			if(isset($pData["Produto"]["Id"])){		$this->db->where("tb_produto_comentarios.IdProduto",			$pData["Produto"]["Id"]);}	
			
			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_produto_comentarios.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_produto_comentarios.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_produto_comentarios.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_produto_comentarios.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_produto_comentarios.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_produto_comentarios.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_produto_comentarios.IdOrigem <=",		$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("tb_produto_comentarios.DataInclusao");
			}
			
			// -- JOIN -- 
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	
                	$this->db->join("tb_produto AS Produto", "Produto.Id = tb_produto_comentarios.IdProduto","inner");
                    
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_produto_comentarios.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_produto_comentarios.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_produto_comentarios.IdOrigem","inner");
                	
                	// -- SELECT --
                    $this->db->select("
                    tb_produto_comentarios.*
                    ,Produto.*
                    
					,UI.Nome AS NomeUI,UI.Email AS EmailUI
					,UA.Nome AS NomeUA,UA.Email AS EmailUA
					,Origem.Descricao AS DescricaoOrigem
                    ", false);
                
				}
			}
			
			// -- RETURN -- 
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
			$this->db->insert("tb_produto_comentarios", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
			
			return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_produto_comentarios", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
		}
	
	}
?>