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
        
        $totalEstoque = array();
        $totalEstoque["EstoqueTotal"] = 0;
        $totalEstoque["lDetalhada"] = array();
        foreach($lEstoque as $itemEstoque){
            
            $totalEstoque["EstoqueTotal"] = $totalEstoque["EstoqueTotal"] + $itemEstoque["Qtde_estoque"];
            
            unset($item);
            if($pTipo == "Tamanho"){
                $item["Chave"]            = "EstoqueIdCor{$itemEstoque["IdCor"]}";
                $item["Conteudo"]         = $itemEstoque["Qtde_estoque"];
            }
            if($pTipo == "Cor"){
                $item["Chave"]            = "EstoqueIdTamanho{$itemEstoque["IdTamanho"]}";
                $item["Conteudo"]         = $itemEstoque["Qtde_estoque"];
            }
            
            array_push($totalEstoque["lDetalhada"],$item);
        }    
        
        //var_dump($totalEstoque);
                
        return $totalEstoque;
    }
    
    function produtoEstoque_BuscarEstoqueVariante($pProduto,$pIdTamanho,$pIdCor){
        
        $ci =  get_instance();
         
        if( ($pIdTamanho != null) or ($pIdCor != null) )
        {
            $dataBusca["Produto"]     = $pProduto;
            
            if($pIdTamanho != null){
                $dataBusca["IdTamanho"]   = $pIdTamanho;   
            }
            if($pIdCor != null){
                $dataBusca["IdCor"]       = $pIdCor;
            }
            
            $dataBusca["IsBusca"]     = true;
            
            $estoque = $ci->Produto_Estoque_model->Listar($dataBusca)["Qtde_estoque"];
        }
        else{
            
            $dataBusca["Id"]     = $pProduto["Id"];
            $dataBusca["IsBusca"]= true;
            
            $estoque = $ci->Produto_model->Listar($dataBusca)["EstoqueTotal"];
            
        }
        

        return $estoque;
    }


    function produtoEstoque_DefinirCSSVariante($pQtde){
        
        $info               = array();
        $info["css"]        = "";
        $info["qtdeAlerta"] = 1000000;
            
        if($pQtde < 1){
            
            $info["css"] = "esgotado";
            
        }
        else{
            
            $info["qtdeAlerta"] = BuscarValorConfig("EstoqueVarianteAlerta");
            
            if($pQtde <= $info["qtdeAlerta"]){
                
                $info["css"] = "alerta";
                
            }
        }
        
        return $info;
    }

    function produtoEstoque_DefinirCSSEstoqueProduto($pQtde){
        
        $info               = array();
        $info["css"]        = "";
        $info["qtdeAlerta"] = 1000000;
            
        if($pQtde < 1){
            
            $info["css"] = "esgotado";
            
        }
        else{
            
            $info["qtdeAlerta"] = BuscarValorConfig("EstoqueAlerta");
            
            if($pQtde <= $info["qtdeAlerta"]){
                
                $info["css"] = "alerta";
                
            }
        }
        
        return $info;
    }

    function produtoEstoque_darBaixaEstoque($pCount,$pIdProduto){
        
        $ci = get_instance();
        
        $IdTamanho = $ci->input->post("IdTamanho{$pCount}");
        $IdCor     = $ci->input->post("IdCor{$pCount}");
        
        if( !empty($IdTamanho) ){
            $dataBusca["Tamanho"]["Id"] = $IdTamanho;
        }
        if( !empty($IdCor) ){
            $dataBusca["Cor"]["Id"] = $IdCor;
        }
        
        $dataBusca["IdProduto"]     = $pIdProduto;
        $dataBusca["IsBusca"]       = true;
        
        $EstoqueProduto = $ci->Produto_Estoque_model->Listar($dataBusca);
        
        $qtdeBaixa = $ci->input->post("IdQuantidade{$pCount}");
        
        if( !empty($EstoqueProduto)){
            
            if($EstoqueProduto["Qtde_estoque"] >= $qtdeBaixa){
                
               $dataAtualizacao["Id"]          = $EstoqueProduto["Id"];
               $dataAtualizacao["Qtde_estoque"]= $EstoqueProduto["Qtde_estoque"] - $qtdeBaixa;
                
               $ci->Produto_Estoque_model->Atualizar($dataAtualizacao);
                
            }
        }
        
        $dataBuscaProduto["Id"]     = $pIdProduto;
        $dataBuscaProduto["IsBusca"]= true;
        
        $produto = $ci->Produto_model->Listar($dataBuscaProduto);
        
        $dataAtualizacaoProduto["Id"] = $pIdProduto;
        $dataAtualizacaoProduto["EstoqueTotal"] = $produto["EstoqueTotal"] - $qtdeBaixa;
        
        $ci->Produto_model->Atualizar($dataAtualizacaoProduto);
        
        //var_dump($EstoqueProduto);
    }