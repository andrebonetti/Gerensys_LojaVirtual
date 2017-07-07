<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Produtos extends CI_Controller{
        
		public function index($pPaginaAtual = 1,$pFiltro = null,$pValor = null){	
            
            $this->output->enable_profiler(TRUE);   
            
            // --- PAGINACAO ---
            $limite 			= '15';
			$inicio				= ($pPaginaAtual*$limite)-$limite;
		
			$produtoData["Join"]   = true;
			$produtoData["Limite"] = $limite;
			$produtoData["OffSet"] = $inicio;
			
			// --- FILTROS ---
			$testeSessao	= $this->session->userdata("$pFiltro");
			
			if(($pFiltro != null)&&($pValor != null)){
				
				//echo $pFiltro." - ".$pValor;
				
				if(($pFiltro != "Destroy")&&($pValor != "UnsetData")){
					if(empty($testeSessao)){$this->session->set_userdata("$pFiltro",$pValor);}	
					if(!empty($testeSessao)){
						if($testeSessao != $pValor){$this->session->set_userdata("$pFiltro",$pValor);}
					}
					
				}
				if($pValor 	== "UnsetData"){$this->session->unset_userdata("$pFiltro");}
				if($pFiltro == "Destroy")  {$this->session->sess_destroy();}
				
			}
			
			$produtoData = produto_PreencherFiltroSession($produtoData);
			
			// -- MODEL -- //
            $lProduto			= $this->Produto_model	->Listar($produtoData);
            
            $produtoData["IsCount"] = true;
            $produtoData["Join"] = false;
             
            $Count_Produto		= $this->Produto_model	->Listar($produtoData);
            
            $numeroPaginas 		= ceil($Count_Produto/$limite);

            // -- Entidades Pai --
			$lSetor		= $this->Setor_model	->Listar(array("lJoinCount" => true,array ("Produto" => $produtoData)) ); 
			$lCor		= $this->Cor_model		->Listar(array("lJoinCount" => true,array ("Produto" => $produtoData)) ); 
			$lGrupo		= $this->Grupo_model	->Listar(array("lJoinCount" => true,array ("Produto" => $produtoData)) ); 
			$lMarca		= $this->Marca_model	->Listar(array("lJoinCount" => true,array ("Produto" => $produtoData)) ); 
			$lSubGrupo	= $this->SubGrupo_model	->Listar(array("lJoinCount" => true,array ("Produto" => $produtoData)) );
			
			// ----- BreadCrumb -----
			$lBreadCrumb = produto_PreencherArrayBreadCrumb();

            // --------------------------CONTENT---------------------------------- 
            $content = array(
            	"lProduto"			=> $lProduto
            	,"lSetor"			=> $lSetor
            	,"lCor"				=> $lCor
            	,"lGrupo"			=> $lGrupo
            	,"lMarca"			=> $lMarca
            	,"lSubGrupo"		=> $lSubGrupo
            	,"pPaginaAtual"		=> $pPaginaAtual
            	,"numeroPaginas"	=> $numeroPaginas
            	,"numeroProdutos"	=> $Count_Produto
            	,"lBreadCrumb"		=> $lBreadCrumb
                ,"atual_page"  		=> "produtos");

            // --- VIEW ---
            $this->load->template("produtos.php",$content);
            
	   }
        
        
        public function produto_descricao($IdProduto){	
            
            $this->output->enable_profiler(TRUE);   
            
            $produto	= $this->Produto_model	->Listar(array("Join" => true,"lJoin" => true,"IsBusca" => true,"lJoinCompleto" => true,"IsDescricao" => true));  
			
			//var_dump($produto);
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
            	"produto"		=> $produto
                ,"atual_page"  	=> "produtos_descricao");

            /*VIEW*/$this->load->template("produto_descricao.php",$content);
            
	   }
	   
	   public function LimpezaFiltro($breadCrumbN){	
            
            $this->output->enable_profiler(TRUE);   
            
            $sessaoBreadCrumbCount = $this->session->userdata('BreadCrumbCount');
		
			for($n = 1;$n <= $sessaoBreadCrumbCount;$n++){
				
				if($n > $breadCrumbN){
					$this->session->unset_userdata("breadcrumb{$n}Link");
					$this->session->unset_userdata("breadcrumb{$n}Descricao");
					
					$filtro = $this->session->userdata("breadcrumb{$n}Filtro");
					
					$this->session->unset_userdata("$filtro");
					$this->session->unset_userdata("breadcrumb{$n}Filtro");
				}

			}	
			
			$this->session->set_userdata("BreadCrumbCount",$breadCrumbN);

	        redirect("produtos/index/1");
            
	   }
        
    }