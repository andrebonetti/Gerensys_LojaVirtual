<?php
	class Grupo_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
			
			// TB
			$this->db->from("tb_grupo");			
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_grupo.Id",					$pData["Id"]);}	
			if(isset($pData["Descricao"])){			$this->db->where("tb_grupo.Descricao",			$pData["Descricao"]);}	
            if(isset($pData["Setor"]["Id"])){		$this->db->where("tb_grupo.IdSetor",			$pData["Setor"]["Id"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_grupo.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_grupo.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_grupo.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_grupo.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_grupo.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_grupo.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_grupo.IdOrigem <=",		$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Ordem");
			}

			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_grupo.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_grupo.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_grupo.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_grupo.*
                    
					,UI.Nome AS NomeUI,UI.Email AS EmailUI
					,UA.Nome AS NomeUA,UA.Email AS EmailUA
					,Origem.Descricao AS DescricaoOrigem
                    ", false);
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
			if( (isset($pData["SubGrupo"]["lJoin"])) && ($pData["SubGrupo"]["lJoin"] == true)){
                
                if(isset($pData["IsBusca"])){
                    
                    $pSubGrupoBusca["Grupo"]["Id"] = $data["Id"];           
                    $data["lSubGrupo"]          = $this->SubGrupo_model->Listar($pSubGrupoBusca);
                    
                }
                else{
                     
                    $n = 0;
                    foreach($data as $item){
                        
                        $pSubGrupoBusca["Grupo"]["Id"] = $item["Id"];
                        
                        $data[$n]["lSubGrupo"]         = $this->SubGrupo_model->Listar($pSubGrupoBusca);
                        
                        $n++;
                    } 
    
                }
                
            }
			
			//lJoinCount
			if( (isset($pData["lJoinCount"])) && ($pData["lJoinCount"] == true) ){
				
				if( !isset($pData["IsBusca"] )){	
					
					$n = 0;
					foreach($data as $itemData){
						
						produto_PreencherBreadCrumb("IdGrupo",$itemData["Id"],"Grupo",$itemData["Descricao"]);
						
						$pData[0]["Produto"]["Grupo"]["Id"] = $itemData["Id"];
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
			$this->db->insert("tb_grupo", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_grupo", $pData);
		}
	
	}
?>