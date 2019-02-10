<?php
namespace Chayds
{
	class Log
	{
		//ATRIBUTOS
		private $idLog;
		private $nome;
		private $dataHora;
		private $acao;
		private $comentLog;

		//CONSTRUTOR
		public function __construct($idLog ="",$nome ="", $dataHora ="", $acao ="", $comentLog ="")
		{

			$this->idLog = $idLog;
			$this->nome = $nome;
			$this->dataHora = $dataHora;
			$this->acao = $acao;
			$this->comentLog = $comentLog;
		}

			//PROPRIEDADES
		public function getIdLog() {
			return $this->idLog;
		}

		public function getNome() {
			return $this->nome;
		}

		public function getDataHora() {
			return $this->dataHora;
		}

		public function getAcao() {
			return $this->acao;
		}

		public function getComentLog() {
			return $this->comentLog;
		}

		public function setIdLog($idLog) {
			$this->idLog = $idLog;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function setDataHora($dataHora) {
			$this->dataHora = $dataHora;
		}

		public function setAcao($acao) {
			$this->acao = $acao;
		}

		public function setComentLog($comentLog) {
			$this->comentLog = $comentLog;
		}
	}//CLASS
}//NAMESPACE
?>