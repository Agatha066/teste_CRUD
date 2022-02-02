<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
	
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
			
	//buscando todos os usuarios
	$sql = "SELECT * FROM usuarios";
	
	//criando uma array para manipular os dados
	if ($result = $conn->query($sql)) 
			{
				$arr = array();
				$i=1;
				
				while ($res = $result->fetch_assoc()) 
				{
					echo "<div class='divi'>"
					echo "".$res['nome']."";
					echo "".$res['email']."";
					echo "<button class='button1'><a href=\"update.html?id=$res[id]\">Editar</a>  |  <button class='button2'><a href=\"delete.html?id=$res[id]\" onClick=\"return confirm('tem certeza que deseja excluir?')\">Deletar</a></td>";		
					echo "<div>";
				}
				$result->close();
	}
}