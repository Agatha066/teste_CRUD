<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	
	$email = $_GET["email"];
    $senha = $_GET["senha"];
	
	$formInvalido = 0;
	
	 function validaDadosAlpha($formDado) {
        if ($formDado == "" or ctype_alpha($formDado)) {
            $formInvalido = 1;
        }
    }
	
	validaDadosAlpha($email);
	validaDadosAlpha($senha);
	
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
		
		//verifica se email e senha existe no banco
		$pesquisa = "SELECT email FROM usuario WHERE senha = '$senha' ";
		$resposta = $conn->query($pesquisa);
		$contagem = mysqli_num_rows($resposta);
		
		//se encontrar		
		if($contagem > 0)
		{
			window.location.href="index.html";
		}		
		else 
		{
			echo "Erro ao logar!! ";
		}
		
	}
}