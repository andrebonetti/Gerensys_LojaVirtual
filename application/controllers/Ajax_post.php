<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_Post extends CI_Controller {

	// Show view Page
	public function index(){
		$this->load->view("ajax_post_view");
	}

	// This function call from AJAX
	public function Valida_existencia() {
		
		$data = array(
			'tabela' 	=> $this->input->post('tabela'),
			'coluna'	=>$this->input->post('coluna'),
			'valor'		=>$this->input->post('valor')
		);
		
		$lRegistros	= $this->Functions_model ->Validar_Existencia($data);
		
		$dataResult = array();
		if(count($lRegistros) > 0){
			
			$dataResult["Resultado"] = "0";
			$dataResult["Mensagem"]  = "Ja existe um registro com esse valor";
	
		}
		else{
			$dataResult["Resultado"] = "1";
			$dataResult["Mensagem"]  = "";
		}

		echo json_encode($dataResult);
	}
}