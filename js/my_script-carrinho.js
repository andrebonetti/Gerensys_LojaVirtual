$(document).on("click", ".plus", function(){
       
    input = $(this).closest(".quantidade").find(".input-qtde");
    qtdeAtual = parseInt(input.val());
    
    tr  = $(this).closest("tr");
    precoProduto = tr.find(".preco-unitario").attr("value");
    idProduto = tr.find(".item").attr("value");
    Count = parseInt(tr.find(".item").text());
    
    AlterarSessaoCarrinho(1,idProduto,precoProduto,Count);
    
    input.val(qtdeAtual + 1);   
});

$(document).on("click", ".less", function(){
       
    input = $(this).closest(".quantidade").find(".input-qtde");
    qtdeAtual = parseInt(input.val());
    
    if(qtdeAtual > 0){
        
        tr  = $(this).closest("tr");
        precoProduto = tr.find(".preco-unitario").attr("value");
        idProduto = tr.find(".item").attr("value");
        Count = parseInt(tr.find(".item").text());
        
        AlterarSessaoCarrinho(-1,idProduto,precoProduto,Count);
        
        input.val(qtdeAtual - 1);
    }
    
});

function AlterarSessaoCarrinho(pTipo,pIdProduto,pPrecoProduto,pCount){
    
    jQuery.ajax({
        type: "POST",
        url: "http://localhost/Gerensys_LojaVirtual/index.php/Ajax_Post/AlterarSessaoCarrinho",
        dataType: 'json',
        data: {quantidade: pTipo, idProduto: pIdProduto,precoProduto: pPrecoProduto,count: pCount},
        success: function(res) {  
            if (res)
            {
                $(".shop").find(".valor").text(res.ValorTotal);
                $(".subTotal-"+pCount).text(res.SubTotalProdutoAtual);
            }
        }
    });
      
}