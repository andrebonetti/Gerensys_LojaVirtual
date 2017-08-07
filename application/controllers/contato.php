<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Contato extends CI_Controller{
        
		public function index(){	
            
            // --- HEADER ---
            $header = header_preencheConteudoHeader();
             
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "header"	    => $header
                ,"title"       => "Loja Virtual | Contato"
                ,"atual_page"  => "contato");

            /*VIEW*/$this->load->template("contato.php",$content);
            
	   }
    }