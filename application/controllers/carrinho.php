<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Carrinho extends CI_Controller{
        
		public function index(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "produtos");

            /*VIEW*/$this->load->template("carrinho.php",$content);
            
	   }
        
    }