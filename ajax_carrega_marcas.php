<?php 
include_once 'includes/db_connect.php';
include_once 'includes/connection.php';
include_once 'includes/functions.php';
include_once 'includes/database.php';   //funções para INSERT / UPDATE / DELETE

$pegaMarcas = $conexao->prepare("SELECT * FROM marcas where id_destino ='".$_POST['id']."' order by nome_marca ASC");
$pegaMarcas->execute();

		$fetchAll = $pegaMarcas->fetchAll();
		
		foreach($fetchAll as $marcas)
		{
			
			echo '<option value="'.$marcas['id'].'">'.$marcas['nome_marca'].'</option>';
			
		}