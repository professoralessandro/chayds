<?php include_once("Usuario.php"); ?>
<?php
class Pessoa extends Usuario
{
	//ATRIBUTOS
	private $idPessoa;
	
	//CONSTRUTOR
	public function __construct($idPessoa ="", $nome ="", $cpf="",$rg="", $dataNascimento="", $dataCadastro="", $email="", $nivelAcesso="", $ddd1="", $telefone="", $ddd2="", $celular="", $endereco="", $complemento="", $bairro="", $cidade="", $estado="", $cep="", $sexo="", $senha="",$imagem ="")
	{
		parent::__construct($nome , $cpf, $rg, $dataNascimento , $dataCadastro , $email , $nivelAcesso, $ddd1, $telefone, $ddd2, $celular, $endereco, $complemento, $bairro, $cidade, $estado, $cep, $sexo, $senha, $imagem);
		
        $this->idPessoa = $idPessoa;
    }

        //PROPRIEDADES
    public function getIdPessoa() {
        return $this->idPessoa;
    }
    public function setIdPessoa($idPessoa) {
        $this->idPessoa = $idPessoa;
    }
}//CLASS
?>