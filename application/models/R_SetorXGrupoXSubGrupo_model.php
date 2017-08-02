<?php
	class R_SetorXGrupoXSubGrupo_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
            
            // TB
			$this->db->from("tb_r_setorxgrupoxsubgrupo");	
			
    		// WHERE		
    		if(isset($pData["Id"])){				                $this->db->where("tb_r_setorxgrupoxsubgrupo.Id",				$pData["Id"]);}	
            if(isset($pData["Setor"]["Id"])){		                $this->db->where("tb_r_setorxgrupoxsubgrupo.IdSetor",			$pData["Setor"]["Id"]);}	
    		if(isset($pData["Setor"]["Grupo"]["Id"])){		        $this->db->where("tb_r_setorxgrupoxsubgrupo.IdGrupo",	        $pData["Setor"]["Grupo"]["Id"]);}	
            if(isset($pData["Setor"]["Grupo"]["SubGrupo"]["Id"])){	$this->db->where("tb_r_setorxgrupoxsubgrupo.IdSubGrupo",        $pData["Setor"]["Grupo"]["SubGrupo"]["Id"]);}	

    		if(isset($pData["IdUsuarioInclusao"])){	                $this->db->where("tb_r_setorxgrupoxsubgrupo.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
    		if(isset($pData["IdUsuarioAlteracao"])){                $this->db->where("tb_r_setorxgrupoxsubgrupo.IdUsuarioAlteracao",$pData["IdUsuarioAlteracao"]);}
    		if(isset($pData["DataInclusaoDe"])){	                $this->db->where("tb_r_setorxgrupoxsubgrupo.DataInclusao >=",	$pData["DataInclusaoDe"]);}
    		if(isset($pData["DataInclusaoAte"])){	                $this->db->where("tb_r_setorxgrupoxsubgrupo.DataInclusao <=",	$pData["DataInclusaoAte"]);}
    		if(isset($pData["DataAlteracaoDe"])){	                $this->db->where("tb_r_setorxgrupoxsubgrupo.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
    		if(isset($pData["DataAlteracaoAte"])){	                $this->db->where("tb_r_setorxgrupoxsubgrupo.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
            
            //DISTINCT
            if( (isset($pData["Distinct"]["IdSetor"])) && ($pData["Distinct"]["IdSetor"] == true) ){	                    
                $this->db->distinct("tb_r_setorxgrupoxsubgrupo.IdSetor");
            }
            if( (isset($pData["Distinct"]["IdGrupo"])) && ($pData["Distinct"]["IdGrupo"] == true) ){	                    
                $this->db->distinct("tb_r_setorxgrupoxsubgrupo.IdGrupo");
            }
            
            //JOIN
			if( (isset($pData["JoinSetor"])) && ($pData["JoinSetor"] == true) ){        
                $this->db->join("tb_Setor AS Setor", "Setor.Id = tb_r_setorxgrupoxsubgrupo.IdSetor","inner");
                
                $this->db->select("Setor.Id AS IdSetor,Setor.Descricao AS DescricaoSetor");
            }
            if( (isset($pData["JoinGrupo"])) && ($pData["JoinGrupo"] == true) ){        
                $this->db->join("tb_Grupo AS Grupo", "Grupo.Id = tb_r_setorxgrupoxsubgrupo.IdGrupo","inner");
                
                $this->db->select("Grupo.Id AS IdGrupo,Grupo.Descricao AS DescricaoGrupo");
            }
            if( (isset($pData["JoinSubGrupo"])) && ($pData["JoinSubGrupo"] == true) ){        
                
                $this->db->join("tb_subgrupo AS SubGrupo", "SubGrupo.Id = tb_r_setorxgrupoxsubgrupo.IdSubGrupo","inner");
                
                $this->db->select("SubGrupo.Id AS IdSubGrupo,SubGrupo.Descricao AS DescricaoSubGrupo");
            }
            
    		// ORDER BY	
    		if(isset($pData["OrderBy"])){
    			$this->db->order_by($pData["OrderBy"]);
    		}
    		else{
    			$this->db->order_by("tb_r_setorxgrupoxsubgrupo.IdSetor");
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
			$this->db->insert("tb_r_setorxgrupoxsubgrupo", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_r_setorxgrupoxsubgrupo", $pData);
		}
	
	}
?>