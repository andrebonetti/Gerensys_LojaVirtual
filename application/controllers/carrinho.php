<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Carrinho extends CI_Controller{
        
        // --- PAGINAS ---
	    public function index(){	
            
            // --- HEADER ---
            $header = header_preencheConteudoHeader();
            
            // --- CONTEUDO ---
            $CarrinhoCount = $this->session->userdata("CarrinhoCount"); 
            
            $lCarrinho = array();
            for($n = 1;$n <= $CarrinhoCount;$n++){
                
                $dataProduto["Id"] = $this->session->userdata("Carrinho{$n}IdProduto"); 
                
                if(!empty($dataProduto["Id"])){
                
                    $dataProduto["Join"] = true;
                    $dataProduto["IsBusca"] = true;
                    
                    $produto = $this->Produto_model	->Listar($dataProduto);

                    $itemProduto["Produto"]    = $produto;
                    $itemProduto["Quantidade"] = $this->session->userdata("Carrinho{$n}Quantidade"); 
                    $itemProduto["SubTotal"]   = $produto["Preco"]*$itemProduto["Quantidade"];
                    $itemProduto["Count"]      = $n;
                    
                    array_push($lCarrinho,$itemProduto);
                
                }
            }
            
            //var_dump($lCarrinho);

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "lCarrinho"        => $lCarrinho
                ,"header"	        => $header
                ,"title"            => "Loja Virtual | Carrinho"
                ,"atual_page"       => "produtos");

            /*VIEW*/$this->load->template("carrinho.php",$content);
            
	     }
       
         // ------------ POST(Funcoes/CRUD) ------------ //
         public function incluir_post(){
             
            $this->output->enable_profiler(TRUE); 
         
            $data["Quantidade"]	     = $this->input->post("quantidade");  
		    $data["Produto"]["Id"]	 = $this->input->post("idproduto"); 
            $data["Produto"]["Preco"]= $this->input->post("precoproduto");  
             
            carrinho_adicionarProdutoSessao($data); 
             
            redirect("produtos/produto_descricao/{$data["Produto"]["Id"]}"); 
         } 
         
         public function limpar_carrinho(){
             
            $this->output->enable_profiler(TRUE); 
            
            carrinho_limpar();

            redirect("carrinho");
         } 
         
         public function excluir_produto_carrinho($pCount){
             
            $this->output->enable_profiler(TRUE); 
         
            // --- CONTEUDO ---
            $CarrinhoCount = $this->session->userdata("CarrinhoCount"); 
            $IdProduto     = $this->session->userdata("Carrinho{$pCount}IdProduto");
            
            // --- VALOR TOTAL ---
            if($CarrinhoCount == 1){
                $this->session->set_userdata("CarrinhoValorTotal",0);
            }
            else{
                $preco          = $this->session->userdata("Carrinho{$pCount}Preco"); 
                $quantidade     = $this->session->userdata("Carrinho{$pCount}Quantidade"); 
                $valorCarrinhoA = $this->session->userdata("CarrinhoValorTotal"); 
                
                $subPreco       = $preco * $quantidade; 
                
                $valorCarrinho  = $valorCarrinhoA-$subPreco;
                
                $this->session->set_userdata("CarrinhoValorTotal",$valorCarrinho);
            }
            
            // --- UNSET ---
            $this->session->unset_userdata("Carrinho{$pCount}IdProduto");
            $this->session->unset_userdata("Carrinho{$pCount}Quantidade"); 
            $this->session->unset_userdata("Carrinho{$pCount}Preco"); 
            $this->session->unset_userdata("IdProduto{$IdProduto}Count");

            $this->session->set_userdata("CarrinhoCount",$CarrinhoCount - 1); 
            
            for($n = $pCount+1;$n <= $CarrinhoCount;$n++){
                
                $IdProdutoAtual  = $this->session->userdata("Carrinho{$n}IdProduto");
                $QuantidadeAtual = $this->session->userdata("Carrinho{$n}Quantidade"); 
                $PrecoAtual      = $this->session->userdata("Carrinho{$n}Preco"); 
                $CountAtual      = $this->session->userdata("IdProduto{$n}Count");
                
                $NovoCount = $n-1;
                $this->session->set_userdata("Carrinho{$NovoCount}IdProduto" ,$IdProdutoAtual);
                $this->session->set_userdata("Carrinho{$NovoCount}Quantidade",$QuantidadeAtual); 
                $this->session->set_userdata("Carrinho{$NovoCount}Preco"     ,$PrecoAtual); 
                $this->session->set_userdata("IdProduto{$IdProdutoAtual}Count",$NovoCount);
                
            }
            
            $this->session->unset_userdata("Carrinho{$CarrinhoCount}IdProduto");
            $this->session->unset_userdata("Carrinho{$CarrinhoCount}Quantidade"); 
            $this->session->unset_userdata("Carrinho{$CarrinhoCount}Preco"); 
      
            redirect("carrinho");
         } 
    }