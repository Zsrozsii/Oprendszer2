<?php 
if(!array_key_exists('w', $_GET) || empty($_GET['w'])) : 
	header('Location: index.php');
else: 
	$query = "SELECT id, name, species, ill, gender, vaccination, owned FROM animals WHERE id = :id";
	$params = [':id' => $_GET['w']];
	require_once DATABASE_CONTROLLER;
	$animals = getRecord($query, $params);
	if(empty($animals)) :
		header('Location: index.php');
	else : ?>
		<h2><?=$animals['name'].' '.$animals['species'] ?></h2>
		<h3><?=$animals['ill'] ?></h3>
		<p>Gender: <?=$animals['gender'] ?> <br>
		Nationality: <?=$animals['vaccination'] ?></p>
		Nationality: <?=$animals['owned'] ?></p>
	<?php endif;
endif;
?>