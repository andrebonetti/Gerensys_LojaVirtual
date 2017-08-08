<?php

    function BuscarValorConfig($pChave){
        
        $ci = get_instance();
        
        $dataBusca["Chave"] = $pChave;
        $dataBusca["IsBusca"] = true;
        
        $config = $ci->Config_model->Listar($dataBusca);
        
        return($config["Valor"]);
    }