<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends CI_Controller{
        
		public function index(){	
            
            // --- HEADER ---
            $header = header_preencheConteudoHeader();
            
            $lDestaque   = $this->Produto_Destaques_model	->Listar(array("lJoin" => true,"Produto" => array ("Join" => true,"IsBusca" => true)));
			$lNovidade   = $this->Produto_model			    ->Listar(array("OrderBy" => "Id","OrderByRegra" => "desc", "Limite" => 5, "Join" => true));          
            $lGrupo		 = $this->Grupo_model	            ->Listar(); 
			
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "lDestaque"    => $lDestaque
                ,"lNovidade"   => $lNovidade
                ,"lGrupo"      => $lGrupo
                ,"header"	   => $header
                ,"title"       => "Loja Virtual | Página Principal"
                ,"atual_page"  => "home");

            /*VIEW*/$this->load->template("home.php",$content);
            
	   }
    }