<?php
	class Produto_V_Cor_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
			
			// TB
			$this->db->from("tb_produto_v_cor");			
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_produto_v_cor.Id",					$pData["Id"]);}	
			if(isset($pData["Descricao"])){			$this->db->where("tb_produto_v_cor.Descricao",			$pData["Descricao"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_produto_v_cor.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_produto_v_cor.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_produto_v_cor.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_produto_v_cor.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_produto_v_cor.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_produto_v_cor.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_produto_v_cor.IdOrigem <=",		$pData["Origem"]["Id"]);}
				
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
                	
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_produto_v_cor.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_produto_v_cor.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_produto_v_cor.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_produto_v_cor.*
                    
					,UI.Nome AS NomeUI,UI.Email AS EmailUI
					,UA.Nome AS NomeUA,UA.Email AS EmailUA
					,Origem.Descricao AS DescricaoOrigem
                    ", false);
                    
                    if( isset($pData["Produto"])){
                    
                        $this->db->join("tb_produto AS Produto", "Produto.Id = tb_produto_v_cor.IdUsuarioInclusao","inner");
                        
                    
                    }
				}
			}
			
			// RETURN
			if(isset($pData["IsBusca"])){
                $data = $this->db->get()->row_array();
			}
			else{
				$data = $this->db->get()->result_array();
			}
			
			//lJoin
			if( (isset($pData["lJoinCount"])) && ($pData["lJoinCount"] == true) ){
				
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
			}
			
			return $data;	        
	    }
		
		// -- INSERT -- //
	    function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_produto_v_cor", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_produto_v_cor", $pData);
		}
	
	}
?>