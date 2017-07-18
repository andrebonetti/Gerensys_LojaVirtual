<?php

    function preencheConteudoHeader(){
        
        $ci = get_instance();
        
        $ci->output->enable_profiler(TRUE); 
        
        // --- SESSAO CLIENTE ---
        $data["Cliente"]      = cliente_validarSessao();
        
        // --- LISTA SETORES ---
        $data["lSetorHeader"] = $ci->Setor_model->Listar(); 
        
        // --- QUANTIDADE CARRINHO ---
        $QtdeCarrinho = $ci->session->userdata("CarrinhoCount");
        
        if(empty($QtdeCarrinho)){
            $data["QuantidadeCarrinho"] = 0;
        }
        else{
            $data["QuantidadeCarrinho"] = $QtdeCarrinho;
        }

        return $data;
    }