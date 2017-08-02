<?php

    function preencheConteudoHeader(){
        
        $ci = get_instance();
        
        $ci->output->enable_profiler(TRUE); 
        
        // --- SESSAO CLIENTE ---
        $data["Cliente"]      = cliente_validarSessao();
        
        // --- LISTA SETORES ---
        $data["lSetorHeader"]  = R_SetorXGrupoXSubGrupo_ListarRelacao(); 
        
        /*var_dump($data["lSetorHeader"]);
        var_dump($data["lSetorHeader"][0]);
        var_dump($data["lSetorHeader"][0]["lGrupo"]);
        var_dump($data["lSetorHeader"][0]["lGrupo"][0]);*/
        
        // --- CARRINHO ---
        // QTDE
        $QtdeCarrinho = $ci->session->userdata("CarrinhoCount");
        
        if(empty($QtdeCarrinho)){$data["QuantidadeCarrinho"] = 0;}
        else{$data["QuantidadeCarrinho"] = $QtdeCarrinho;}
        
        //VALOR
        $valorCarrinho = $ci->session->userdata("CarrinhoValorTotal"); 
        
        if(empty($valorCarrinho)){$data["ValorCarrinho"] = 0;}
        else{$data["ValorCarrinho"] = $valorCarrinho;}

        return $data;
    }