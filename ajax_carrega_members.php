<?php 
include_once 'includes/db_connect.php';
include_once 'includes/connection.php';
include_once 'includes/functions.php';
include_once 'includes/database.php';   //funções para INSERT / UPDATE / DELETE


$tipo=$_POST['id'];

if  ($tipo<>6) {

// $pegaMembers = $conexao->prepare("SELECT
// `equipes`.*,
// `projetos_etapas_tipoticket`.*,
// `members`.*
// FROM
// `equipes`
// INNER JOIN `members`
//   ON (
// 	`equipes`.`idMembro` = `members`.`id_user_adm`
//   )
// INNER JOIN `projetos_etapas_tipoticket`
//   ON (
// 	`equipes`.`idSetor` = `projetos_etapas_tipoticket`.`id_tipoticket`
//   )
// WHERE
// members.ativo=1 AND
// projetos_etapas_tipoticket.id_tipoticket = $tipo ");

// $pegaMembers->execute();
// 		$fetchAll = $pegaMembers->fetchAll();
// 		echo '<label for="responsavel" class="form-label">Responsável / Destinatário</label>';
// 		echo '<select name="destinatario" id="destinatario"  class="form-select my-1 my-md-0 my-image-selectpicker"  data-width="100%" class="camposExtras" >';
// 		foreach($fetchAll as $members)
// 		{
// 			echo '<option  value="'.$members['id_user_adm'].'">'.$members['user_name'].' '.$members['user_sobrenome'].'</option>';
// 		}
// 		echo '</select>';




$pegaMarcas = $conexao->prepare("SELECT
`equipes`.*,
`projetos_etapas_tipoticket`.*,
`members`.*
FROM
`equipes`
INNER JOIN `members`
  ON (
	`equipes`.`idMembro` = `members`.`id_user_adm`
  )
INNER JOIN `projetos_etapas_tipoticket`
  ON (
	`equipes`.`idSetor` = `projetos_etapas_tipoticket`.`id_tipoticket`
  )
WHERE
members.ativo=1 AND
projetos_etapas_tipoticket.id_tipoticket =$tipo ");
$pegaMarcas->execute();

		$fetchAll = $pegaMarcas->fetchAll();
		foreach($fetchAll as $member)
		{
			echo '<option value="'.$member['id_user_adm'].'">'.$member['user_name'].' '.$member['user_sobrenome'].'</option>';
		}
	};
		



 if  ($tipo==6 || $tipo==14 || $tipo==15) {

	$pegafornecedor = $conexao->prepare("SELECT * from fornecedor ORDER BY nome_fornecedor");
	$pegafornecedor->execute();
	
			$fetchAll = $pegafornecedor->fetchAll();
			echo '<label for="responsavel" class="form-label">Fornecedor</label>';
			echo '<select name="nofornecedor" id="fornecedor" class="form-select my-1 my-md-0"  data-width="100%" class="camposExtras" >';
			foreach($fetchAll as $fornecedor)
			{
				echo '<option value="'.$fornecedor['id_fornecedor'].'">'.$fornecedor['nome_fornecedor']. '</option>';
			}
			echo '</select>';
	
	};


