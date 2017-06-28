<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Cliente extends CI_Controller{
        
		public function index(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "produtos");

            /*VIEW*/$this->load->template("cliente/area-cliente.php",$content);
            
	   }
        
        public function cadastro(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "cliente");

            /*VIEW*/$this->load->template("cliente/cadastro.php",$content);
            
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