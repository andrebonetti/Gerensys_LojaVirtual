<?php

    function produtoEstoque_ListarVariantes($pProduto,$pListarEstoque = false){
        
        $ci =  get_instance();
        
        // -------------------- TAMANHO --------------------
        $dataBuscaT["Produto"] = $pProduto;
        $dataBuscaT["Distinct"]["IdTamanho"] = true;
        $dataBuscaT["JoinTamanho"] = true;
        //$dataBuscaT["OrderBy"] = ["OrdemTamanho"];
        
        $data["lTamanho"] = $ci->Produto_Estoque_model->Listar($dataBuscaT);
        
        if(count($data["lTamanho"]) > 0)
        {
            if($pListarEstoque == true){
                
                $n = 0;
                foreach($data["lTamanho"] as $itemTamanho){
                    
                    $data["lTamanho"][$n]["Qtde_Estoque"] = produtoEstoque_CalcularEstoqueVariante($pProduto,"Tamanho",$itemTamanho["IdTamanho"]);
                    $n++;
                }
            }
        }
        else{
            unset($data["lTamanho"]); 
        }
        
        // -------------------- COR --------------------
        $dataBuscaC["Produto"] = $pProduto;
        $dataBuscaC["Distinct"]["IdCor"] = true;
        $dataBuscaC["JoinCor"] = true;
        
        $data["lCor"] = $ci->Produto_Estoque_model->Listar($dataBuscaC);
        
        if(count($data["lCor"]) > 0)
        {
            if($pListarEstoque == true){
                
                $n = 0;
                foreach($data["lCor"] as $itemCor){
                    
                    $data["lCor"][$n]["Qtde_Estoque"] = produtoEstoque_CalcularEstoqueVariante($pProduto,"Cor",$itemCor["IdCor"]);
                    $n++;
                }
            }
        }
        else{
            unset($data["lCor"]); 
        }
        
        return $data;
    }
    
    function produtoEstoque_CalcularEstoqueVariante($pProduto,$pTipo = "todos",$pIdVariante = null){
        
        $ci =  get_instance();
         
        $dataBusca["Produto"]       = $pProduto;
        
        if($pTipo == "Tamanho"){
            $dataBusca["Tamanho"]["Id"] = $pIdVariante;
        }
        if($pTipo == "Cor"){
            $dataBusca["Cor"]["Id"] = $pIdVariante;
        }
        
        $lEstoque = $ci->Produto_Estoque_model->Listar($dataBusca);
        
        $totalEstoque = 0;
        foreach($lEstoque as $itemEstoque){
        
            $totalEstoque = $totalEstoque + $itemEstoque["Qtde_estoque"];
            
        }
                
        return $totalEstoque;
    }

    function produtoEstoque_DefinirCSSVariante($pQtde){
        
        $css = "";
        
        if($pQtde < 1){
            
            $css = "esgotado";
            
        }
        else{
            
            $valor = BuscarValorConfig("EstoqueVarianteAlerta");
            
            if($pQtde <= $valor){
                
                $css = "alerta";
                
            }
        }
        
        return $css;
    }