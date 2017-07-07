<?php

	// Validacao
    function produto_promocao_CalcularPromocao($pPorcentagemDesconto,$pPreco){
        
		$pPreco = $pPreco - ( $pPreco * ($pPorcentagemDesconto / 100) );

		return $pPreco;
    
    }

?>