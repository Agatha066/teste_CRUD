<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	$nome = $_GET["nome"];
	$sobrenome = $_GET["sobrenome"];
	$email = $_GET["email"];
	$telefone = $_GET["telefone"];
	$senha = $_GET["senha"];
    $descricao = $_GET["descricao"];
	$data = $_POST["data"];

	$formInvalido = 0;
	
	 function validaDadosAlpha($formDado) {
        if ($formDado == "" or ctype_alpha($formDado)) {
            $formInvalido = 1;
        }
    }
	function validaData($formDado) {
        $date= DateTime::createFromFormat('y-m-d',$formDado);
		if ($date && $date->format('y-m-d') != $formDado) {
            $formInvalido = 1;
        }
    }
    function validaDadosDigit($formDado) {
        if ($formDado == "" or !ctype_digit($formDado)) {
            $formInvalido = 1;
        }
    }
	
	validaData($data);
    validaDadosAlpha($nome);
	validaDadosAlpha($sobrenome);
	validaDadosAlpha($email);
	validaDadosDigit($telefone);
	validaDadosAlpha($senha);
	validaDadosAlpha($descricao);
	
	
	 if ($formInvalido == 0) {
		
        //fazendo conexao com o banco
			$servidor = "localhost";
			$usuario = "root";
			$senha = "";
			$nomebanco= "teste";
			
			
			$conn = new mysqli($servidor,$usuario,$senha,$nomebanco);
			if (!$conn) 
			{
				echo "ERRO AO CONECTAR BANCO DE DADOS!!";
			}
			
			$sql = "INSERT INTO usuario (nome,sobrenome,email,telefone,descricao,data,senha) 
				VALUES ('$nome','$sobrenome','$email','$telefone','$descricao','$data','$senha)";
			
				if($resultado = $conn->query($sql))
				{
					echo "usuario $nome inserido com sucesso!!<br>";
				}
				else 
				{
				  echo "Erro ao inserir ";
				}
			}
	 }
}