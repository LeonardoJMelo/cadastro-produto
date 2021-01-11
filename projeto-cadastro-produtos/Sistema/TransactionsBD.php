<?php 
require_once('../../conexao_banco/ConexaoBancoInterface.php');

	/**
	* CLASSE CRIADA PARA FUNCIONAR DE FORMA GENERICA IMPLEMENTANDO AS AS OPERACOES DE TODO TIPO DE BANCO DE DADOS, 
	* QUE VEM POR REFERENCIA NAS FUNCOES
	*
	*/
	class TransactionsBD{
		private $_conect;

		private function __construct(){

		}

		/**
		* FUNCAO CRIADA PARA EXECUTAR QUERYS AVANCADAS 
		*
		*/
		public static function query($_query){
			try{
				$this->_conect = self::conectar();
				$this->_conect->beginTransaction();
				if((int)strlen($_query)){
					$stmt=$this->_conect->prepare($sql_query);
					$stmt->execute();
					$this->_conect->commit();
				}
			}
			catch(PDOException $e){
				$this->_conect->rollBack();
				echo "não conectado!".$e->getMessage();
				exit();
			
			}
		}

		public static function inserir(&$con, $_nome_tabela, $_array_valor){
			$_array_valor['DEPARTAMENTO'] = 2;
			$_colunas = implode(',',array_keys($_array_valor));
			$_placeholder_colunas = ":".implode(',:',array_keys($_array_valor));

			try{
				$_conect = $con->conectar();
				$_conect->beginTransaction();
				$sql="INSERT INTO " . $_nome_tabela ."(".$_colunas.") VALUES(". $_placeholder_colunas.")";
				$stmt=$_conect->prepare($sql);

				foreach($_array_valor as $_idx => &$_valor){
					$stmt->bindParam(":".$_idx,$_valor);
				}

				$stmt->execute();
				$_conect->commit();
			}
			catch(PDOException $e){
				$_conect->rollBack();
				echo "não conectado!".$e->getMessage();
				exit();
			
			}
		}

		public static function consultarLinha(&$con, $_nome_tabela, $_where){
			try{
				$_conect = $con->conectar();
				$_conect->beginTransaction();
				$sql="SELECT * FROM " . $_nome_tabela.((int)strlen($_where)? " WHERE ".$_where : '');
				$stmt=$_conect->prepare($sql);
				$stmt->execute();
				$_result = $stmt->fetch();
			}
			catch(PDOException $e){
				$_conect->rollBack();
				echo "não conectado!".$e->getMessage();
				exit();
			
			}
		}

		public static function consultarTodasLinhas(&$con, $_nome_tabela, $_where){
			try{
				$_conect = $con->conectar();
				$_conect->beginTransaction();
				$sql="SELECT * FROM " . $_nome_tabela.((int)strlen($_where)? " WHERE ".$_where : '');
				$stmt=$_conect->prepare($sql);
				$stmt->execute();
				$_result = $stmt->fetchALL();
				var_dump($_result);
			}
			catch(PDOException $e){
				$_conect->rollBack();
				echo "não conectado!".$e->getMessage();
				exit();
			
			}
		}

		public static function deletar(&$con, $_nome_tabela, $_where){
			try{
				$_conect = $con->conectar();
				$_conect->beginTransaction();
				$sql="DELETE FROM " . $_nome_tabela.((int)strlen($_where)? " WHERE ".$_where : '');
				$stmt=$_conect->prepare($sql);
				$stmt->execute();
				$_conect->commit();
			}
			catch(PDOException $e){
				$_conect->rollBack();
				echo "não conectado!".$e->getMessage();
				exit();
			
			}
		}
	}
?>