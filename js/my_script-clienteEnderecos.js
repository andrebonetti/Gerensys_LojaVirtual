$(".cep").mask("99999-999");

$(document).ready( function() {
   
   $('.cep').change(function(){

           $.ajax({
                type : 'POST',
                url: "http://localhost/Gerensys_LojaVirtual/index.php/Ajax_Post/ConsultarCep",
                dataType: 'json', 
                data: {cep: $('.cep').val()},
                success: function(data){
                    
                    if(data.sucesso == 1){

                        $('.endereco').val(data.rua);
                        $('.bairro').val(data.bairro);
                        $('.cidade').val(data.cidade);
                        $('.estado').val(data.estado);
 
                        $('.numero').focus();
                    }
                    else{
                    }
                }
           });  
       
   return false;    
   })
});