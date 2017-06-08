<?php
	class Sys_cest_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
			
			// TB
			$this->db->from("tb_sys_cest");	
			
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_sys_cest.Id",					$pData["Id"]);}	
			if(isset($pData["Codigo"])){			$this->db->where("tb_sys_cest.Codigo",				$pData["Codigo"]);}	
			if(isset($pData["Id_ncm_sh"])){			$this->db->where("tb_sys_cest.Id_ncm_sh",			$pData["Id_ncm_sh"]);}				
			
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Codigo");
			}

			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_sys_ncm_sh AS NCM", "NCM.Id = tb_sys_cest.Id_ncm-sh","inner");
                    
                	/* SELECT */
                    $this->db->select("
                    tb_sys_cest.*
                    ,NCM.Codigo AS CodigoNCM,NCM.Descricao AS DescricaoNCM
					
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
			$this->db->insert("tb_sys_cest", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_sys_cest", $pData);
		}*/
	
	}
?>