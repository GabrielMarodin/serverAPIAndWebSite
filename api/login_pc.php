<?php
	require 'connection.php';
	$conexao = new Database();
	
	$db = $conexao->getConnection();
	
	$email=filter_input(INPUT_POST,'email');
	$senha=filter_input(INPUT_POST,'senha');
	
	$query='select * from user where email=:email AND senha=:senha limit 1';
	
	$stmt=$db->prepare($query);
	
	$stmt->bindparam(':email',$email);
	$stmt->bindparam(':senha',$senha);
	$stmt->execute();
	$user=$stmt->fetch(PDO::FETCH_OBJ);
	if($user){
		session_start();
		$_SESSION['user']=$user->id;
		$_SESSION['LAST_ACTIVITY'] = time();
		header('Location: ../index.php');
	}
	else{
		echo('login failed');
	}
?>