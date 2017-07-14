<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Cliente extends CI_Controller{
        
		// ------------ PAGINAS ------------ //
    	
	    	// --- AREA CLIENTE --- //
	    	
		   	public function pedidos(){	
            
                $this->output->enable_profiler(TRUE);    
    			
    			$cliente = cliente_validarSessao();
                if(empty($cliente)){redirect("home");}
                
                $data["Cliente"] = $cliente;
                $data["IsCount"] = true;
                
                $countFavoritos = $this->Cliente_Favoritos_model->Listar($data);
    			
    			// --- CONTENT ---	
    			$content = array(
            	"cliente"	      => $cliente
                ,"countFavoritos" => $countFavoritos
                ,"atual_page"     => "pedidos");
                
            	// --- VIEW ---
            	$this->load->template_cliente("cliente/pedidos.php",$content);
	        }
            
            public function favoritos(){
                
                $this->output->enable_profiler(TRUE);    

                $cliente = cliente_validarSessao();
                if(empty($cliente)){redirect("home");}
                
                $data["Cliente"] = $cliente;
                $data["lJoin"]    = true;
                
                $lFavoritos = $this->Cliente_Favoritos_model->Listar($data);
                
                $coutFavoritos = count($lFavoritos);
                
                // --- CONTENT ---	
    			$content = array(
            	"cliente"	  	    => $cliente
                ,"countFavoritos" 	=> $coutFavoritos
            	,"lFavoritos" 	    => $lFavoritos
                ,"atual_page" 	    => "favoritos");

                // --- VIEW ---
                $this->load->template_cliente("cliente/favoritos.php",$content);
            }
      
            public function cadastro_atualizar_form(){
			
    			$cliente = cliente_validarSessao();
                if(empty($cliente)){redirect("home");}
    			
    			$data["Cliente"] = $cliente;
                $data["IsCount"] = true;
                $countFavoritos = $this->Cliente_Favoritos_model->Listar($data);
    			
    			// --- CONTENT ---	
    			$content = array(
            	"cliente"	          => $cliente
                ,"countFavoritos"     => $countFavoritos
            	,"erros"	  => array()
                ,"atual_page" => "cliente_cadastro");
    			
    			// --- VIEW ---
    			$this->load->template_cliente("cliente/cadastro_atualizar_form.php",$content);
    			
    		}
        
	        public function enderecos(){	
            
            $this->output->enable_profiler(TRUE);    

            $cliente = cliente_validarSessao();
            if(empty($cliente)){redirect("home");}
            
            // -- ENDERECOS --
            $dataEnderecos["Cliente"] = $cliente;
            $cliente_enderecos = $this->Cliente_Enderecos_model->Listar($dataEnderecos);
            
            $data["Cliente"] = $cliente;
            $data["IsCount"] = true;
            $countFavoritos = $this->Cliente_Favoritos_model->Listar($data);
			
			// --- CONTENT ---	
			$content = array(
        	"cliente"	          => $cliente
            ,"countFavoritos"     => $countFavoritos
        	,"cliente_enderecos"  => $cliente_enderecos
            ,"atual_page" 		  => "enderecos");

            // --- VIEW ---
            $this->load->template_cliente("cliente/enderecos.php",$content);
            
	   }
	        
	        public function pagamentos(){	
            
            $this->output->enable_profiler(TRUE);    

            /*--------------------------CONTENT----------------------------------*/
            $content = array(
                "atual_page"  => "pagamentos");

            /*VIEW*/$this->load->template_cliente("cliente/pagamentos.php",$content);
            
	   }

			public function enderecos_incluir_form(){
                
                $this->output->enable_profiler(TRUE); 
			
				$cliente = cliente_validarSessao();
	            if(empty($cliente)){redirect("home");}
				
				$content = array(
	        	"cliente"	    => $cliente
                ,"dataCadastro" => array()
	        	,"erros"	    => array()
                ,"acao_form"    => "incluir"
	            ,"atual_page"   => "enderecos");
				
				// --- VIEW ---
				$this->load->template_cliente("cliente/enderecos_form.php",$content);
				
				}

            public function enderecos_atualizar_form($pId){
			
                $this->output->enable_profiler(TRUE); 
            
				$cliente = cliente_validarSessao();
	            if(empty($cliente)){redirect("home");}
                
                $data["Id"] = $pId;
                $data["IsBusca"] = true;
                
                $dataCadastro = $this->Cliente_Enderecos_model->Listar($data);
                
				$content = array(
	        	"cliente"	    => $cliente
                ,"dataCadastro" => $dataCadastro
	        	,"erros"	    => array()
                ,"acao_form"    => "atualizar"
	            ,"atual_page"   => "enderecos");
				
				// --- VIEW ---
				$this->load->template_cliente("cliente/enderecos_form.php",$content);
				
				}
		   
			// --- LOGIN/CADASTRO ---
			public function login_form(){	
            
            $this->output->enable_profiler(TRUE);    

            // --------------------------CONTENT---------------------------------- 
            $content = array(
            	"dataLogin"	  => array()
            	,"erros"	  => array()	
                ,"atual_page" => "cliente");

            // --- VIEW ---
            $this->load->template("cliente/login.php",$content);
            
	   } 

			public function cadastro_incluir_form(){	
            
            $this->output->enable_profiler(TRUE);    
            
            $dataCadastro["Email"] = $this->input->post("email");	
            
            /*--------------------------CONTENT----------------------------------*/
            $content = array(
            	"dataCadastro" => $dataCadastro
            	,"erros"	   => array()
                ,"atual_page"  => "cadastro");
		
            // --- VIEW ---
            $this->load->template("cliente/cadastro_incluir_form.php",$content);
        
	   }
	   
	    // ------------ POST(Funcoes/CRUD) ------------ //
	    
	    public function login_post(){	
            
            $this->output->enable_profiler(TRUE);  
            
            $data["Email"]	= $this->input->post("email");  
			$data["Senha"]	= $this->input->post("senha"); 
			
			$validacao 		= cliente_validarLogin($data);
			
			$data["IsBusca"] = true;
			
			// --- Result --- 
	   		if($validacao["IsValidado"] == true){
	   			
				$this->session->set_userdata("ClienteId",$validacao["Cliente"]["Id"]);	
				
                $this->session->set_flashdata('msg-sucesso',"Bem vindo");
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
	    
	    public function cadastro_incluir_post(){
	   	
	   		$this->output->enable_profiler(TRUE);    
	   	
	   		$dataCliente = cliente_GetPosts();
	   	
	   		$validacao = cliente_ValidarDados($dataCliente);
	   		
			// --- Result --- 
	   		if($validacao["IsValidado"] == true){
	   			
	   			unset($dataCliente["SenhaConfirmacao"]);
				$dataCliente["Senha"] = md5($dataCliente["Senha"]);
	   			
				$IdCliente = $this->Cliente_model->Incluir($dataCliente);
				
				$this->session->set_userdata("ClienteId",$IdCliente);
                
                $this->session->set_flashdata('msg-sucesso',"Cadastro efetuado com sucesso! Bem vindo");	
				
				redirect("Cliente/pedidos");
			}
			if($validacao["IsValidado"] == false){
				
				$content = array(
            	"dataCadastro" => $dataCliente
            	,"erros"	   => $validacao["erros"]
                ,"atual_page"  => "cadastro");

            	/*VIEW*/$this->load->template("cliente/cadastro.php",$content);
			}
	   		
	   }

		public function cadastro_atualizar_post(){
	   	
	   		$this->output->enable_profiler(TRUE);   
	   		
	   		$cliente = cliente_validarSessao();
            if(empty($cliente)){redirect("home");}
	   	
	   		$dataCliente = cliente_GetPosts();
	   		$dataCliente["Id"] = $cliente["Id"];
	   		
	   		$validacao = cliente_ValidarDados($dataCliente,"Alterar");
	   		
			// --- Result --- 
	   		if($validacao["IsValidado"] == true){
	   			
	   			unset($dataCliente["Senha"]);	
	   			unset($dataCliente["SenhaConfirmacao"]);
	   			
				$this->Cliente_model->Atualizar($dataCliente);
				
                $this->session->set_flashdata('msg-sucesso',"Cadastro atualizado com sucesso");	
                
				redirect("Cliente/cadastro_atualizar_form");
				
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

		public function cadastro_alterarSenha_post(){
	   	
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
				
                $this->session->set_flashdata('msg-sucesso',"Senha alterada com sucesso");	
                
				redirect("Cliente/cadastro_atualizar_form");
				
			}
			else{
				
				// --- CONTENT ---
				$content = array(
            	"cliente"	   => $cliente
            	,"erros"	   => $validacao["erros"]
                ,"atual_page"  => "cliente_cadastro");
                
                // --- VIEW ---
				$this->load->template_cliente("cliente/cadastro_atualizar_form.php",$content);
				
			}
 		
	   }

		public function enderecos_incluir_post(){
	   	
	   		$this->output->enable_profiler(TRUE);   
	   		
	   		$cliente = cliente_validarSessao();
	        if(empty($cliente)){redirect("home");} 
	   	
	   		$dataEndereco = cliente_enderecos_GetPosts();
	   		$dataEndereco["IdCliente"] = $cliente["Id"];
	   	
	   		$validacao = cliente_enderecos_ValidarDados($dataEndereco);
	   		
			// --- Result --- 
	   		if($validacao["IsValidado"] == true){
	   			
				$IdEndereco = $this->Cliente_Enderecos_model->Incluir($dataEndereco);
				
                $this->session->set_flashdata('msg-sucesso',"Endereço adicionado com sucesso");	
				redirect("Cliente/enderecos");
			}
			if($validacao["IsValidado"] == false){
				
				$content = array(
                "cliente"	    => $cliente
            	,"dataCadastro" => $dataEndereco
            	,"erros"	    => $validacao["erros"]
                ,"atual_page"   => "enderecos_incluir_form");

            	// --- VIEW ---
                $this->load->template("cliente/cadastro.php",$content);
			}
	   		
	   }
  
        public function enderecos_atualizar_post(){
    	   	
       		$this->output->enable_profiler(TRUE);   
       		
       		$cliente = cliente_validarSessao();
            if(empty($cliente)){redirect("home");} 
       	
       		$data = cliente_enderecos_GetPosts();
            $data["Id"] = $this->input->post("Id");	   
       	
       		$validacao = cliente_enderecos_ValidarDados($data);
       		
    		// --- Result --- 
       		if($validacao["IsValidado"] == true){
       			
    			$this->Cliente_Enderecos_model->Atualizar($data);
    			
                $this->session->set_flashdata('msg-sucesso',"Endereço atualizado com sucesso");	
                
    			redirect("Cliente/enderecos");
    		}
    		if($validacao["IsValidado"] == false){
    			
    			$content = array(
                    "cliente"	    => $cliente
                	,"dataCadastro" => $dataEndereco
                	,"erros"	    => $validacao["erros"]
                    ,"acao_form"    => "atualizar"
                    ,"atual_page"   => "enderecos_incluir_form");

                	// --- VIEW ---
                    $this->load->template("cliente/cadastro.php",$content);
    		}
    	   		
    	}
          
        public function enderecos_excluir($pId){
            
            $this->output->enable_profiler(TRUE);   
	   		
	   		$cliente = cliente_validarSessao();
	        if(empty($cliente)){redirect("home");} 
	   	
            $data["Id"] = $pId;	   
       	    
    		$this->Cliente_Enderecos_model->Excluir($data);
    			
            $this->session->set_flashdata('msg-sucesso',"Endereço excluido com sucesso");	    
    		redirect("Cliente/enderecos");

        }  
          
        public function enderecos_tornarPrincipal($pId){
            
            $this->output->enable_profiler(TRUE);  
            
            $cliente = cliente_validarSessao();
	        if(empty($cliente)){redirect("home");}
            
            $dataEnderecos["IdCliente"]   = $cliente["Id"];
            $dataEnderecos["IsPrincipal"] = 0;
            
            $this->Cliente_Enderecos_model->AtualizarClienteGeral($dataEnderecos);
            
            $dataEnderecosPrincipal["Id"] = $pId;
            $dataEnderecosPrincipal["IsPrincipal"] = 1;
            
            $this->Cliente_Enderecos_model->Atualizar($dataEnderecosPrincipal);
            
            redirect("cliente/enderecos");
        }

        public function favoritos_incluir($pIdProduto){
            
            $this->output->enable_profiler(TRUE);  
            
            $cliente = cliente_validarSessao();
	        if(empty($cliente)){
                echo "ver depois caso Login";
                //redirect("cliente/login");
            }
            else{
                
                $data["IdProduto"] = $pIdProduto;
                $data["IdCliente"] = $cliente["Id"];
                
                $dataBusca["Produto"]["Id"]   = $data["IdProduto"];
                $dataBusca["Cliente"]["Id"]   = $data["IdCliente"];
                $dataBusca["IsBusca"]         = true;
                
                $lFavoritos = $this->Cliente_Favoritos_model->Listar($dataBusca);
                
                if(empty($lFavoritos)){
                    
                    $this->Cliente_Favoritos_model->Incluir($data);
                    
                    $this->session->set_flashdata('msg-sucesso',"Produto foi adicionado a sua lista de favoritos com sucesso");
                    redirect("produtos/produto_descricao/{$pIdProduto}");
                    
                }
                else{
                
                    $this->session->set_flashdata('msg-erro',"Produto ja consta na lista de favoritos");
                    redirect("produtos/produto_descricao/{$pIdProduto}");
                    
                }

            }
        }
        
        public function favoritos_excluir($pIdFavorito,$pIdProduto = null){
        
            $this->output->enable_profiler(TRUE);  
            
            $cliente = cliente_validarSessao();
	        if(empty($cliente)){redirect("home");}
            
            $dataFavorito["Id"]   = $pIdFavorito;
            
            $this->Cliente_Favoritos_model->Excluir($dataFavorito);
            
            $this->session->set_flashdata('msg-sucesso',"Produto removido da sua lista de favoritos com sucesso");
               
            if($pIdProduto != null){
                redirect("produtos/produto_descricao/{$pIdProduto}");
            }
            else{
                redirect("cliente/favoritos");
            }
            
        }
        
        public function favoritos_excluirTodos(){
            
            $this->output->enable_profiler(TRUE);  
            
            $cliente = cliente_validarSessao();
	        if(empty($cliente)){redirect("home");}
            
            $data["IdCliente"] = $cliente["Id"];
            
            $this->Cliente_Favoritos_model->ExcluirClienteGeral($data);
            
            redirect("cliente/favoritos");
            
        }
            
    }