<?php
	class Fornecedor_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_fornecedor.Id",					$pData["Id"]);}	
			if(isset($pData["Descricao"])){			$this->db->where("tb_fornecedor.Descricao",				$pData["Descricao"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_fornecedor.IdUsuarioInclusao",		$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_fornecedor.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_fornecedor.DataInclusao >=",		$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_fornecedor.DataInclusao <=",		$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_fornecedor.DataAlteracao >=",		$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_fornecedor.DataAlteracao <=",		$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_fornecedor.IdOrigem <=",			$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Descricao");
			}
			
			// TB
			$this->db->from("tb_fornecedor");	
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_fornecedor.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_fornecedor.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_fornecedor.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_fornecedor.*
                    
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
			$this->db->insert("tb_fornecedor", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_fornecedor", $pData);
		}
	
	}
?>