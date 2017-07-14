<?php
	class Cliente_Favoritos_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){

			// TB
			$this->db->from("tb_cliente_favoritos");	

			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_cliente_favoritos.Id",					$pData["Id"]);}	
			if(isset($pData["Cliente"]["Id"])){		$this->db->where("tb_cliente_favoritos.IdCliente",			$pData["Cliente"]["Id"]);}	
            if(isset($pData["Produto"]["Id"])){		$this->db->where("tb_cliente_favoritos.IdProduto",			$pData["Produto"]["Id"]);}	

			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_cliente_favoritos.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_cliente_favoritos.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_cliente_favoritos.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_cliente_favoritos.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_cliente_favoritos.IdOrigem <=",		$pData["Origem"]["Id"]);}
						
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("DataInclusao","asc");
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
            
            //lJoin
            if( (isset($pData["lJoin"])) && ($pData["lJoin"] == true) ){
    			if( (isset($pData["lJoinCount"])) && ($pData["lJoinCount"] == true) ){
    				
    				/*if( !isset($pData["IsBusca"] )){	
    					
    					$n = 0;
    					foreach($data as $itemData)                                                {
						
						produto_PreencherBreadCrumb("IdSubGrupo",$itemData["Id"],"SubGrupo",$itemData["Descricao"]);
						
						$pData[0]["Produto"]["Grupo"]["SubGrupo"]["Id"] = $itemData["Id"];
						$data[$n]["CountFilhas"]	= $this->Produto_model	->Listar($pData[0]["Produto"]);
						
						if($data[$n]["CountFilhas"] < 1){
							unset($data[$n]);
						}
						
						$n++;				
					}
    				}*/
    			}
    			else{
                    
                    $n = 0;
					foreach($data as $itemData){
						
						$pData[0]["Produto"]["Id"]      = $itemData["IdProduto"];
                        $pData[0]["Produto"]["Join"]    = true;
                        $pData[0]["Produto"]["IsBusca"] = true;
                        
						$data[$n]["Produto"]	= $this->Produto_model	->Listar($pData[0]["Produto"]);
						
						$n++;				
					}
                    
                }
            }
			
			return $data;			        
	    }
		
		// -- INSERT -- //
	    function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_cliente_favoritos", $pData);
            
            return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_cliente_favoritos", $pData);
		}
         
	    function AtualizarClienteGeral($pData){
			$this->db->where 	('IdCliente', $pData["IdCliente"]);
			$this->db->update	("tb_cliente_favoritos", $pData);
		}
        
        // -- DELETE -- //
	    function Excluir($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->delete	("tb_cliente_favoritos", $pData);
		}
        
        function ExcluirClienteGeral($pData){
			$this->db->where 	('IdCliente', $pData["IdCliente"]);
			$this->db->delete	("tb_cliente_favoritos", $pData);
		}
        
	}
?>