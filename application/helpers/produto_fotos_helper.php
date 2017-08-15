<?php

    function produtoFotos_ListarPorCor($pProduto){
        
        $ci = get_instance();
        
        $dataBusca["Produto"] = $pProduto;
        $dataBusca["Distinct"]["IdCor"] = true;
        
        $lCor = $ci->Produto_Fotos_model->Listar($dataBusca);
        
        $n = 0;
        $fotos = array();
        foreach($lCor as $item){
            
            if($n == 0){
                $dataBuscaCor["Cor"]["Id"] = $pProduto["IdCor"];
            }
            else{
                
                if($item["IdCor"] != $pProduto["IdCor"]){
                    $dataBuscaCor["Cor"]["Id"] = $item["IdCor"];
                }
                
            }
            
            $dataBuscaCor["Produto"]   = $pProduto;
               
            $dataCor["IdCor"] = $dataBuscaCor["Cor"]["Id"];
            $dataCor["Fotos"] = $ci->Produto_Fotos_model->Listar($dataBuscaCor);
            
            array_push($fotos,$dataCor);
            
            $n++;
        }
        
        return $fotos;
        
    }