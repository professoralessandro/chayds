<?php include_once("Usuario.php"); ?>
<?php
namespace Chayds
{
	class Funcionario extends Usuario
	{
		//ATRIBUTOS
		private $idFuncionario;
		private $dataContratacao;
		private $comentContrat;
		private $dataDemissao;
		private $comentDemissao;
		private $Escolaridade;
		private $expProfissional;
		private $cargo;
		private $gerenteResp;
		private $historico;
		private $departamento;

		//CONSTRUTOR
		public function __construct($idFuncionario =0,$cpf =0, $dataContratacao ="", $comentContrat ="", $dataDemissao ="", $comentDemissao ="", $Escolaridade ="", $expProfissional ="", $cargo ="", $gerenteResp ="", $historico ="", $nome ="", $dataNascimento ="", $dataCadastro ="", $email ="", $nivelAcesso ="", $ddd1 ="", $telefone ="", $ddd2 ="", $celular ="", $endereco ="", $complemento ="", $bairro ="", $cidade ="", $estado ="", $cep ="", $sexo ="", $senha ="", $rg="", $departamento="", $imagem="")
		{
		//CLASSE MAE
			parent::__construct($nome ,$cpf ,$rg ,$dataNascimento ,$dataCadastro ,$email , $nivelAcesso, $ddd1, $telefone, $ddd2, $celular, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $sexo, $senha, $imagem);

			$this->idFuncionario = $idFuncionario;
			$this->dataContratacao = $dataContratacao;
			$this->comentContrat = $comentContrat;
			$this->dataDemissao = $dataDemissao;
			$this->comentDemissao = $comentDemissao;
			$this->Escolaridade = $Escolaridade;
			$this->expProfissional = $expProfissional;
			$this->cargo = $cargo;
			$this->gerenteResp = $gerenteResp;
			$this->historico = $historico;
			$this->departamento = $departamento;
		}

			//PROPRIEDADES
		public function getIdFuncionario() {
			return $this->idFuncionario;
		}

		public function getDataContratacao() {
			return $this->dataContratacao;
		}

		public function getComentContrat() {
			return $this->comentContrat;
		}

		public function getDataDemissao() {
			return $this->dataDemissao;
		}

		public function getComentDemissao() {
			return $this->comentDemissao;
		}

		public function getEscolaridade() {
			return $this->Escolaridade;
		}

		public function getExpProfissional() {
			return $this->expProfissional;
		}

		public function getCargo() {
			return $this->cargo;
		}

		public function getGerenteResp() {
			return $this->gerenteResp;
		}

		public function getHistorico() {
			return $this->historico;
		}

		public function getDepartamento() {
			return $this->departamento;
		}

		public function setIdFuncionario($idFuncionario) {
			$this->idFuncionario = $idFuncionario;
		}

		public function setDataContratacao($dataContratacao) {
			$this->dataContratacao = $dataContratacao;
		}

		public function setComentContrat($comentContrat) {
			$this->comentContrat = $comentContrat;
		}

		public function setDataDemissao($dataDemissao) {
			$this->dataDemissao = $dataDemissao;
		}

		public function setComentDemissao($comentDemissao) {
			$this->comentDemissao = $comentDemissao;
		}

		public function setEscolaridade($Escolaridade) {
			$this->Escolaridade = $Escolaridade;
		}

		public function setExpProfissional($expProfissional) {
			$this->expProfissional = $expProfissional;
		}

		public function setCargo($cargo) {
			$this->cargo = $cargo;
		}

		public function setGerenteResp($gerenteResp) {
			$this->gerenteResp = $gerenteResp;
		}

		public function setHistorico($historico) {
			$this->historico = $historico;
		}

		public function setDepartamento($departamento) {
			$this->departamento = $departamento;
		}
	}//CLASS
}//NAMESPACE
?>