SELECT tb_produtos.*, UN.Codigo AS CodigoUnidadeApresentacao, UN.Descricao AS DescricaoUnidadeApresentacao, Grupo.Descricao AS DescricaoGrupo, SubGrupo.Descricao AS DescricaoSubGrupo, Setor.Descricao AS DescricaoSetor, Fornecedor.Descricao AS DescricaoFornecedor, Tipo.Descricao AS DescricaoTipo, CST.Codigo AS Codigo_CST_CSOSN, CST.UF AS UF_CST_CSOSN, CST.Aliquota AS Aliquota_CST_CSOSN, NCM.Codigo AS Codigo_NCM, NCM.Descricao AS Descricao_NCM, CEST.Codigo AS CodigoCest, PRECO.IdTipoPreco, PRECO.Preco, TipoPreco.Descricao AS TipoPrecoDescricao, UI.Nome AS NomeUsuarioInclusao, UA.Nome AS NomeUsuarioAlteracao, Origem.Descricao AS OrigemProduto
FROM (`tb_produtos`)
INNER JOIN `tb_unidadeapresentacao` AS UN ON `UN`.`Id` = `tb_produtos`.`IdUnidadeApresentacao`
LEFT JOIN `tb_grupo` AS Grupo ON `Grupo`.`Id` = `tb_produtos`.`IdGrupo`
LEFT JOIN `tb_subgrupo` AS SubGrupo ON `SubGrupo`.`Id` = `tb_produtos`.`IdSubGrupo`
LEFT JOIN `tb_setor` AS Setor ON `Setor`.`Id` = `tb_produtos`.`IdSetor`
LEFT JOIN `tb_fornecedor` AS Fornecedor ON `Fornecedor`.`Id` = `tb_produtos`.`IdFornecedor`
LEFT JOIN `tb_tipo` AS Tipo ON `Tipo`.`Id` = `tb_produtos`.`IdTipo`
INNER JOIN `tb_cst-csosn` AS CST ON `CST`.`Id` = `tb_produtos`.`Id_CST_CSOSN`
INNER JOIN `tb_ncm-sh` AS NCM ON `NCM`.`Id` = `tb_produtos`.`Id_NCM_SH`
LEFT JOIN `tb_cest` AS CEST ON `CEST`.`Id` = `tb_produtos`.`IdCest`
INNER JOIN `tb_preco` AS PRECO ON `PRECO`.`IdProduto` = `tb_produtos`.`Id` and PRECO.IdTipoPreco = tb_Produtos.IdTipoPrecoApresentacao
INNER JOIN `tb_tipopreco` AS TipoPreco ON `TipoPreco`.`Id` = `PRECO`.`IdTipoPreco`
INNER JOIN `tb_usuarios` AS UI ON `UI`.`Id` = `tb_produtos`.`IdUsuarioInclusao`
LEFT JOIN `tb_usuarios` AS UA ON `UA`.`Id` = `tb_produtos`.`IdUsuarioAlteracao`
INNER JOIN `tb_origem` AS Origem ON `Origem`.`Id` = `tb_produtos`.`IdOrigem` 