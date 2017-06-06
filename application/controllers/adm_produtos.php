<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Adm_produtos extends CI_Controller{
        
		public function produtos(){	
            
            $this->output->enable_profiler(TRUE);    

            $lProduto				= $this->Produto_model				->Listar(array("Join" => true));
            
            /* -- Tabelas Filhas -- */
            $lUnidadeApresentacao 	= $this->UnidadeApresentacao_model	->Listar(array("Join" => true),"Codigo");
			$lCest 					= $this->Cest_model					->Listar(array("Join" => true),"Codigo");
			$lCst_Csosn 			= $this->Cst_Csosn_model			->Listar(array("Join" => true),"Codigo");
			$lFornecedor 			= $this->Fornecedor_model			->Listar(array("Join" => true),"Descricao");
			$lFotos_Produtos 		= $this->Fotos_produtos_model		->Listar(array("Join" => true),"NomeArquivo");
			$lGrupo 				= $this->Grupo_model				->Listar(array("Join" => true),"Descricao");
			$lNcm_sh 				= $this->Ncm_sh_model				->Listar(array("Join" => true),"Codigo");
			$lPreco 				= $this->Preco_model				->Listar(array("Join" => true),"IdProduto");
			$lPromocao 				= $this->Promocao_model				->Listar(array("Join" => true),"IdProduto");
			$lSetor 				= $this->Setor_model				->Listar(array("Join" => true),"Descricao");
			$lSubGrupo 				= $this->SubGrupo_model				->Listar(array("Join" => true),"Descricao");
			$lTipo 					= $this->Tipo_model					->Listar(array("Join" => true),"Descricao");
			$lTipoPreco 			= $this->TipoPreco_model			->Listar(array("Join" => true),"Descricao");
			
			echo "lProduto \/";
			foreach($lProduto as $itemProduto){
				
				var_dump($itemProduto);
				
			}

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "lProdutos"   => $lProduto
                ,"atual_page"  => "produtos");

            /*VIEW*///$this->load->template("adm/adm_produtos.php",$content);
            
	   }
	   
	   public function Incluir(){	
            
            $this->output->enable_profiler(TRUE);    

			$data = produtos_getPosts();	

			var_dump($data);

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "produtos");

            /*VIEW*/$this->load->template("adm/adm_produtos.php",$content);
            
	   }
	   
    }