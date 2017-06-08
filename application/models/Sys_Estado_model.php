<?php
	class Sys_Estado_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
			
			// TB
			$this->db->from("tb_sys_estado");	
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_sys_estado.Id",					$pData["Id"]);}	
			if(isset($pData["UF"])){				$this->db->where("tb_sys_estado.Descricao",				$pData["UF"]);}	
			if(isset($pData["Descricao"])){			$this->db->where("tb_sys_estado.Descricao",				$pData["Descricao"]);}	

			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Descricao");
			}
					
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	/* SELECT */
                    $this->db->select("
                    tb_sys_estado.*
                    
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
			$this->db->insert("tb_sys_estado", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_sys_estado", $pData);
		}*/
	
	}
?>