<?php include_once("Usuario.php"); ?>
<?php
namespace Chayds
{
	class Empresa extends Usuario
	{	
		//ATRIBUTOS
		private $idEmpresa;

		//CONSTRUTOR
		public function __construct($idEmpresa = 0,$nome ="", $cnpj ="", $dataNascimento ="", $dataCadastro ="", $email ="", $nivelAcesso ="", $ddd1 ="", $telefone ="", $ddd2 ="", $celular ="", $endereco ="", $complemento ="", $bairro ="", $cidade ="", $estado ="", $cep ="", $sexo ="", $senha ="", $imagem ="")
		{
			parent::__construct($nome , $cnpj, $rg="",$dataNascimento, $dataCadastro, $email, $nivelAcesso, $ddd1, $telefone, $ddd2, $celular, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $sexo, $senha, $imagem);

			$this->idEmpresa = $idEmpresa;
			//CLASSE MAE

		}//CONSTRUTOR

		//PROPRIEDADES
		public function getIdEmpresa() {
			return $this->idEmpresa;
		}
		public function setIdEmpresa($idEmpresa) {
			$this->idEmpresa = $idEmpresa;
		}
		//PROPRIEDADES
	}//CLASS
}//NAMESPACE
?>