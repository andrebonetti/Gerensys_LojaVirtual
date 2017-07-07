<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends CI_Controller{
        
		public function index(){	
            
            $this->output->enable_profiler(TRUE);    

            $lDestaque = $this->Produto_Destaques_model	->Listar(array("lJoin" => true,"Produto" => array ("Join" => true,"IsBusca" => true)));
			$lNovidade = $this->Produto_model			->Listar(array("OrderBy" => "Id","OrderByRegra" => "desc", "Limite" => 5, "Join" => true));

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "lDestaque"    => $lDestaque
                ,"lNovidade"   => $lNovidade
                ,"atual_page"  => "home");

            /*VIEW*/$this->load->template("home.php",$content);
            
	   }
    }