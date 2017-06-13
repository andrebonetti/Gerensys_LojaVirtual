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

$autoload['libraries'] = array('database', 'session','user_agent');

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
*/

$autoload['helper'] = array('url', 'form', 'text', 'date','active','filter','transform_name','adm_helper','produto_helper','validacao_helper');

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
				,'CodigosAlternativos_model'			
				,'Cst_Csosn_model'
				,'Fornecedor_model'
				,'Fotos_produtos_model'
				,'Grupo_model'
				,'Preco_model'
				,'Promocao_model'
				,'Setor_model'
				,'SubGrupo_model'
				,'Tipo_model'
				,'TipoPreco_model'
				,'Usuarios_model'
				,'Functions_model'
				,'Sys_Info_Campos_model'
				,'Sys_UnidadeApresentacao_model'
				,'Sys_Origem_model'
				,'Sys_Ncm_Sh_model'
				,'Sys_Estado_model'
				,'Sys_Cest_model'
				,'Sys_Cst_Csosn_Origem_model'
				,'Sys_Cst_Csosn_SituacaoTributaria_model'
				);