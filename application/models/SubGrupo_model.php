<?php
	class SubGrupo_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_subgrupo.Id",					$pData["Id"]);}	
			if(isset($pData["Grupo"]["Id"])){		$this->db->where("tb_subgrupo.IdGrupo",				$pData["Grupo"]["Id"]);}	
			if(isset($pData["Descricao"])){			$this->db->where("tb_subgrupo.Descricao",			$pData["Descricao"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_subgrupo.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_subgrupo.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_subgrupo.DataInclusao >=",		$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_subgrupo.DataInclusao <=",		$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_subgrupo.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_subgrupo.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_subgrupo.IdOrigem <=",			$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Descricao");
			}
			
			// TB
			$this->db->from("tb_subgrupo");	
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_grupo AS Grupo", "Grupo.Id = tb_subgrupo.IdGrupo","inner");
                    $this->db->join("tb_usuarios AS UI", "UI.Id = tb_subgrupo.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_subgrupo.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_subgrupo.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_subgrupo.*
                    ,Grupo.Descricao AS DescricaoGrupo
                    
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
			
			//lJoinCount
			if( (isset($pData["lJoinCount"])) && ($pData["lJoinCount"] == true) ){
				
				if( !isset($pData["IsBusca"] )){	
					
					$n = 0;
					foreach($data as $itemData){
						
						produto_PreencherBreadCrumb("IdSubGrupo",$itemData["Id"],"SubGrupo",$itemData["Descricao"]);
						
						$pData[0]["Produto"]["Grupo"]["SubGrupo"]["Id"] = $itemData["Id"];
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
			$this->db->insert("tb_subgrupo", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_subgrupo", $pData);
		}
	
	}
?>