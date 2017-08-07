<?php

    function carrinho_gerarNumero(){
        
        $ci = get_instance();    
        $tamanho = 8;
        
        // Caracteres de cada tipo
        $letras  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numeros = '1234567890';
        
        // Variáveis internas
        $retorno    = '';
        $caracteres = '';
        
        // Agrupamento
        $caracteres .= $letras;
        $caracteres .= $numeros;
        
        // Calculo
        $len = strlen($caracteres);
        
        $IsValidado = false;
        
        while($IsValidado == false){
                       
            for ($n = 1; $n <= $tamanho; $n++) {
                
                // número aleatório de 1 até $len para pegar um dos caracteres
                $rand = mt_rand(1, $len);
                
                // Concatenamos um dos caracteres na variável $retorno
                $retorno .= $caracteres[$rand-1];
            }
            
            $dataBusca["Numero"] = $retorno;
            
            if( count($ci->Cliente_Pedidos_model->Listar($dataBusca) ) < 1  ){
                
                $IsValidado = true;
                
            } 
        }
        
        return $retorno;

    }