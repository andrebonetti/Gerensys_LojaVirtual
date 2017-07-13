<?php
	class Cliente_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
			
			// TB
			$this->db->from("tb_cliente");			
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_cliente.Id",				$pData["Id"]);}	
			if(isset($pData["!Id"])){				$this->db->where("tb_cliente.Id !=",			$pData["!Id"]);}	
			if(isset($pData["Nome"])){				$this->db->where("tb_cliente.Nome",				$pData["Nome"]);}	
			if(isset($pData["Email"])){				$this->db->where("tb_cliente.Email",			$pData["Email"]);}	
			if(isset($pData["Telefone"])){			$this->db->where("tb_cliente.Telefone",			$pData["Telefone"]);}	
			if(isset($pData["Senha"])){				$this->db->where("tb_cliente.Senha",			$pData["Senha"]);}	

			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_cliente.IdOrigem <=",		$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Nome");
			}

			// --- JOIN ---
			/*if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_cliente.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_cliente.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_cliente.IdOrigem","inner");
                	
                	// --- SELECT ---
                    $this->db->select("
                    tb_cliente.*
                    
					,UI.Nome AS NomeUI,UI.Email AS EmailUI
					,UA.Nome AS NomeUA,UA.Email AS EmailUA
					,Origem.Descricao AS DescricaoOrigem
                    ", false);
				}
			}*/
			
			// RETURN
			if(isset($pData["IsBusca"])){
                $data = $this->db->get()->row_array();
			}
			else{
				$data = $this->db->get()->result_array();
			}
			
			//lJoin
			/*if( (isset($pData["lJoinCount"])) && ($pData["lJoinCount"] == true) ){
				
				if( !isset($pData["IsBusca"] )){	
					
					$n = 0;
					foreach($data as $itemData){
						
						produto_PreencherBreadCrumb("IdCor",$itemData["Id"],"Cor",$itemData["Descricao"]);
						
						$pData[0]["Produto"]["Cor"]["Id"] = $itemData["Id"];
						$data[$n]["CountFilhas"]	= $this->Produto_model	->Listar($pData[0]["Produto"]);
						
						if($data[$n]["CountFilhas"] < 1){
							unset($data[$n]);
						}
						
						$n++;				
					}
				}
			}*/
			
			return $data;	        
	    }
		
		// -- INSERT -- //
	    function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_cliente", $pData);
			
			return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_cliente", $pData);
		}
	
	}
?>