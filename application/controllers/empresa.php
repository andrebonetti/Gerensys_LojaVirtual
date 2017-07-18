<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Empresa extends CI_Controller{
        
		public function index(){	
            
            // --- HEADER ---
            $header = preencheConteudoHeader();

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "header"	   => $header
                ,"title"       => "Loja Virtual | Sobre a Empresa"
                ,"atual_page"  => "empresa");

            /*VIEW*/$this->load->template("empresa.php",$content);
            
	   }
    }