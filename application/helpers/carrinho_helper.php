<?php

    function carrinho_adicionarProdutoSessao($pData){
        
        $ci = get_instance();
        
        $CarrinhoCount = $ci->session->userdata("CarrinhoCount"); 
        
        if( (empty($CarrinhoCount)) or ($CarrinhoCount == 0) ){
            
            $CarrinhoCount = 1;
            
            $ci->session->set_userdata("Carrinho{$CarrinhoCount}IdProduto"      ,$pData["Produto"]["Id"]);                              //IdProduto
            $ci->session->set_userdata("Carrinho{$CarrinhoCount}Quantidade"     ,$pData["Quantidade"]);                                 //Quantidade
            $ci->session->set_userdata("Carrinho{$CarrinhoCount}Preco"          ,$pData["Produto"]["Preco"]);                           //Preco
            $ci->session->set_userdata("Carrinho{$CarrinhoCount}SubTotal"       ,$pData["Produto"]["Preco"] * $pData["Quantidade"]); 
            
            if( !empty($pData["lVariantes"]["Tamanho"]) ){$ci->session->set_userdata("Carrinho{$CarrinhoCount}IdTamanho",$pData["lVariantes"]["Tamanho"]); } //Preco
            if( !empty($pData["lVariantes"]["Cor"]) )    {$ci->session->set_userdata("Carrinho{$CarrinhoCount}IdCor"    ,$pData["lVariantes"]["Cor"]);}       //Preco
            
            $ci->session->set_userdata("IdProduto{$pData["Produto"]["Id"]}Count","1");                                                  //ProdutoCount
            
            // --- Valor Total ---
            $valorTotalCarrinho = $pData["Produto"]["Preco"]*$pData["Quantidade"];
            $ci->session->set_userdata("CarrinhoValorTotal",$valorTotalCarrinho);
            
        }else{
            
            if(!empty($ci->session->userdata("IdProduto{$pData["Produto"]["Id"]}Count"))){
                
                $CountProduto = $ci->session->userdata("IdProduto{$pData["Produto"]["Id"]}Count");  //ProdutoCount
                
                $QtdeProduto  = $ci->session->userdata("Carrinho{$CountProduto}Quantidade");        //Quantidade Produto Atual
                $PrecoProduto  = $ci->session->userdata("Carrinho{$CountProduto}Preco");            //Preco Produto Atual
                
                $ci->session->set_userdata("Carrinho{$CountProduto}Quantidade",$QtdeProduto+$pData["Quantidade"]);
                $ci->session->set_userdata("Carrinho{$CountProduto}SubTotal",($QtdeProduto+$pData["Quantidade"])*$PrecoProduto);
                
            }
            else{
                
                $CarrinhoCount++;
            
                $ci->session->set_userdata("Carrinho{$CarrinhoCount}IdProduto"      ,$pData["Produto"]["Id"]);                              //IdProduto
                $ci->session->set_userdata("Carrinho{$CarrinhoCount}Quantidade"     ,$pData["Quantidade"]);                                 //Quantidade
                $ci->session->set_userdata("Carrinho{$CarrinhoCount}Preco"          ,$pData["Produto"]["Preco"]);                           //Preco
                $ci->session->set_userdata("Carrinho{$CarrinhoCount}SubTotal"       ,$pData["Produto"]["Preco"] * $pData["Quantidade"]); 
                
                if( !empty($pData["lVariantes"]["Tamanho"]) ){$ci->session->set_userdata("Carrinho{$CarrinhoCount}IdTamanho",$pData["lVariantes"]["Tamanho"]); } //Preco
                if( !empty($pData["lVariantes"]["Cor"]) )    {$ci->session->set_userdata("Carrinho{$CarrinhoCount}IdCor"    ,$pData["lVariantes"]["Cor"]);}      //Preco
            
                $ci->session->set_userdata("IdProduto{$pData["Produto"]["Id"]}Count",$CarrinhoCount);                                       //ProdutoCount
                
            }
            
            // --- Valor Total ---
            $valorTotalCarrinho = $ci->session->userdata("CarrinhoValorTotal");
            $valorTotalCarrinho = $valorTotalCarrinho + ($pData["Produto"]["Preco"]*$pData["Quantidade"]);
            
            $ci->session->set_userdata("CarrinhoValorTotal",$valorTotalCarrinho);
        }
        
        $ci->session->set_userdata("CarrinhoCount",$CarrinhoCount);
    }

    function carrinho_limpar(){
        
        $ci = get_instance();
        
        // --- CONTEUDO ---
        $CarrinhoCount = $ci->session->userdata("CarrinhoCount"); 
        
        for($n = 1;$n <= $CarrinhoCount;$n++){
            
            $idProduto = $ci->session->userdata("Carrinho{$n}IdProduto");
            
            carrinho_unsetDataCount($n);
            
            $ci->session->unset_userdata("IdProduto{$idProduto}Count");
        }
        
        $ci->session->set_userdata("CarrinhoCount",0); 
        $ci->session->set_userdata("CarrinhoValorTotal",0);
        
    }

    function carrinho_unsetDataCount($pCountCarrinho){
        
        $ci = get_instance();   
        
        $ci->session->unset_userdata("Carrinho{$pCountCarrinho}IdProduto");
        $ci->session->unset_userdata("Carrinho{$pCountCarrinho}Quantidade"); 
        $ci->session->unset_userdata("Carrinho{$pCountCarrinho}Preco");         
        $ci->session->unset_userdata("Carrinho{$pCountCarrinho}SubTotal"); 
        $ci->session->unset_userdata("Carrinho{$pCountCarrinho}IdTamanho"); 
        $ci->session->unset_userdata("Carrinho{$pCountCarrinho}IdCor"); 

    }