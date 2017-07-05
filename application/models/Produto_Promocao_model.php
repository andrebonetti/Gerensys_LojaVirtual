<?php
	class Produto_Promocao_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
				
			// WHERE		
			if(isset($pData["Id"])){					$this->db->where("tb_produto_promocao.Id",					$pData["Id"]);}	
			if(isset($pData["IdProduto"])){				$this->db->where("tb_produto_promocao.IdProduto",			$pData["IdProduto"]);}	
			if(isset($pData["Qtde"])){					$this->db->where("tb_produto_promocao.Qtde",				$pData["Qtde"]);}	
			if(isset($pData["IsMaiorQue"])){			$this->db->where("tb_produto_promocao.IsMaiorQue",			$pData["IsMaiorQue"]);}	
			if(isset($pData["IsIgualA"])){				$this->db->where("tb_produto_promocao.IsIgualA",			$pData["IsIgualA"]);}	
			if(isset($pData["PorcentagemDesconto"])){	$this->db->where("tb_produto_promocao.PorcentagemDesconto",	$pData["PorcentagemDesconto"]);}	
			if(isset($pData["PrecoFixoDesconto"])){		$this->db->where("tb_produto_promocao.PrecoFixoDesconto",	$pData["PrecoFixoDesconto"]);}	
			if(isset($pData["VigenciaPartirDe"])){		$this->db->where("tb_produto_promocao.VigenciaPartirDe",	$pData["VigenciaPartirDe"]);}	
			if(isset($pData["DiasSemana"])){			$this->db->where("tb_produto_promocao.DiasSemana",			$pData["DiasSemana"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_produto_promocao.IdUsuarioInclusao",		$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_produto_promocao.IdUsuarioAlteracao",		$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_produto_promocao.DataInclusao >=",			$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_produto_promocao.DataInclusao <=",			$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_produto_promocao.DataAlteracao >=",		$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_produto_promocao.DataAlteracao <=",		$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_produto_promocao.IdOrigem <=",				$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("IdProduto");
			}
			
			// TB
			$this->db->from("tb_produto_promocao");	
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_produto AS Produto", "Produto.Id = tb_produto_promocao.IdProduto","inner");
                    
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_produto_promocao.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_produto_promocao.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_produto_promocao.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_produto_promocao.*
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
			$this->db->insert("tb_produto_promocao", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_produto_promocao", $pData);
		}
	
	}
?>