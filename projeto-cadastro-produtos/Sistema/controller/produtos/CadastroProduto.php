<?php
	require_once('../../conexao_banco/ConexaoBancoInterface.php');
	require_once('../../conexao_banco/ConexaoMySql.php');
	require_once('../../TransactionsBD.php');

	class CadastroProduto{
		private $conexao;
		private $_result = array();
		private $_status = 0;

		function realizarCadastro(ConexaoBancoInterface $conn, $valores_form = array()){					
			try{
				$_count_error = 0;
				if(isset($valores_form['COD_PRODUTO']))
					$_count_error++;
				if(isset($valores_form['DESCRICAO']))
					$_count_error++;
				if(isset($valores_form['QUANTIDADE']))
					$_count_error++;
				if(isset($valores_form['PRECO']))
					$_count_error++;

				if((int)count($valores_form)){
					/**
					* FORCANDO AS CHAMADAS AQUI PARA TESTAR AS FUNCIONALIDADES	
					*/
					$this->conexao = new ConexaoMySql();
					TransactionsBD::inserir($this->conexao, 'PRODUTO',$valores_form);
					TransactionsBD::consultarTodasLinhas($this->conexao, 'PRODUTO', "ID = ". 26);
					TransactionsBD::deletar($this->conexao, 'PRODUTO', "ID = ". 26);
					TransactionsBD::atualizar($this->conexao, 'PRODUTO', $valores_form, "ID = ". 26);
				}
			} catch(Exception $e){
				
			}	
		}
	}

	$obj = new CadastroProduto();
	$_obj_conn = new ConexaoMySql();
	$valor = $obj->realizarCadastro($_obj_conn, $_POST);
?>