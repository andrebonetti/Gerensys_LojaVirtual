<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Empresa extends CI_Controller{
        
		public function index(){	
            
            $this->output->enable_profiler(TRUE);    
            
            // --- SESSAO CLIENTE ---
            $cliente = cliente_validarSessao();

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "cliente"	  => $cliente
                ,"atual_page"  => "empresa");

            /*VIEW*/$this->load->template("empresa.php",$content);
            
	   }
    }