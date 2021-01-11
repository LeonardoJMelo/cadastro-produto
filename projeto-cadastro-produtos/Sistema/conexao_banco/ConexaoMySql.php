<?php 
	class ConexaoMySql implements ConexaoBancoInterface{
		private $_conect;

		public function conectar(){
			return new PDO("mysql:host=localhost;dbname=NOME_BANCO","","");
		}
	}
?>