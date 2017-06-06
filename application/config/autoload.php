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

$autoload['helper'] = array('url', 'form', 'text', 'date','active','filter','transform_name','adm_helper');

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
				'crud_model'
				,'Produto_model'
				,'UnidadeApresentacao_model'
				,'Cest_model'
				,'Cst_Csosn_model'
				,'Fornecedor_model'
				,'Fotos_produtos_model'
				,'Grupo_model'
				,'Ncm_sh_model'
				,'Preco_model'
				,'Promocao_model'
				,'Setor_model'
				,'SubGrupo_model'
				,'Tipo_model'
				,'TipoPreco_model'
				,'Usuarios_model'
				);