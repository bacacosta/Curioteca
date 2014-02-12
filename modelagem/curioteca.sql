# phpMyAdmin SQL Dump
# version 2.5.7-pl1
# http://www.phpmyadmin.net
#
# Servidor: localhost
# Tempo de Generação: Out 26, 2004 at 03:38 PM
# Versão do Servidor: 4.0.20
# Versão do PHP: 4.3.8-9
# 
# Banco de Dados : `curioteca`
# 

# --------------------------------------------------------

#
# Estrutura da tabela `acasalamento`
#

CREATE TABLE `acasalamento` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idmacho` int(10) unsigned NOT NULL default '0',
  `idfemea` int(10) unsigned NOT NULL default '0',
  `dtacasalamento` date NOT NULL default '0000-00-00',
  `numovos` int(2) unsigned NOT NULL default '0',
  `numeclosoes` int(2) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `idmacho` (`idmacho`),
  KEY `idfemea` (`idfemea`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Estrutura da tabela `cliente`
#

CREATE TABLE `cliente` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(60) NOT NULL default '',
  `endereco` varchar(100) NOT NULL default '',
  `cidade` varchar(20) NOT NULL default '',
  `estado` char(2) NOT NULL default '',
  `telefone1` varchar(14) NOT NULL default '',
  `telefone2` varchar(14) default NULL,
  `email` varchar(40) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Estrutura da tabela `criadouro`
#

CREATE TABLE `criadouro` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(60) NOT NULL default '',
  `endereco` varchar(100) NOT NULL default '',
  `cidade` varchar(20) NOT NULL default '',
  `estado` char(2) NOT NULL default '',
  `telefone1` varchar(14) NOT NULL default '',
  `telefone2` varchar(14) default NULL,
  `email` varchar(40) default NULL,
  `contato` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Estrutura da tabela `especie`
#

CREATE TABLE `especie` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nomepop` varchar(60) NOT NULL default '',
  `nomecient` varchar(60) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Estrutura da tabela `morte`
#

CREATE TABLE `morte` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idpassaro` int(10) unsigned NOT NULL default '0',
  `dtmorte` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`),
  KEY `idpassaro` (`idpassaro`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Estrutura da tabela `muda`
#

CREATE TABLE `muda` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idpassaro` int(10) unsigned NOT NULL default '0',
  `dtmuda` date NOT NULL default '0000-00-00',
  `tipomuda` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `idpassaro` (`idpassaro`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Estrutura da tabela `passaro`
#

CREATE TABLE `passaro` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idcriadouro` int(10) unsigned NOT NULL default '0',
  `idespecie` int(10) unsigned NOT NULL default '0',
  `anilha` varchar(10) NOT NULL default '',
  `anelpai` varchar(10) NOT NULL default '',
  `anelmae` varchar(10) NOT NULL default '',
  `dtnascimento` date NOT NULL default '0000-00-00',
  `nome` varchar(20) NOT NULL default '',
  `sexo` char(1) NOT NULL default '',
  `status` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `anilha` (`anilha`),
  KEY `idcriadouro` (`idcriadouro`),
  KEY `idespecie` (`idespecie`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Estrutura da tabela `usuario`
#

CREATE TABLE `usuario` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(60) NOT NULL default '',
  `login` varchar(10) NOT NULL default '',
  `senha` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

# --------------------------------------------------------

#
# Estrutura da tabela `venda`
#

CREATE TABLE `venda` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idcliente` int(10) unsigned NOT NULL default '0',
  `idpassaro` int(10) unsigned NOT NULL default '0',
  `dtvenda` date NOT NULL default '0000-00-00',
  `valor` float NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `idcliente` (`idcliente`),
  KEY `idpassaro` (`idpassaro`)
) TYPE=MyISAM;
