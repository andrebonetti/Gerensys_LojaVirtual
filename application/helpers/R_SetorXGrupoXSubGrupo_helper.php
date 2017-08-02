<?php

    function R_SetorXGrupoXSubGrupo_ListarRelacao(){
        
        $ci = get_instance();
            
        // TB
        $dataBuscaSetor["Distinct"]["IdSetor"]   = true;
        $dataBuscaSetor["JoinSetor"]             = true;
        $lSetor = $ci->R_SetorXGrupoXSubGrupo_model->Listar($dataBuscaSetor);
        
        $n = 0;
        foreach($lSetor as $itemSetor){
            
            $dataBuscaGrupo["Setor"]["Id"]         = $itemSetor["IdSetor"];
            $dataBuscaGrupo["Distinct"]["IdGrupo"] = true;
            $dataBuscaGrupo["JoinGrupo"]           = true;
            
            $lSetor[$n]["lGrupo"] = $ci->R_SetorXGrupoXSubGrupo_model->Listar($dataBuscaGrupo);
            
            $i = 0;
            foreach($lSetor[$n]["lGrupo"] as $itemGrupo){
                
                $dataBuscaSubGrupo["Setor"]["Id"]             = $itemSetor["IdSetor"];
                $dataBuscaSubGrupo["Setor"]["Grupo"]["Id"]    = $itemGrupo["IdGrupo"];
                $dataBuscaSubGrupo["Distinct"]["IdGrupo"]     = true;
                $dataBuscaSubGrupo["JoinSubGrupo"]            = true;
                
                $lSetor[$n]["lGrupo"][$i]["lSubGrupo"] = $ci->R_SetorXGrupoXSubGrupo_model->Listar($dataBuscaSubGrupo);
                  
                $i++;  
            }
            
            $n++;
        }
        
        return $lSetor;  
    }