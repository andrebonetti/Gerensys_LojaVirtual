<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Produtos extends CI_Controller{
        
		public function index($pFiltro = null,$pValor = null,$pPaginaAtual = 1){	
            
            $this->output->enable_profiler(TRUE);   
            
            $lProduto	= $this->Produto_model	->Listar(array("Join" => true)); 
            
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

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "produtos");

            /*VIEW*/$this->load->template("produto_descricao.php",$content);
            
	   }
        
    }