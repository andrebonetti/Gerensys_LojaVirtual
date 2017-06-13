<?php
	class Functions_model extends CI_Model {
		
		// -- SELECT -- /
		function Validar_Existencia($pData = null){

			// TB
			$this->db->from($pData["tabela"]);
			      
			$this->db->where($pData["coluna"],	$pData["valor"]);
			
			return $this->db->get()->result_array();
			  
	    }
		
	}
?>