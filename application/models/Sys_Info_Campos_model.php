<?php
	class sys_info_campos_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null,$pOrderBy = null){
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_sys_info_campos.Id",				$pData["Id"]);}	
			if(isset($pData["Tabela"])){			$this->db->where("tb_sys_info_campos.Tabela",			$pData["Tabela"]);}	
			if(isset($pData["Coluna"])){			$this->db->where("tb_sys_info_campos.Coluna",			$pData["Coluna"]);}	
			if(isset($pData["HasInfo"])){			$this->db->where("tb_sys_info_campos.HasInfo",			$pData["HasInfo"]);}				
			if(isset($pData["Informacao"])){		$this->db->where("tb_sys_info_campos.Informacao",		$pData["Informacao"]);}				
			if(isset($pData["IdInfo"])){			$this->db->where("tb_sys_info_campos.IdInfo",			$pData["IdInfo"]);}				
			if(isset($pData["IdInfo_Descricao"])){	$this->db->where("tb_sys_info_campos.IdInfo_Descricao",	$pData["IdInfo_Descricao"]);}				

			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Coluna");
			}
			
			// TB
			$this->db->from("tb_sys_info_campos");	
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	/* SELECT */
                    $this->db->select("
                    tb_sys_info_campos.*
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
	    /*function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_sys_info_campos", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_sys_info_campos", $pData);
		}*/
	
	}
?>