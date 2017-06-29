<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Cliente extends CI_Controller{
        
		public function index(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "pedidos");

            /*VIEW*/$this->load->template_cliente("cliente/pedidos.php",$content);
            
	   }
        
        public function cadastro(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "cadastro");

            /*VIEW*///$this->load->template("cliente/cadastro.php",$content);
            /*VIEW*/$this->load->template_cliente("cliente/cadastro_edit.php",$content);
            
	   }
        
        public function enderecos(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "enderecos");

            /*VIEW*/$this->load->template_cliente("cliente/enderecos.php",$content);
            
	   }
        
        public function pagamentos(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "pagamentos");

            /*VIEW*/$this->load->template_cliente("cliente/pagamentos.php",$content);
            
	   }
        
       public function login(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "cliente");

            /*VIEW*/$this->load->template("cliente/login.php",$content);
            
	   } 
        
       public function login_post(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "cliente");

           redirect("cliente/index");
            /*VIEW*///$this->load->template("cliente/login.php",$content);
            
	   }     
        
    }