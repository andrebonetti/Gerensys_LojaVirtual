<?php
	class Cliente_Pedido_Produtos_model extends CI_Model {
		
		// -- SELECT -- /
		function Listar($pData = null){

			// TB
			$this->db->from("tb_cliente_pedido_produtos");	

			// WHERE		
			if(isset($pData["Id"])){				$this->db->where("tb_cliente_pedido_produtos.Id",		 $pData["Id"]);}	
			if(isset($pData["Pedido"]["Id"])){		$this->db->where("tb_cliente_pedido_produtos.IdPedido",	 $pData["Pedido"]["Id"]);}	
            if(isset($pData["Produto"]["Id"])){		$this->db->where("tb_cliente_pedido_produtos.IdProduto", $pData["Produto"]["Id"]);}	
    
			// ORDER BY	
			if(isset($pData["OrderBy"])){
				$this->db->order_by($pData["OrderBy"]);
			}
			else{
				$this->db->order_by("IdPedido","asc");
			}		
            
            if( isset($pData["Join"]) && ($pData["Join"] == true) ){
                
                $this->db->join("tb_produto_v_tamanho AS Tamanho", "Tamanho.Id = tb_cliente_pedido_produtos.IdTamanho","left");
                $this->db->join("tb_produto_v_cor AS Cor", "Cor.Id = tb_cliente_pedido_produtos.IdCor","left");
                
            	$query_select = "
                tb_cliente_pedido_produtos.*
                
            	,Tamanho.Descricao as DescricaoTamanho
                ,Cor.Descricao as DescricaoCor";
                
                // --- SELECT ---
                $this->db->select($query_select, false);
            }
		
			// RETURN
            // ----- Count -----
			if( (isset($pData["IsCount"])) && ($pData["IsCount"] == true) ){
				return $this->db->count_all_results();  
			}	
			if(isset($pData["IsBusca"])){
                $data = $this->db->get()->row_array();
			}
			else{
				$data = $this->db->get()->result_array();
			}
            
            
            if( isset($pData["lJoin"]) && ($pData["lJoin"] == true) ){
                
                if(isset($pData["IsBusca"])){
                    
                    $dataBuscaProduto["Id"] = $data["IdProduto"];
                    $dataBuscaProduto["IsBusca"] = true;
                    $dataBuscaProduto["Join"] = true;
                    
                    $data["Produto"] = $this->Produto_model->Listar($dataBuscaProduto);
                
                }
                else{
                    
                    $n = 0;
                    foreach($data as $item){
                        
                        $dataBuscaProduto["Id"] = $item["IdProduto"];
                        $dataBuscaProduto["IsBusca"] = true;
                        $dataBuscaProduto["Join"] = true;
                    
                        $data[$n]["Produto"] = $this->Produto_model->Listar($dataBuscaProduto);
                        
                        $n++;
                    }
                    
                }

            }	
            
			return $data;			        
	    }
		
		// -- INSERT -- //
	    function Incluir($pData){
	        $pData["Id"] = null;
			$this->db->insert("tb_cliente_pedido_produtos", $pData);
            
            return $this->db->insert_id();
		}
	    
	    // -- UPDATE -- // 
	    function Atualizar($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->update	("tb_cliente_pedido_produtos", $pData);
		}
         
        // -- DELETE -- //
	    function Excluir($pData){
			$this->db->where 	('Id', $pData["Id"]);
			$this->db->delete	("tb_cliente_pedido_produtos", $pData);
		}
        
	}
?>