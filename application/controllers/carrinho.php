<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Carrinho extends CI_Controller{
        
        // --- PAGINAS ---
	    public function index(){	
            
            // --- HEADER ---
            $header = preencheConteudoHeader();
            
            // --- CONTEUDO ---
            $CarrinhoCount = $this->session->userdata("CarrinhoCount"); 
            
            $lCarrinho = array();
            $valorTotal = 0;
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
                    
                    $valorTotal = $valorTotal + $itemProduto["SubTotal"];
                    
                    array_push($lCarrinho,$itemProduto);
                
                }
            }
            
            //var_dump($lCarrinho);

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "valorTotal"       => $valorTotal
                ,"lCarrinho"        => $lCarrinho
                ,"header"	        => $header
                ,"title"            => "Loja Virtual | Carrinho"
                ,"atual_page"       => "produtos");

            /*VIEW*/$this->load->template("carrinho.php",$content);
            
	     }
       
         // ------------ POST(Funcoes/CRUD) ------------ //
         public function incluir_post(){
             
            $this->output->enable_profiler(TRUE); 
         
            $data["Quantidade"]	    = $this->input->post("quantidade");  
		    $data["Produto"]["Id"]	= $this->input->post("idproduto"); 
         
            carrinho_adicionarProdutoSessao($data); 
             
            redirect("produtos/produto_descricao/{$data["Produto"]["Id"]}"); 
         } 
         
         public function limpar_carrinho(){
             
            $this->output->enable_profiler(TRUE); 
         
            // --- CONTEUDO ---
            $CarrinhoCount = $this->session->userdata("CarrinhoCount"); 
            
            for($n = 1;$n <= $CarrinhoCount;$n++){
                
                $idProduto = $this->session->userdata("Carrinho{$n}IdProduto");
                
                $this->session->unset_userdata("Carrinho{$n}IdProduto");
                $this->session->unset_userdata("Carrinho{$n}Quantidade"); 
                $this->session->unset_userdata("IdProduto{$idProduto}Count");
            }
            
            $this->session->set_userdata("CarrinhoCount",0); 
            
            redirect("carrinho");
         } 
         
         public function excluir_produto_carrinho($pCount){
             
            $this->output->enable_profiler(TRUE); 
         
            // --- CONTEUDO ---
            $CarrinhoCount = $this->session->userdata("CarrinhoCount"); 
            $IdProduto     = $this->session->userdata("Carrinho{$pCount}IdProduto");
            
            $this->session->unset_userdata("Carrinho{$pCount}IdProduto");
            $this->session->unset_userdata("Carrinho{$pCount}Quantidade"); 
            $this->session->unset_userdata("IdProduto{$IdProduto}Count");

            $this->session->set_userdata("CarrinhoCount",$CarrinhoCount - 1); 
            
            for($n = $pCount+1;$n <= $CarrinhoCount;$n++){
                
                $IdProdutoAtual  = $this->session->userdata("Carrinho{$n}IdProduto");
                $QuantidadeAtual = $this->session->userdata("Carrinho{$n}Quantidade"); 
                $CountAtual      = $this->session->userdata("IdProduto{$n}Count");
                
                $NovoCount = $n-1;
                $this->session->set_userdata("Carrinho{$NovoCount}IdProduto",$IdProdutoAtual);
                $this->session->set_userdata("Carrinho{$NovoCount}Quantidade",$QuantidadeAtual); 
                $this->session->set_userdata("IdProduto{$NovoCount}Count",$n-1);
                
            }
            
            $this->session->unset_userdata("Carrinho{$CarrinhoCount}IdProduto");
            $this->session->unset_userdata("Carrinho{$CarrinhoCount}Quantidade"); 
            $this->session->unset_userdata("IdProduto{$CarrinhoCount}Count");
            
            redirect("carrinho");
         } 
        
    }