<?php

    function carrinho_adicionarProdutoSessao($pData){
        
        $ci = get_instance();
        
        $CarrinhoCount = $ci->session->userdata("CarrinhoCount"); 
        
        if( (empty($CarrinhoCount)) or ($CarrinhoCount == 0) ){
            
            $CarrinhoCount = 1;
            
            $ci->session->set_userdata("Carrinho{$CarrinhoCount}IdProduto"      ,$pData["Produto"]["Id"]);   //IdProduto
            $ci->session->set_userdata("Carrinho{$CarrinhoCount}Quantidade"     ,$pData["Quantidade"]);      //Quantidade
            $ci->session->set_userdata("Carrinho{$CarrinhoCount}Preco"          ,$pData["Produto"]["Preco"]);//Preco
            
            $ci->session->set_userdata("IdProduto{$pData["Produto"]["Id"]}Count","1");                       //ProdutoCount
            
            // --- Valor Total ---
            $valorTotalCarrinho = $pData["Produto"]["Preco"]*$pData["Quantidade"];
            $ci->session->set_userdata("CarrinhoValorTotal",$valorTotalCarrinho);
            
        }else{
            
            if(!empty($ci->session->userdata("IdProduto{$pData["Produto"]["Id"]}Count"))){
                
                $CountProduto = $ci->session->userdata("IdProduto{$pData["Produto"]["Id"]}Count"); //ProdutoCount
                
                $QtdeProduto  = $ci->session->userdata("Carrinho{$CountProduto}Quantidade");       //Quantidade Produto Atual
                
                $ci->session->set_userdata("Carrinho{$CountProduto}Quantidade",$QtdeProduto+$pData["Quantidade"]);
            }
            else{
                $CarrinhoCount++;
            
                $ci->session->set_userdata("Carrinho{$CarrinhoCount}IdProduto"      ,$pData["Produto"]["Id"]);   //IdProduto
                $ci->session->set_userdata("Carrinho{$CarrinhoCount}Quantidade"     ,$pData["Quantidade"]);      //Quantidade
                $ci->session->set_userdata("Carrinho{$CarrinhoCount}Preco"          ,$pData["Produto"]["Preco"]);//Preco
            
                $ci->session->set_userdata("IdProduto{$pData["Produto"]["Id"]}Count",$CarrinhoCount);                       //ProdutoCount
            
            }
            
            // --- Valor Total ---
            $valorTotalCarrinho = $ci->session->userdata("CarrinhoValorTotal");
            $valorTotalCarrinho = $valorTotalCarrinho + ($pData["Produto"]["Preco"]*$pData["Quantidade"]);
            
            $ci->session->set_userdata("CarrinhoValorTotal",$valorTotalCarrinho);
        }
        
        $ci->session->set_userdata("CarrinhoCount",$CarrinhoCount);
    }