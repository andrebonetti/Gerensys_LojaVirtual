<?php
	class Produto_Fotos_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){

			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("NomeArquivo");
			}
			
			// TB
			$this->db->from("tb_produto_fotos");	

			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_produto_fotos.Id",					$pData["Id"]);}	
			if(isset($pData["IsPrincipal"])){		$this->db->where("tb_produto_fotos.IsPrincipal",		$pData["IsPrincipal"]);}	
			if(isset($pData["Produto"]["Id"])){		$this->db->where("tb_produto_fotos.IdProduto",			$pData["Produto"]["Id"]);}	
			if(isset($pData["NomeArquivo"])){		$this->db->where("tb_produto_fotos.NomeArquivo",		$pData["NomeArquivo"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_produto_fotos.IdUsuarioInclusao",		$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_produto_fotos.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_produto_fotos.DataInclusao >=",		$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_produto_fotos.DataInclusao <=",		$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_produto_fotos.DataAlteracao >=",		$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_produto_fotos.DataAlteracao <=",		$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_produto_fotos.IdOrigem <=",			$pData["Origem"]["Id"]);}
						
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_produto AS Produto", "Produto.Id = tb_produto_fotos.IdProduto","inner");
                    
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_produto_fotos.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_produto_fotos.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_produto_fotos.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_produto_fotos.*
                    ,Produto.*
                    
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
			$this->db->insert("tb_produto_fotos", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_produto_fotos", $pData);
		}
	
	}
?>