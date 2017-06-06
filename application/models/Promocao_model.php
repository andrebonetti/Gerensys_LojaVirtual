<?php
	class Promocao_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null,$pOrderBy = null){
				
			// WHERE		
			if(isset($pData["Id"])){					$this->db->where("tb_promocao.Id",					$pData["Id"]);}	
			if(isset($pData["IdProduto"])){				$this->db->where("tb_promocao.IdProduto",			$pData["IdProduto"]);}	
			if(isset($pData["Qtde"])){					$this->db->where("tb_promocao.Qtde",				$pData["Qtde"]);}	
			if(isset($pData["IsMaiorQue"])){			$this->db->where("tb_promocao.IsMaiorQue",			$pData["IsMaiorQue"]);}	
			if(isset($pData["IsIgualA"])){				$this->db->where("tb_promocao.IsIgualA",			$pData["IsIgualA"]);}	
			if(isset($pData["PorcentagemDesconto"])){	$this->db->where("tb_promocao.PorcentagemDesconto",	$pData["PorcentagemDesconto"]);}	
			if(isset($pData["PrecoFixoDesconto"])){		$this->db->where("tb_promocao.PrecoFixoDesconto",	$pData["PrecoFixoDesconto"]);}	
			if(isset($pData["VigenciaPartirDe"])){		$this->db->where("tb_promocao.VigenciaPartirDe",	$pData["VigenciaPartirDe"]);}	
			if(isset($pData["DiasSemana"])){			$this->db->where("tb_promocao.DiasSemana",			$pData["DiasSemana"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_promocao.IdUsuarioInclusao",		$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_promocao.IdUsuarioAlteracao",		$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_promocao.DataInclusao >=",			$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_promocao.DataInclusao <=",			$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_promocao.DataAlteracao >=",		$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_promocao.DataAlteracao <=",		$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_promocao.IdOrigem <=",				$pData["Origem"]["Id"]);}
				
			// ORDER BY	
			if($pOrderBy != null){$this->db->order_by($pOrderBy);}
			
			// TB
			$this->db->from("tb_promocao");	
			
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_produto AS Produto", "Produto.Id = tb_promocao.IdProduto","inner");
                    
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_promocao.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_promocao.IdUsuarioAlteracao","left");
                    $this->db->join("tb_origem AS Origem", "Origem.Id = tb_promocao.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_promocao.*
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
			$this->db->insert("tb_promocao", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_promocao", $pData);
		}
	
	}
?>