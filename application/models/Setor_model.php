<?php
	class Setor_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_setor.Id",					$pData["Id"]);}	
			if(isset($pData["Descricao"])){			$this->db->where("tb_setor.Descricao",			$pData["Descricao"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_setor.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_setor.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_setor.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_setor.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_setor.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_setor.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_setor.IdOrigem <=",		$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Descricao");
			}
			
			// TB
			$this->db->from("tb_setor");	
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_setor.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_setor.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_setor.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_setor.*
                    
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
			$this->db->insert("tb_setor", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_setor", $pData);
		}
	
	}
?>