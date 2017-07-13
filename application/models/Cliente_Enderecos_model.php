<?php
	class Cliente_Enderecos_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){

			// TB
			$this->db->from("tb_cliente_enderecos");	

			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_cliente_enderecos.Id",					$pData["Id"]);}	
			if(isset($pData["IsPrincipal"])){		$this->db->where("tb_cliente_enderecos.IsPrincipal",		$pData["IsPrincipal"]);}	
			if(isset($pData["Cliente"]["Id"])){		$this->db->where("tb_cliente_enderecos.IdCliente",			$pData["Cliente"]["Id"]);}	

			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_cliente_enderecos.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_cliente_enderecos.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_cliente_enderecos.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_cliente_enderecos.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_cliente_enderecos.IdOrigem <=",		$pData["Origem"]["Id"]);}
						
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("IsPrincipal","desc");
			}			
						
			// RETURN
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
			$this->db->insert("tb_cliente_enderecos", $pData);
            
            return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_cliente_enderecos", $pData);
		}
         
	    function AtualizarClienteGeral($pData){
			$this->db->where 	('IdCliente', $pData["IdCliente"]);
			$this->db->update	("tb_cliente_enderecos", $pData);
		}
        
        // -- DELETE -- //
	    function Excluir($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->delete	("tb_cliente_enderecos", $pData);
		}
        
	}
?>