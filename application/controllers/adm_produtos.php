<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Adm_produtos extends CI_Controller{
        
		public function produtos(){	
            
            $this->output->enable_profiler(TRUE);    

            $lProduto				= $this->Produto_model				->Listar(array("Join" => true));
            $lProduto_TabelasFilhas = Listar_TabelasFilhas();
            
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
			                "lProduto"      			=> $lProduto
			                ,"lProduto_TabelasFilhas"	=> $lProduto_TabelasFilhas
			                ,"atual_page"   			=> "produtos");

            /*VIEW*/$this->load->template("adm/adm_produtos.php",$content);
            
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