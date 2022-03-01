<?php 


include_once 'includes/db_connect.php';
include_once 'includes/connection.php';
include_once 'includes/functions.php';
include_once 'includes/database.php';   //funções para INSERT / UPDATE / DELETE

$pegaSub = $conexao->prepare("SELECT * FROM prod_subcat WHERE id_cat='".$_POST['id']."'");

$pegaSub->execute();

		$fetchAll = $pegaSub->fetchAll();
		echo '<option value=""> (Todas as categorias) </option>';
		foreach($fetchAll as $sub2)
		{
		
        echo '<option value="'.$sub2['id_subcatprod'].'">'.$sub2['desc_subcatprod'].'</option>';
		}