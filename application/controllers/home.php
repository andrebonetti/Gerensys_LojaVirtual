<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends CI_Controller{
        
		public function index(){	
            
            $this->output->enable_profiler(TRUE);    

            $data["Join"] = true;
            $lProdutos = $this->Produto_model->Listar($data);

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "lProdutos"   => $lProdutos
                ,"atual_page"  => "home");

            /*VIEW*/$this->load->template("home.php",$content);
            
	   }
    }