<?php
	class Cliente_Pedidos_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){

			// TB
			$this->db->from("tb_cliente_pedidos");	

			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_cliente_pedidos.Id",					$pData["Id"]);}	
			if(isset($pData["Cliente"]["Id"])){		$this->db->where("tb_cliente_pedidos.IdCliente",			$pData["Cliente"]["Id"]);}	
            if(isset($pData["Numero"])){			$this->db->where("tb_cliente_pedidos.Numero",				$pData["Numero"]);}	
			if(isset($pData["Status"]["Id"])){		$this->db->where("tb_cliente_pedidos.IdPedidoStatus",		$pData["Status"]["Id"]);}	
			
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("DataPedido","asc");
			}			
						
			// RETURN
            // ----- Count -----
			if( (isset($pData["IsCount"])) && ($pData["IsCount"] == true) ){
				return $this->db->count_all_results();  
			}	
			if(isset($pData["IsBusca"])){
                $data = $this->db->get()->row_array();
			}
			else{
				$data = $this->db->get()->result_array();
			}
            
			return $data;			        
	    }
		
		// -- INSERT -- //
	    function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_cliente_pedidos", $pData);
            
            return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_cliente_pedidos", $pData);
		}
         
        // -- DELETE -- //
	    function Excluir($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->delete	("tb_cliente_pedidos", $pData);
		}
        
	}
?>