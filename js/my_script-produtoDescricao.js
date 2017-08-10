// Valida Variantes
hasVariante =  $(".has-variante").text();
if(hasVariante == 1){  
    $(".compra-rapida").prop("disabled", true);
    $(".adicionar-carrinho").prop("disabled", true);
    
    $(".alerta-variantes").show();
}

$(document).on("click", ".variante-option", function(){

    tipo = $(this).attr("data-name");
    id = $(this).attr("data-value");
    descricao = $(this).attr("data-content");
    
    $("."+tipo+"-input").val(id);
    $("."+tipo+"-td").text(descricao);
    
    $(this).closest(".listaVariantes").find(".variante-option").removeClass("activeVariante");
    $(this).addClass("activeVariante");
    
    //alert("tipo - "+tipo+" id - "+id+" descricao - "+descricao);
    
    validar_compra();
    
});

$(document).on("click", "p.activeVariante", function(){
    
    $(this).removeClass("activeVariante");
    
    tipo = $(this).attr("data-name");
    
    $("."+tipo+"-input").val("");
    $("."+tipo+"-td").text("");
    
    desativar_compra();
    
});

function validar_compra(){
    
    $validacao = true;
    
    //Tamanho
    hasVariante_tamanho =  $(".has-variante-tamanho").text();
    
    if(hasVariante_tamanho == 1){
        
        valorTamanho = $(".tamanho-input").val();
        
        if(valorTamanho == ""){
            $validacao = false;
        }
        
    }
    
    //Cor
    hasVariante_cor =  $(".has-variante-cor").text();
    
    if(hasVariante_cor == 1){
        
        valorCor = $(".cor-input").val();
        
        if(valorCor == ""){
            $validacao = false;
        }
        
    }
    
    if($validacao == true){
        ativar_compra();
    }
}

function ativar_compra(){
    
    $(".compra-rapida").prop("disabled", false);
    $(".adicionar-carrinho").prop("disabled", false);
    
    $(".alerta-variantes").hide();
    
}

function desativar_compra(){
    
    $(".compra-rapida").prop("disabled", true);
    $(".adicionar-carrinho").prop("disabled", true);
    
    $(".alerta-variantes").show();
    
}

