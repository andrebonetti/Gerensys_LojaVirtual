<?php
	class Sys_Cst_Csosn_Origem_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
			
			// TB
			$this->db->from("tb_sys_cst_csosn_Origem");	
			
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_sys_cst_csosn_Origem.Id",					$pData["Id"]);}	
			if(isset($pData["Descricao"])){			$this->db->where("tb_sys_cst_csosn_Origem.Descricao",			$pData["Descricao"]);}	

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
                    tb_sys_cst_csosn_Origem.*
                    
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
			$this->db->insert("tb_cst_csosn_Origem", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_cst_csosn_Origem", $pData);
		}*/
	
	}
?>