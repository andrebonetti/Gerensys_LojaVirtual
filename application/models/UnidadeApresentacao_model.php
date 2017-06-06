<?php
	class UnidadeApresentacao_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null,$pOrderBy = null){
				
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_unidadeapresentacao.Id",					$pData["Id"]);}	
			if(isset($pData["Codigo"])){			$this->db->where("tb_unidadeapresentacao.Codigo",				$pData["Codigo"]);}	
			if(isset($pData["Descricao"])){			$this->db->where("tb_unidadeapresentacao.Descricao",			$pData["Descricao"]);}				
			
			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_unidadeapresentacao.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_unidadeapresentacao.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_unidadeapresentacao.DataInclusao >=",		$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_unidadeapresentacao.DataInclusao <=",		$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_unidadeapresentacao.DataAlteracao >=",		$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_unidadeapresentacao.DataAlteracao <=",		$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_unidadeapresentacao.IdOrigem <=",			$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if($pOrderBy != null){$this->db->order_by($pOrderBy);}
			
			// TB
			$this->db->from("tb_unidadeApresentacao");	
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_unidadeapresentacao.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_unidadeapresentacao.IdUsuarioAlteracao","left");
                    $this->db->join("tb_origem AS Origem", "Origem.Id = tb_unidadeapresentacao.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_unidadeApresentacao.*

					,UI.Nome AS NomeUI,UI.Email AS EmailUI
					,UA.Nome AS NomeUA,UA.Email AS EmailUA
					,Origem.Descricao AS DescricaoOrigem
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
	    function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_unidadeApresentacao", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_unidadeApresentacao", $pData);
		}
	
	}
?>