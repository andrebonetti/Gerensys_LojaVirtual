<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Auto-load Packges
| -------------------------------------------------------------------
*/

$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
*/

$autoload['libraries'] = array('database', 'session','user_agent','exceptions');

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
*/

$autoload['helper'] = array(
			'url'
			,'form'
            ,'typography'
			,'text'
			,'date'
			,'active'
			,'transform_name'
            ,'header_helper'
			,'codigosAlternativos_helper'
			,'preco_helper'
            ,'carrinho_helper'
			,'produto_helper'
            ,'produto_estoque_helper'
			,'cliente_helper'
            ,'cliente_enderecos_helper'
            ,'cliente_pedidos_helper'
			,'produto_promocao_helper'
            ,'produto_fotos_helper'
            ,'config_helper'
            ,'R_SetorXGrupoXSubGrupo_helper'
			,'validacao_helper');

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
*/

$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
*/

$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
*/

$autoload['model'] = array(
				'Produto_model'	
				,'Produto_Comentarios_model'
				,'Produto_Fotos_model'
				,'Produto_Preco_model'
				,'Produto_Promocao_model'
				,'Produto_CodigosAlternativos_model'	
				,'Produto_Destaques_model'	
                ,'Produto_Estoque_model'	
				,'Produto_V_Cor_model'	
                ,'Produto_V_Tamanho_model'
                ,'Cliente_model'
				,'Cliente_Enderecos_model'
                ,'Cliente_Favoritos_model'
                ,'Cliente_Pedidos_model'
                ,'Cliente_Pedido_Produtos_model'
				,'Marca_model'	
				,'Cst_Csosn_model'
				,'Fornecedor_model'
				,'Grupo_model'
				,'Setor_model'
				,'SubGrupo_model'
				,'Tipo_model'
				,'TipoPreco_model'
				,'Usuarios_model'
				,'Config_model'
				,'Functions_model'
				,'Sys_Info_Campos_model'
				,'Sys_UnidadeApresentacao_model'
				,'Sys_Origem_model'
				,'Sys_Ncm_Sh_model'
				,'Sys_Estado_model'
				,'Sys_Cest_model'
				,'Sys_Cst_Csosn_Origem_model'
				,'Sys_Cst_Csosn_SituacaoTributaria_model'
                ,'R_SetorXGrupoXSubGrupo_model'
				);