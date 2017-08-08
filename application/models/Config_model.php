<?php
	class Config_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null,$pOrderBy = null){
				
			// WHERE		
			if(isset($pData["Id"])){			$this->db->where("tb_config.Id",			$pData["Id"]);}	
			if(isset($pData["Chave"])){			$this->db->where("tb_config.Chave",			$pData["Chave"]);}	
			if(isset($pData["Valor"])){			$this->db->where("tb_config.Valor",			$pData["Valor"]);}	

			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Chave");
			}
			
			// TB
			$this->db->from("tb_config");	
			
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
			$this->db->insert("tb_config", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_config", $pData);
		}*/
	
	}
?>