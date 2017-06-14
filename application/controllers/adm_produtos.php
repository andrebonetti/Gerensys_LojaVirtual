<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Adm_produtos extends CI_Controller{
        
		public function produtos(){	
            
            $this->output->enable_profiler(TRUE);    

            $lProduto				= $this->Produto_model				->Listar(array("Join" => true));
            $lProduto_TabelasFilhas = produto_Listar_TabelasFilhas();
            $lProduto_Info			= $this->Sys_Info_Campos_model		->Listar(array("Tabela" => "tb_produto","IsBusca" => true));
            $PrecoPreferencial		= $this->TipoPreco_model			->Listar(array("Id"=>$lProduto_Info["IdInfo"], "IsBusca" => true));
            
            //var_dump($lProduto);
            
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
			                "lProduto"      			=> $lProduto
			                ,"lProduto_TabelasFilhas"	=> $lProduto_TabelasFilhas
			                ,"lProduto_Info"			=> $lProduto_Info
			                ,"PrecoPreferencial"		=> $PrecoPreferencial
			                ,"atual_page"   			=> "produtos");

            /*VIEW*/$this->load->template("adm/adm_produtos.php",$content);
            
	   }
	   
	   public function Incluir(){	
            
            $this->output->enable_profiler(TRUE);  
            
            $data 		= produto_GetPosts();
            
            $this->db->trans_begin();
            
            try{
				produto_Salvar($data,array("Acao"=>"Incluir","SalvarEntidadesFilhas"=>true));	
				
				$this->db->trans_commit();
			}
			catch(Exception $ex){
				
				var_dump($ex);
				$this->db->trans_rollback();
				
			}
			
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "produtos");

            /*VIEW*///$this->load->template("adm/adm_produtos.php",$content);
            
	   }
	   
    }