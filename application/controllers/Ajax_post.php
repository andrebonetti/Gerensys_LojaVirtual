<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Post extends CI_Controller {

	public function index(){
		$this->load->view("ajax_post_view");
	}

	public function Valida_existencia() {
		
		$data = array(
			'tabela' 	=> $this->input->post('tabela'),
			'coluna'	=>$this->input->post('coluna'),
			'valor'		=>$this->input->post('valor')
		);
        
        /*$data = array(
			'tabela' 	=> "tb_codigosalternativos",
			'coluna'	=> "Codigo",
			'valor'		=> "A1"
		);*/
        
		$lRegistros	= $this->Functions_model ->Validar_Existencia($data);
		
		$dataResult = array();
		if(count($lRegistros) > 0){
			
			$dataResult["Status"] = "1";
            $dataResult["Titulo"]  = "'". $data["coluna"] ."' ja existênte"; 
            
            if((isset($lRegistros[0]["Codigo"]))and(isset($lRegistros[0]["Descricao"]))){
			     $dataResult["Mensagem"]  = "Registro ( ". $lRegistros[0]["Codigo"] ." - ". $lRegistros[0]["Descricao"] ." )";
            }
            else{
                if($data["tabela"] == "tb_codigosalternativos"){
                    
                    $dataC[$data["coluna"]] = $data["valor"];
                    $dataC["IsBusca"]       = true;
                    $dataC["Join"]          = true;
                    
                    $CodigoAlternativo = $this->CodigosAlternativos_model->Listar($dataC);
		            
                    $dataResult["Mensagem"]  = "Registro: Produto ( ". $CodigoAlternativo["Codigo"] ." - ". $CodigoAlternativo["Descricao"] ." )";
                }
            }
		}
		else{
			$dataResult["Status"] = "2";
			$dataResult["Mensagem"]  = "";
		}
        
        //var_dump($dataResult);

		echo json_encode($dataResult);
	}
    
	public function AlterarSessaoCarrinho() {
		     
        $data["Quantidade"]	     = $this->input->post("quantidade");  
        $data["Produto"]["Id"]	 = $this->input->post("idProduto"); 
        $data["Produto"]["Preco"]= $this->input->post("precoProduto");  
        
        $count                   = $this->input->post("count");  
             
        carrinho_adicionarProdutoSessao($data);
        
        $dataResult = array();
		$dataResult["ValorTotal"]             = numeroEmReais($this->session->userdata("CarrinhoValorTotal")); 
        $dataResult["SubTotalProdutoAtual"]   = numeroEmReais($this->session->userdata("Carrinho{$count}SubTotal")); 
        
		echo json_encode($dataResult);
	}
    
    public function ConsultarCep(){
        
        $cep = $this->input->post("cep");  
        //$cep = "03627-100";
        $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $cep);

        $dados['sucesso'] = (string) $reg->resultado;
        $dados['rua']     = (string) $reg->tipo_logradouro . ' ' . $reg->logradouro;
        $dados['bairro']  = (string) $reg->bairro;
        $dados['cidade']  = (string) $reg->cidade;
        $dados['estado']  = (string) $reg->uf;

        echo json_encode($dados);
        
    }
    
    /*public function ProdutoDescricao_VerificarEstoqueVariante(){
        
        $idProduto = $this->input->post("idProduto");  
        $tipo      = $this->input->post("tipo"); 
        $id        = $this->input->post("id"); 
        
    }*/
    
}