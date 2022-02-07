<?php
session_start();
include("conexao.php");

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$nascimento = $_POST["nascimento"];
	$ativo = $_POST["ativo"];
				echo "Nome: $nome <br>";
				echo "Nascimento: $nascimento <br>";
				echo "Ativo: $ativo <br>";
	cadastrar($nome, $nascimento, $ativo);
	
				
header('location: /index.php');
