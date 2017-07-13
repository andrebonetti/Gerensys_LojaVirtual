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
            
            $dataCadastro["Email"] = $this->input->post("email");	
            
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
            	"dataCadastro" => $dataCadastro
            	,"erros"	   => array()
                ,"atual_page"  => "cadastro");
		
            // --- VIEW ---
            $this->load->template("cliente/cadastro.php",$content);
        
	   }
	   
	   	public function cadastro_edit(){
			
			$cliente = cliente_validarSessao();
			
			$content = array(
        	"cliente"	  => $cliente
        	,"erros"	  => array()
            ,"atual_page" => "cliente_cadastro");
			
			// --- VIEW ---
			$this->load->template_cliente("cliente/cadastro_edit.php",$content);
			
		}
	   
	    public function cadastro_Inserir(){
	   	
	   		$this->output->enable_profiler(TRUE);    
	   	
	   		$dataCliente = cliente_GetPosts();
	   	
	   		$validacao = cliente_ValidarDados($dataCliente);
	   		
			// --- Result --- 
	   		if($validacao["IsValidado"] == true){
	   			
	   			unset($dataCliente["SenhaConfirmacao"]);
				$dataCliente["Senha"] = md5($dataCliente["Senha"]);
	   			
				$this->Cliente_model->Incluir($dataCliente);
				
				redirect(Cliente/pedidos);
			}
			if($validacao["IsValidado"] == false){
				
				$content = array(
            	"dataCadastro" => $dataCliente
            	,"erros"	   => $validacao["erros"]
                ,"atual_page"  => "cadastro");

            	/*VIEW*/$this->load->template("cliente/cadastro.php",$content);
			}
	   		
	   }

		public function cadastro_Alterar(){
	   	
	   		$this->output->enable_profiler(TRUE);   
	   		
	   		$cliente = cliente_validarSessao(); 
	   	
	   		$dataCliente = cliente_GetPosts();
	   		$dataCliente["Id"] = $cliente["Id"];
	   		
	   		$validacao = cliente_ValidarDados($dataCliente,"Alterar");
	   		
			// --- Result --- 
	   		if($validacao["IsValidado"] == true){
	   			
	   			unset($dataCliente["Senha"]);	
	   			unset($dataCliente["SenhaConfirmacao"]);
	   			
				$this->Cliente_model->Atualizar($dataCliente);
				
				redirect("Cliente/cadastro_edit");
				
			}
			if($validacao["IsValidado"] == false){
				
				$content = array(
            	"cliente"	   => $cliente
            	,"erros"	   => $validacao["erros"]
                ,"atual_page"  => "cliente_cadastro");
                
                // --- VIEW ---
				$this->load->template_cliente("cliente/cadastro_edit.php",$content);
			}
	   }

		public function cadastro_AlterarSenha(){
	   	
	   		$this->output->enable_profiler(TRUE);   
	   		
	   		$cliente = cliente_validarSessao(); 
	   	
	   		$dataPost["senhaAnterior"]		= $this->input->post("senha-anterior");	
			$dataPost["novaSenha"]			= $this->input->post("nova-senha");		
        	$dataPost["confirmaNovaSenha"]	= $this->input->post("confirma-nova-senha");
	   		$dataPost["Id"] 				= $cliente["Id"];

	   		$validacao = cliente_validarAlteracaoSenha($dataPost);
	   		
	   		if($validacao["IsValidado"] == true){
				
				$dataCliente["Id"] 		= $cliente["Id"];
				$dataCliente["Senha"] 	= md5($dataPost["novaSenha"]);
				
				$this->Cliente_model->Atualizar($dataCliente);
				
				redirect("Cliente/cadastro_edit");
				
			}
			else{
				
				// --- CONTENT ---
				$content = array(
            	"cliente"	   => $cliente
            	,"erros"	   => $validacao["erros"]
                ,"atual_page"  => "cliente_cadastro");
                
                // --- VIEW ---
				$this->load->template_cliente("cliente/cadastro_edit.php",$content);
				
			}
 		
	   }

		public function pedidos(){	
            
            $this->output->enable_profiler(TRUE);    
			
			$cliente = cliente_validarSessao();
			
			// --- CONTENT ---	
			$content = array(
        	"cliente"	  => $cliente
            ,"atual_page" => "pedidos");
            
        	// --- VIEW ---
        	$this->load->template_cliente("cliente/pedidos.php",$content);
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

            // --------------------------CONTENT---------------------------------- 
            $content = array(
            	"dataLogin"	  => array()
            	,"erros"	  => array()	
                ,"atual_page" => "cliente");

            // --- VIEW ---
            $this->load->template("cliente/login.php",$content);
            
	   } 
        
        public function login_post(){	
            
            $this->output->enable_profiler(TRUE);  
            
            $data["Email"]	= $this->input->post("email");  
			$data["Senha"]	= $this->input->post("senha"); 
			
			$validacao 		= cliente_validarLogin($data);
			
			$data["IsBusca"] = true;
			
			// --- Result --- 
	   		if($validacao["IsValidado"] == true){
	   			
				$this->session->set_userdata("ClienteId",$validacao["Cliente"]["Id"]);	
				
				redirect("cliente/pedidos");
			}
			if($validacao["IsValidado"] == false){
				
				$content = array(
            	"dataLogin"	  => array("Email" => $data["Email"],"Senha" => $data["Senha"])
            	,"erros"	  => $validacao["erros"]	
                ,"atual_page" => "cliente");
                
            	// --- VIEW ---
            	$this->load->template("cliente/login.php",$content);
				
			}
			
	   }     
        
        public function sair(){
            
            $this->session->unset_userdata("ClienteId");	
            
            redirect("home");
        }
        
    }