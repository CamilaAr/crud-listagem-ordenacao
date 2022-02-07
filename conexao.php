<?php

$pdo = new PDO('sqlite:pessoabd.db');

function cadastrar($nome, $nascimento, $ativo){
	try {
	$pdo = new PDO('sqlite:pessoabd.db');
	/*
	$query = $pdo->prepare('select * from pessoa where nome = $nome');
	$query->execute();
	$retorno = $query->fetchAll();
	
	if(count($retorno) > 0){
		echo "já cadastrado"
	}*/
	//else{
		$novo_usuario = array('nome'=>$nome,'nascimento'=>$nascimento,'ativo'=>$ativo);
		$pdo->prepare('INSERT INTO pessoa (nome,nascimento,ativo) VALUES (:nome,:nascimento,:ativo)')->execute($novo_usuario);
		
	//}
	}
	 catch (Exception $e) {
		 
		 echo 'Erro: usuário já cadastrado <br>';
		 // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	 }
}

function excluir($nome){
	try {
	
	$pdo = new PDO('sqlite:pessoabd.db');
	$stmt = $pdo->prepare('DELETE FROM pessoa WHERE nome = :nome');
	$stmt->bindParam(':nome', $nome);
	 $stmt->execute();
	}
	 catch (Exception $e) {
		 
		 echo 'Erro: usuário não existe <br>';
		 // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	 }
}

function selecionar($nome){
	$pdo = new PDO('sqlite:pessoabd.db');
	$stmt = $pdo->prepare("SELECT * FROM pessoa WHERE nome= :nome");
	$stmt->bindParam(':nome', $nome);
	$stmt->execute(); 
	$pessoa = $stmt->fetch();
	return $pessoa;
}

function editar($nome, $nascimento, $ativo, $antigonome){
	$pdo = new PDO('sqlite:pessoabd.db');
	
	$stmt = $pdo->prepare("UPDATE pessoa SET nome= :nome, nascimento= :nascimento, ativo= :ativo WHERE nome= :antigonome");
	$stmt->bindValue(':nome', $nome);
	$stmt->bindValue(':nascimento', $nascimento);
	$stmt->bindValue(':ativo', $ativo);
	$stmt->bindValue(':antigonome', $antigonome);
	$stmt->execute(); 
	}

function idade($nascimento){
	
	$data = new DateTime($nascimento );
	$resultado = $data->diff( new DateTime( date('Y-m-d') ) );
	
	return $resultado->y;
}

function faixaEtaria($idade){
	if($idade <= 9){
		return "0-9";
	} 
	elseif ($idade > 9 && $idade <= 19 ){
		return "10-19";
	}
	elseif ($idade > 19 && $idade <= 29 ){
		return "20-29";
	}
	elseif ($idade > 29 && $idade <= 39 ){
		return "30-39";
	}
	elseif ($idade > 39 && $idade <= 49 ){
		return "40-49";
	}
	elseif ($idade > 49 && $idade <= 59 ){
		return "50-59";
	}
	elseif ($idade > 59 && $idade <= 69 ){
		return "60-69";
	}
	elseif ($idade > 69 && $idade <= 79 ){
		return "70-79";
	}
	elseif ($idade > 79 && $idade <= 89 ){
		return "80-89";
	}
	elseif ($idade > 89 && $idade <= 99 ){
		return "90-99";
	}
	elseif ($idade > 99 ){
		return "100 ou mais";
	}
}

$statment = $pdo->query("SELECT * FROM pessoa");

$rows = $statment->fetchALL(PDO::FETCH_ASSOC);

//$secondDate = date('d/m/Y');



//var_dump($rows);

