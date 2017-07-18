<?php

    function carrinho_adicionarProdutoSessao($pData){
        
        $ci = get_instance();
        
        $CarrinhoCount = $ci->session->userdata("CarrinhoCount"); 
        
        if( (empty($CarrinhoCount)) or ($CarrinhoCount == 0) ){
            
            $CarrinhoCount = 1;
            
            $ci->session->set_userdata("Carrinho{$CarrinhoCount}IdProduto",$pData["Produto"]["Id"]);
            $ci->session->set_userdata("Carrinho{$CarrinhoCount}Quantidade",$pData["Quantidade"]); $ci->session->set_userdata("Carrinho{$CarrinhoCount}Quantidade",$pData["Quantidade"]);
            $ci->session->set_userdata("IdProduto{$pData["Produto"]["Id"]}Count","1");
        }else{
            
            if(!empty($ci->session->userdata("IdProduto{$pData["Produto"]["Id"]}Count"))){
                
                $CountProduto = $ci->session->userdata("IdProduto{$pData["Produto"]["Id"]}Count");
                
                $QtdeProduto  = $ci->session->userdata("Carrinho{$CountProduto}Quantidade");
                
                $ci->session->set_userdata("Carrinho{$CountProduto}Quantidade",$QtdeProduto+$pData["Quantidade"]);
            }
            else{
                $CarrinhoCount++;
            
                $ci->session->set_userdata("Carrinho{$CarrinhoCount}IdProduto",$pData["Produto"]["Id"]);
                $ci->session->set_userdata("Carrinho{$CarrinhoCount}Quantidade",$pData["Quantidade"]);
                $ci->session->set_userdata("IdProduto{$pData["Produto"]["Id"]}Count",$CarrinhoCount);
            }
            
        }
        
        $ci->session->set_userdata("CarrinhoCount",$CarrinhoCount);
    }