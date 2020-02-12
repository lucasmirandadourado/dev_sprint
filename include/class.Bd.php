<?php

/**
 * componente - class.Bd.php
 *
 * $Id$
 *
 * This file is part of componente.
 *
 * Automatically generated on 21.05.2012, 15:37:54 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author Jo�o Marcos Sakalauska <jmarcos@mixfiscal.com.br>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * Short description of Bd
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Bd
{
    // ----- ATTRIBUTES ----- //
    
    /**
     *  Descri��o das tabelas do banco de dados.
     */
    protected $schema = array();
    
    /**
     *  Lista das tabelas contidas no banco de dados.
     */
    protected $sources = array();
    
    /**
     *  Conex�o utilizada pelo banco de dados.
     */
    protected $connection;
    
    /**
     *  Resultado das consultas ao banco de dados.
     */
    protected $results;
    
    /**
     *  Verifica se a transa��o foi iniciada.
     */
    protected $transactionStarted = false;
    
    /**
     *  M�todos de compara��o utilizados nas SQLs.
     */
    protected $comparison = array("=", "<>", "!=", "<=", "<", ">=", ">", "<=>", "LIKE", "REGEXP");
    
    /**
     *  M�todos de l�gica utilizados nas SQLs.
     */
    protected $logic = array("or", "or not", "||", "xor", "and", "and not", "&&", "not");
    
    /**
     *  Verifica se o banco de dados est� conectado.
     */
    public $connected = false;
    
    /**
     * ordem: ASC ou DESC
     *
     * @access public
     * @var Parametros
     */
    public $host = NULL;
    
    /**
     * ordem: ASC ou DESC
     *
     * @access public
     * @var Parametros
     */
    public $user = NULL;
    
    /**
     * ordem: ASC ou DESC
     *
     * @access public
     * @var Parametros
     */
    public $password = NULL;
    
    /**
     * ordem: ASC ou DESC
     *
     * @access public
     * @var Parametros
     */
    public $port = NULL;
    
    /**
     * ordem: ASC ou DESC
     *
     * @access public
     * @var Parametros
     */
    public $database = NULL;
    
    /**
     * ordem: ASC ou DESC
     *
     * @access public
     * @var Parametros
     */
    public $flagParametros = false;
        
    /**
     *  Conecta ao banco de dados.
     *
     *  @return resource Conexão com o banco de dados
     */
    public function validaParametros( $host, $user, $database ) {
        if ( ( ( empty( $host ) ) || ( $host == NULL ) || ( !isset( $host ) ) ) 
        && ( ( empty( $user ) ) || ( $user == NULL )  || ( !isset( $user ) ) ) 
        && ( ( empty( $database ) ) || ( $database == NULL )  || (!isset($database)))) {
            return false;
        }
        else {
            return true;
        }
    }
    
    /**
     *  Conecta ao banco de dados.
     *
     *  @return resource Conex�o com o banco de dados
     */
    public function connect() {}
    
    /**
     *  Desconecta do banco de dados.
     *
     *  @return boolean Verdadeiro caso a conex�o tenha sido desfeita
     */
    public function disconnect() {}
    
    /**
     *  Retorna a conex�o com o banco de dados, ou conecta caso a conex�o ainda
     *  n�o tenha sido estabelecida.
     *
     *  @return resource Conex�o com o banco de dados
     */
    public function &getConnection() {}
    
    /**
     *  Executa uma consulta SQL.
     *
     *  @param string $sql Consulta SQL
     *  @return mixed Resultado da consulta
     */
    public function query($sql = null) {}
    
    /**
     *  Retorna um resultado de uma consulta SQL.
     *
     *  @param string $sql Consulta SQL
     *  @return mixed Resultado obtido, falso caso n�o hajam outros resultados
     */
    public function fetch($sql = null) {}
    
    /**
     *  Retorna todos os resultados de uma consulta SQL.
     *
     *  @param string $sql Consulta SQL
     *  @return mixed Resultados obtidos ou falso em caso de erro.
     */
    public function fetchAll($sql = null) {}
    
    /**
     *  Retorna o pr�ximo resultado obtido em uma consulta SQL.
     *
     *  @param resource $results Conjunto de resultados
     *  @return mixed Linha de resultados ou falso caso n�o hajam mais resultados
     */
    public function fetchRow($results = null) {}
    
    /**
     *  Verifica se a �ltima consulta possui resultados.
     *
     *  @return boolean Verdadeiro caso hajam resultados
     */
    public function hasResult() {}
    
    /**
     *  Retorna o tipo b�sico de uma coluna baseada na sua descri��o no banco de dados.
     *
     *  @param string $column Descri��o da coluna no banco de dados
     *  @return string Tipo b�sico da coluna
     */
    public function column($column) {}
    
    /**
     *  Lista as tabelas existentes no banco de dados.
     *
     *  @return array Lista de tabelas no banco de dados
     */
    public function listSources() {}
    
    /**
     *  Descreve uma tabela do banco de dados.
     *
     *  @param string $table Tabela a ser descrita
     *  @return array Descri��o da tabela
     */
    public function describe($table) {}
    
    /**
     *  Inicia uma transa��o SQL.
     *
     *  @return boolean Verdadeiro se a transa��o foi iniciada
     */
    public function begin() {}
    
    /**
     *  Completa uma transa��o SQL.
     *
     *  @return boolean Verdadeiro se a transa��o foi completada
     */
    public function commit() {}
    
    /**
     *  Cancela uma transa��o SQL.
     *
     *  @return boolean Verdadeiro se a transa��o foi cancelada
     */
    public function rollback() {}
    
    /**
     *  Insere um registro na tabela do banco de dados.
     *
     *  @param string $table Tabela a receber os dados
     *  @param array $data Dados a serem inseridos
     *  @return boolean Verdadeiro se os dados foram inseridos
     */
    public function create($table = null, $data = array()) {}
    
    /**
     *  Busca registros em uma tabela do banco de dados.
     *
     *  @param string $table Tabela a ser consultada
     *  @param array $params Par�metros da consulta
     *  @return array Resultados da busca
     */
    public function read($table = null, $params = array()) {}
    
    /**
     *  Atualiza registros em uma tabela do banco de dados.
     *
     *  @param string $table Tabela a receber os dados
     *  @param array $params Par�metros da consulta
     *  @return boolean Verdadeiro se os dados foram atualizados
     */
    public function update($table = null, $params = array()) {}
    
    /**
     *  Remove registros da tabela do banco de dados.
     *
     *  @param string $table Tabela onde est�o os registros
     *  @param array $params Par�metros da consulta
     *  @return boolean Verdadeiro se os dados foram exclu�dos
     */
    public function delete($table = null, $params = array()) {}
    
    /**
     *  Conta registros no banco de dados.
     *
     *  @param string $table Tabela onde est�o os registros
     *  @param array $params Par�metros da busca
     *  @return integer Quantidade de registros encontrados
     */
    public function count($results = null) {}
    
    /**
     *    Cria uma consulta SQL baseada de acordo com alguns par�metros.
     *
     *    @param string $type Tipo da consulta
     *    @param array $data Par�metros da consulta
     *    @return string Consulta SQL
     */
    public function renderSql($type, $data = array()) {}
    
    /**
     *  Escapa um valor para uso em consultas SQL.
     *
     *  @param string $value Valor a ser escapado
     *  @param string $column Tipo do valor a ser escapado
     *  @return string Valor escapado
     */
    public function value($value, $column = null) {}
    
    /**
     *  Gera as condi��es para uma consulta SQL.
     *
     *  @param string $table Nome da tabela a ser usada
     *  @param array $conditions Condi��es da consulta
     *  @param string $logical Operador l�gico a ser usado
     *  @return string Condi��es formatadas para consulta SQL
     */
    public function sqlConditions($table, $conditions, $logical = "AND") {}
    
    /**
     *  Retorna o tipo de um campo da tabela.
     *
     *    @param string $table Tabela que cont�m o campo
     *    @param string $field Nome do campo
     *    @return string Tipo do campo
     */
    public function fieldType($table, $field) {}
    
    /**
     *  Retorna o ID do �ltimo registro inserido.
     *
     *  @return integer ID do �ltimo registro inserido
     */
    public function getInsertId() {}
    
    /**
     *  Retorna a quantidade de linhas afetadas pela �ltima consulta.
     *
     *  @return integer Quantidade de linhas afetadas
     */
    public function getAffectedRows() {}
    
    /**
     *  Retorna a query sem ASPAS evitando SQL injection.
     *
     *  @return integer Quantidade de linhas afetadas
     */
    public function bdEscapeString() {}
}


?>