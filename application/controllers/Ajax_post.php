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

    public function ConsultarFrete(){
        
         //Código da sua empresa, se você tiver contrato com os correios saberá qual é esse código… Ele é opcional, se não tiver apenas envie o parâmetro em branco.
         $data['nCdEmpresa'] = '';
         
         //Senha de acesso ao serviço. Geralmente é os 8 primeiros números do CNPJ correspondente ao código administrativo, caso não tiver é só passar o parâmetro em branco
         $data['sDsSenha'] = '';
         
         //CEP de onde sai à encomenda. Esse parametro precisa ser numérico, ou seja, você deverá formatar ele para que não entre o “-“ (hífen) espaços ou algo diferente de um número.
         $data['sCepOrigem'] = BuscarValorConfig("CepEmpresa");
         
         //CEP de destino, é o CEP do comprador, para onde irá o produto, esse parâmetro também é somente números.
         $data['sCepDestino'] = preg_replace("/-/", "",  $this->input->post("cepDestino"));//'08270698';// POST
         
         //O peso do produto deverá ser enviado em quilogramas, leve em consideração que isso deverá incluir o peso da embalagem.
         $data['nVlPeso'] = $this->input->post("pesoBruto");  //'1'; // POST
         
         //1 para caixa / pacote  
         //2 para rolo/prisma.
         $data['nCdFormato'] = '1';
         
         //O comprimento, altura, largura e diametro deverá ser informado em centímetros e somente números
         $data['nVlComprimento'] = $this->input->post("comprimento");//'16';
         $data['nVlAltura'] = $this->input->post("altura");//'5';
         $data['nVlLargura'] = $this->input->post("largura");//'15';
         $data['nVlDiametro'] = $this->input->post("diametro");//'0';
         
         //nesse parâmetro você informa se quer a encomenda deverá ser entregue somente para uma determinada pessoa após confirmação por RG. Use “s” para declarar e “n” para não declarar.
         $data['sCdMaoPropria'] = 'n';  
         
         //O valor declarado serve para o caso de sua encomenda extraviar, então você poderá recuperar o valor dela. Vale lembrar que o valor da encomenda interfere no valor do frete. Se não quiser declarar pode passar 0 (zero).  
         $data['nVlValorDeclarado'] = '0';
         
         //No parâmetro aviso de recebimento, você informa se quer ser avisado sobre a entrega da encomenda. Para não avisar use “n”, para avisar use “s”.
         $data['sCdAvisoRecebimento'] = 'n';
         
         //Popup – mostra uma janela pop-up
         //URL – envia os dados via post para a URL informada
         //XML – Retorna a resposta em XML
         $data['StrRetorno'] = 'xml';
         
         //40010 SEDEX Varejo.
         //40045 SEDEX a Cobrar Varejo.
         //40215 SEDEX 10 Varejo.
         //40290 SEDEX Hoje Varejo.
         //41106 PAC Varejo.
         $data['nCdServico'] = '40010,41106';
         
         //Transforma a array em uma url com parametros e valores
         $dataHTTP = http_build_query($data);

         //URL do WebService
         $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
         
         //Url com os Parametros
         $curl = curl_init($url . '?' . $dataHTTP);
         
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         
         $result = curl_exec($curl);
         
         $result = simplexml_load_string($result);
         
         foreach($result -> cServico as $row) {
             
             var_dump($row);
             
             //Os dados de cada serviço estará aqui
             if($row -> Erro == 0) {
                 echo $row -> Codigo . '<br>';
                 echo $row -> Valor . '<br>';
                 echo $row -> PrazoEntrega . '<br>';
                 echo $row -> ValorMaoPropria . '<br>';
                 echo $row -> ValorAvisoRecebimento . '<br>';
                 echo $row -> ValorValorDeclarado . '<br>';
                 echo $row -> EntregaDomiciliar . '<br>';
                 echo $row -> EntregaSabado;
             } else {
                 echo $row -> MsgErro;
             }
             echo '<hr>';
             
         }
        
    }
    
    /*public function ProdutoDescricao_VerificarEstoqueVariante(){
        
        $idProduto = $this->input->post("idProduto");  
        $tipo      = $this->input->post("tipo"); 
        $id        = $this->input->post("id"); 
        
    }*/
    
}