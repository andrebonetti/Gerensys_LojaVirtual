<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Produtos extends CI_Controller{
        
		public function index($pPaginaAtual = 2,$pFiltro = null,$pValor = null){	
            
            $this->output->enable_profiler(TRUE);   
            
            // --- PAGINACAO ----
            $limite 			= '5';
			$inicio				= ($pPaginaAtual*$limite)-$limite;
		
			$produtoData["Join"]   = true;
			$produtoData["Limite"] = $limite;
			$produtoData["OffSet"] = $inicio;
			
			// -- MODEL -- //
            $lProduto			= $this->Produto_model	->Listar($produtoData); 
            
            //$numeroPaginas 		= ($num_imoveis/$limite);
			
            // -- Entidades Pai --
			$lSetor		= $this->Setor_model	->Listar(); 
			$lCor		= $this->Cor_model		->Listar(); 
			$lGrupo		= $this->Grupo_model	->Listar(); 
			$lMarca		= $this->Marca_model	->Listar(); 
			$lSubGrupo	= $this->SubGrupo_model	->Listar();
			
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
            	"lProduto"		=> $lProduto
            	,"lSetor"		=> $lSetor
            	,"lCor"			=> $lCor
            	,"lGrupo"		=> $lGrupo
            	,"lMarca"		=> $lMarca
            	,"lSubGrupo"	=> $lSubGrupo
                ,"atual_page"  	=> "produtos");

            /*VIEW*/$this->load->template("produtos.php",$content);
            
	   }
        
        
        public function produto_descricao($IdProduto){	
            
            $this->output->enable_profiler(TRUE);   
            
            $produto	= $this->Produto_model	->Listar(array("Join" => true,"lJoin" => true,"IsBusca" => true,"lJoinCompleto" => true,"IsDescricao" => true));  
			
			//var_dump($produto);
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
            	"produto"		=> $produto
                ,"atual_page"  	=> "produtos");

            /*VIEW*/$this->load->template("produto_descricao.php",$content);
            
	   }
        
    }