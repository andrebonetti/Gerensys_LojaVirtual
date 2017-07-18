<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Produtos extends CI_Controller{
        
	   public function index($pPaginaAtual = 1,$pFiltro = null,$pValor = null,$pValorDescricao = null){	
            
            // --- HEADER ---
            $header = preencheConteudoHeader();
            
            // --- PAGINACAO ---
            $limite 			= '15';
			$inicio				= ($pPaginaAtual*$limite)-$limite;
		
			$produtoData["Join"]   = true;
			$produtoData["Limite"] = $limite;
			$produtoData["OffSet"] = $inicio;
			
			// --- FILTROS ---
			produto_prepararFiltros($pFiltro,$pValor);

			$produtoData = produto_PreencherFiltroSession($produtoData);
			
			// --- ORDER BY ---
			$postOrderBy = $this->input->post("orderBy");
			$produtoData["NomeOrderBy"]	= "Mais Novos";	
			if(!empty($postOrderBy)){
				$produtoData = produto_DefinirOrderBy($produtoData,$postOrderBy); 	
			}
			
			// --- MODEL ---          
            $lProduto	= $this->Produto_model	->Listar($produtoData);
            
            $produtoData["IsCount"] = true;
            $produtoData["Join"] = false;
            if(isset($produtoData["OrderBy"])){
				unset($produtoData["OrderBy"]);
			}
            
            $Count_Produto	= $this->Produto_model	->Listar($produtoData);
            
            $numeroPaginas 	= ceil($Count_Produto/$limite);

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
            	,"lProdutoFiltros"	=> $produtoData
            	,"lSetor"			=> $lSetor
            	,"lCor"				=> $lCor
            	,"lGrupo"			=> $lGrupo
            	,"lMarca"			=> $lMarca
            	,"lSubGrupo"		=> $lSubGrupo
            	,"NomeOrderBy"		=> $produtoData["NomeOrderBy"]
            	,"postOrderBy"		=> $postOrderBy
            	,"pPaginaAtual"		=> $pPaginaAtual
            	,"numeroPaginas"	=> $numeroPaginas
            	,"numeroProdutos"	=> $Count_Produto
            	,"lBreadCrumb"		=> $lBreadCrumb
                ,"header"	        => $header
                ,"title"            => "Loja Virtual | Catalogo de Produtos"
                ,"atual_page"  		=> "produtos");

            // --- VIEW ---
            $this->load->template("produtos.php",$content);
            
	   } 
        
       public function produto_descricao($pIdProduto){	
            
            // --- HEADER ---
            $header = preencheConteudoHeader();
            
            $produto	= $this->Produto_model	->Listar(array("Id"=>$pIdProduto, "Join" => true,"lJoin" => true,"IsBusca" => true,"lJoinCompleto" => true,"IsDescricao" => true));  
			
            $IdFavorito = null;
            if(!empty($cliente)){
                
                $dataBusca["Produto"]["Id"]   = $pIdProduto;
                $dataBusca["Cliente"]["Id"]   = $cliente["Id"];
                $dataBusca["IsBusca"]         = true;
                
                $favorito = $this->Cliente_Favoritos_model->Listar($dataBusca);
                
                if(!empty($favorito)){
                    $IdFavorito = $favorito["Id"];    
                }
            }
            
			// ----- BreadCrumb -----
			$lBreadCrumb = produto_PreencherArrayBreadCrumb();
			
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
            	"produto"		=> $produto
            	,"lBreadCrumb"	=> $lBreadCrumb
                ,"IdFavorito"   => $IdFavorito
                ,"header"	    => $header
                ,"title"        => "Loja Virtual | {$produto["Descricao"]}"
                ,"atual_page"  	=> "produtos_descricao");

            /*VIEW*/$this->load->template("produto_descricao.php",$content);
            
	   }
	   
	   public function LimpezaFiltro($pBreadCrumbN){	
            
            $this->output->enable_profiler(TRUE);   
            
            produto_unsetDataBreadCrumb($pBreadCrumbN);

	        redirect("produtos/index/1");
            
	   }
        
    }