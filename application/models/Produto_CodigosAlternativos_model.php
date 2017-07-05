<?php
	class Produto_CodigosAlternativos_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
            
            // TB
			$this->db->from("tb_produto_codigosalternativos");	

			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("tb_produto_codigosalternativos.Codigo");
			}
			
			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_produto_codigosalternativos.Id",					$pData["Id"]);}	
			if(isset($pData["Produto"]["Id"])){		$this->db->where("tb_produto_codigosalternativos.IdProduto",			$pData["Produto"]["Id"]);}	
			if(isset($pData["Codigo"])){			$this->db->where("tb_produto_codigosalternativos.Codigo",			    $pData["Codigo"]);}	

			if(isset($pData["IdUsuarioInclusao"])){	$this->db->where("tb_produto_codigosalternativos.IdUsuarioInclusao",	$pData["IdUsuarioInclusao"]);}
			if(isset($pData["IdUsuarioAlteracao"])){$this->db->where("tb_produto_codigosalternativos.IdUsuarioAlteracao",	$pData["IdUsuarioAlteracao"]);}
			if(isset($pData["DataInclusaoDe"])){	$this->db->where("tb_produto_codigosalternativos.DataInclusao >=",		$pData["DataInclusaoDe"]);}
			if(isset($pData["DataInclusaoAte"])){	$this->db->where("tb_produto_codigosalternativos.DataInclusao <=",		$pData["DataInclusaoAte"]);}
			if(isset($pData["DataAlteracaoDe"])){	$this->db->where("tb_produto_codigosalternativos.DataAlteracao >=",		$pData["DataAlteracaoDe"]);}
			if(isset($pData["DataAlteracaoAte"])){	$this->db->where("tb_produto_codigosalternativos.DataAlteracao <=",		$pData["DataAlteracaoAte"]);}
			if(isset($pData["Origem"]["Id"])){		$this->db->where("tb_produto_codigosalternativos.IdOrigem <=",			$pData["Origem"]["Id"]);}
						
			/* -- JOIN -- */
			if(isset($pData["Join"])){
                
                if($pData["Join"] == true){
                	
                	$this->db->join("tb_produto AS Produto", "Produto.Id = tb_produto_codigosalternativos.IdProduto","inner");
                    
                	$this->db->join("tb_usuarios AS UI", "UI.Id = tb_produto_codigosalternativos.IdUsuarioInclusao","inner");
                    $this->db->join("tb_usuarios AS UA", "UA.Id = tb_produto_codigosalternativos.IdUsuarioAlteracao","left");
                    $this->db->join("tb_sys_origem AS Origem", "Origem.Id = tb_produto_codigosalternativos.IdOrigem","inner");
                	
                	/* SELECT */
                    $this->db->select("
                    tb_produto_codigosalternativos.*
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
			$this->db->insert("tb_produto_codigosalternativos", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
			
			return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_produto_codigosalternativos", $pData);
			
			//VERIICA ERRO
    		$erro = $this->db->_error_message();
			if(!empty($erro)) {throw new Exception($erro);}
		}
	
	}
?>