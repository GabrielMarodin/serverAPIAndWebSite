<?php
	require 'connection.php';
	$conexao = new Database();
	
	$email=filter_input(INPUT_POST,'email');
	$senha=filter_input(INPUT_POST,'senha');
	
	$salt='oIw(@4sda&s8*sa:!';
	$senha=md5($salt.$senha);
	
		$sql='select * from user where email=:email AND senha=:senha limit 1';
		$sth=$conexao->prepare($sql);
		$sth->bindparam(':email',$email);
		$sth->bindparam(':senha',$senha);
		$sth->execute();
		$user=$sth->fetch(PDO::FETCH_OBJ);
		if($user){
            session_start();
			$_SESSION['user']=$user->id;
		}
		else{
			alert('login failed');
        }
?>