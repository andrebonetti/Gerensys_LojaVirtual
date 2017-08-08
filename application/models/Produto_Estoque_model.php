<?php
	class Produto_Estoque_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){
            
            // TB
			$this->db->from("tb_produto_estoque");	
			
    		// WHERE		
    		if(isset($pData["Id"])){				    $this->db->where("tb_produto_estoque.Id",				$pData["Id"]);}	
            if(isset($pData["Produto"]["Id"])){		    $this->db->where("tb_produto_estoque.IdProduto",		$pData["Produto"]["Id"]);}	
    		if(isset($pData["Tamanho"]["Id"])){		    $this->db->where("tb_produto_estoque.IdTamanho",	    $pData["Tamanho"]["Id"]);}	
            if(isset($pData["Cor"]["Id"])){	            $this->db->where("tb_produto_estoque.IdCor",            $pData["Cor"]["Id"]);}	

    		if(isset($pData["IdUsuarioInclusao"])){	    $this->db->where("tb_produto_estoque.IdUsuarioInclusao",$pData["IdUsuarioInclusao"]);}
    		if(isset($pData["IdUsuarioAlteracao"])){    $this->db->where("tb_produto_estoque.IdUsuarioAlteracao",$pData["IdUsuarioAlteracao"]);}
    		if(isset($pData["DataInclusaoDe"])){	    $this->db->where("tb_produto_estoque.DataInclusao >=",	$pData["DataInclusaoDe"]);}
    		if(isset($pData["DataInclusaoAte"])){	    $this->db->where("tb_produto_estoque.DataInclusao <=",	$pData["DataInclusaoAte"]);}
    		if(isset($pData["DataAlteracaoDe"])){	    $this->db->where("tb_produto_estoque.DataAlteracao >=",	$pData["DataAlteracaoDe"]);}
    		if(isset($pData["DataAlteracaoAte"])){	    $this->db->where("tb_produto_estoque.DataAlteracao <=",	$pData["DataAlteracaoAte"]);}
            
            //DISTINCT
            if( (isset($pData["Distinct"]["IdTamanho"])) && ($pData["Distinct"]["IdTamanho"] == true) ){	                    
                $this->db->distinct("tb_produto_estoque.IdTamanho");
            }
            if( (isset($pData["Distinct"]["IdCor"])) && ($pData["Distinct"]["IdCor"] == true) ){	                    
                $this->db->distinct("tb_produto_estoque.IdCor");
            }
            
            //JOIN
			if( (isset($pData["JoinTamanho"])) && ($pData["JoinTamanho"] == true) ){             
                $this->db->join("tb_produto_v_tamanho AS Tamanho", "Tamanho.Id = tb_produto_estoque.IdTamanho","inner");
                
                $this->db->select("Tamanho.Id AS IdTamanho,Tamanho.Descricao AS DescricaoTamanho,Tamanho.Ordem as OrdemTamanho");
                
                $this->db->order_by("Tamanho.Ordem");
            }
            if( (isset($pData["JoinCor"])) && ($pData["JoinCor"] == true) ){        
                $this->db->join("tb_produto_v_cor AS Cor", "Cor.Id = tb_produto_estoque.IdCor","inner");
                
                $this->db->select("Cor.Id AS IdCor,Cor.Descricao AS DescricaoCor,Cor.CorCSS AS CorCSS");
            }
            
    		// ORDER BY	
    		/*if(isset($pData["OrderBy"])){
    			$this->db->order_by($pData["OrderBy"]);
    		}
    		else{
    			$this->db->order_by("tb_produto_estoque.IdProduto");
    		}*/
                
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
			$this->db->insert("tb_produto_estoque", $pData);
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_produto_estoque", $pData);
		}
	
	}
?>