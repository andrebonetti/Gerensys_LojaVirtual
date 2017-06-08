<?php
	class Cst_Csosn_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null,$pOrderBy = null){
				
			// WHERE		
			if(isset($pData["Id"])){									$this->db->where("tb_cst_csosn.Id",								$pData["Id"]);}	
			if(isset($pData["Cest_Csosn_Origem"]["Id"])){				$this->db->where("tb_cst_csosn.IdCest_Csosn_Origem",			$pData["Cest_Csosn_Origem"]["Id"]);}	
			if(isset($pData["Cst_Csosn_SituacaoTributaria"]["Id"])){	$this->db->where("tb_cst_csosn.IdCst_Csosn_SituacaoTributaria",	$pData["Codigo"]);}	
			if(isset($pData["Estado"]["Id"])){							$this->db->where("tb_cst_csosn.IdEstado",						$pData["Estado"]["Id"]);}				
			if(isset($pData["Aliquota"])){								$this->db->where("tb_cst_csosn.Aliquota",						$pData["Aliquota"]);}				

			if(isset($pData["IdUsuarioInclusao"])){						$this->db->where("tb_cst_csosn.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){					$this->db->where("tb_cst_csosn.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){						$this->db->where("tb_cst_csosn.DataInclusao >=",	$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){						$this->db->where("tb_cst_csosn.DataInclusao <=",	$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){						$this->db->where("tb_cst_csosn.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){						$this->db->where("tb_cst_csosn.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){							$this->db->where("tb_cst_csosn.IdOrigem <=",		$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("Aliquota");
			}
			
			// TB
			$this->db->from("tb_cst_csosn");	
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_sys_cst_csosn_origem AS OrigemCST", "OrigemCST.Id = tb_cst_csosn.IdCst_Csosn_Origem","inner");
                    $this->db->join("tb_sys_cst_csosn_situacaotributaria AS ST", "ST.Id = tb_cst_csosn.IdCst_Csosn_SituacaoTributaria","inner");
                    $this->db->join("tb_sys_estado AS UF", "UF.Id = tb_cst_csosn.IdEstado","inner");
                             	
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_cst_csosn.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_cst_csosn.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_cst_csosn.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_cst_csosn.*
                    
                    ,OrigemCST.Codigo AS CSTCodigoOrigem
                    ,OrigemCST.Descricao AS CESDescricaoOrigem
                	,ST.Codigo AS CSTCodigoST
                    ,ST.Descricao AS CSTDescricaoST
                    
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
			$this->db->insert("tb_cst_csosn", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_cst_csosn", $pData);
		}
	
	}
?>