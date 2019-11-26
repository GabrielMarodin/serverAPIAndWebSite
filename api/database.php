<?php
		$host = "localhost";
		$username = "root";
		$password = "";
		
		$conn = new PDO("mysql:host=" . $host, $username, $password);
		
		$db = $conn;
		
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		try{
			$query = "CREATE DATABASE IF NOT EXISTS `stream`";
			$stmt = $db->prepare( $query );
			$stmt->execute();
			
			$query = "USE `stream`";
			$stmt = $db->prepare( $query );
			$stmt->execute();
			
			$query = "CREATE TABLE IF NOT EXISTS `media` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`tipo` char(5) NOT NULL,
				`path` varchar(255) NOT NULL,
				`titulo` varchar(200) NOT NULL,
				`duracao` char(50) NOT NULL,
				`data_upload` date NOT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1";
			$stmt = $db->prepare( $query );
			$stmt->execute();
			
			$query = "CREATE TABLE IF NOT EXISTS `media_select` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`id_media` int(11) NOT NULL,
				`nome` varchar(255) NOT NULL,
				PRIMARY KEY (`id`),
				KEY `id_media` (`id_media`),
				CONSTRAINT `id_media` FOREIGN KEY (`id_media`) REFERENCES `media` (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1";
			$stmt = $db->prepare( $query );
			$stmt->execute();
			
			$query = "CREATE TABLE IF NOT EXISTS `user` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`senha` char(64) NOT NULL,
				`admin` bit(1) NOT NULL DEFAULT b'0',
				`email` varchar(256) NOT NULL,
				`nome` varchar(256) NOT NULL,
				`sobrenome` varchar(256) NOT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1";
			$stmt = $db->prepare( $query );
			$stmt->execute();
			
		}catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
?>
